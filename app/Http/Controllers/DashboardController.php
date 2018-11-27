<?php

namespace mobileconnect\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use mobileconnect\PersonInfo;

class DashboardController extends Controller
{
    public function showRegistered()
    {
    	$inquiries = PersonInfo::all();
        // dd($inquiries);
    	return view('dashboard.dashboard-registeredmanagement', compact(['inquiries']));
    }

    public function exportToCSV(Request $request)
    {
        
        $ids = explode(",",$request->inquiries_ids);
        
        if (!empty($request->all())) {

            $inquiries_data = PersonInfo::whereIn('id', $ids)->get()->toArray();

        }else{

            $inquiries_data = PersonInfo::all()->toArray();
            
        }



        $inquiries_data_columns = ['id', 'first_name', 'last_name', 'email', 
                                    'company_name', 'mobile_no', 'reference',
                                  'date_created', 'time_created'];

        $headers = [
            'Content-type'        => 'text/csv',
            'Content-Disposition' =>  'attachment',
        ];

        $date = Carbon::now();
        $filename = 'InquiryReports_'. $date->toDateString();
        if ($_ENV['APP_ENV'] == 'production') {
            $path = $_SERVER['DOCUMENT_ROOT'] . '/files/' . $filename . '.csv';
        }else{
            $path = public_path('files\\') . $filename . '.csv';
        }
            
        $fp = fopen($path , 'wb');

        fputcsv($fp, $inquiries_data_columns);


        foreach ($inquiries_data as $key => $data) {

            unset($data['updated_at']);

            $temp_date = explode(' ',$data['created_at']);

            unset($data['created_at']);

            $data['date_created'] = $temp_date[0];
            $data['time_created'] = $temp_date[1];

            fputcsv($fp, $data);
        }
        fclose($fp);

        return response()->download($path, $filename .'.csv', $headers);
    }

    public function deleteInquiry($id)
    {
        $personinfo = PersonInfo::findorFail($id);

        $personinfo->delete();

        return back();
    }

    public function getInquiryByDate(Request $request)
    {      

        $start_date = new Carbon($request->start_date);
        $end_date = new Carbon($request->end_date);
        // print_r($start_date);
        if ($request->start_time != null) {
            $ids = explode(",",$request->ids);
            
            $personinfo = PersonInfo::whereBetween('created_at', [$start_date->format('Y-m-d') ." ". $request->start_time .":00", $start_date->format('Y-m-d') ." ". $request->end_time .":00"])
                                    ->get();

            // $personinfo = PersonInfo::whereIn('id', $ids)
            //                         ->get();
        } elseif($request->start_date != '') {
            $personinfo = PersonInfo::whereBetween('created_at', [$start_date->format('Y-m-d')." 00:00:00", $start_date->format('Y-m-d')." 23:59:59"])->get();
        } else{
            $personinfo = PersonInfo::all();
        }
        

        $personDetails = [];
        foreach ($personinfo as $key => $info) {

            $buttons = '<div class="table-data-feature">
                            <button class="item delete-inquiry-btn" data-toggle="modal" data-name="'. $info->first_name . ' ' . $info->last_name .'" delete-inquiry-id="'. $info->id .'" data-placement="top" title="Delete" data-target="#deleteInquiryModal">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </div>';
            $personDetails[] = [
                'created_at' => $info->created_at,
                'first_name' => $info->first_name,
                'last_name' => $info->last_name,
                'email' => $info->email,
                'mobile_no' => $info->mobile_no,
                'business_name' => $info->business_name,
                'industry' => $info->industry,
                'buttons' => $buttons,
                'inquiry_id' => $info->id
            ];
        }

        // var_dump($personDetails);
        return response()->json($personDetails);
    }
}
