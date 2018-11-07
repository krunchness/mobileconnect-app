<?php

namespace speechless\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use speechless\PersonInfo;

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
        

        if (!empty($request->all())) {

            $inquiries_data = PersonInfo::whereIn('id', [$request->inquiries_ids])->get()->toArray();

        }else{

            $inquiries_data = PersonInfo::all()->toArray();
            
        }

        unset($inquiries_data[0]['updated_at']);

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

        fputcsv($fp, array_keys($inquiries_data[0]));

        foreach ($inquiries_data as $key => $data) {

            unset($data['updated_at']);
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
        $personinfo = PersonInfo::whereBetween('created_at', [$start_date->format('Y-m-d')." 00:00:00", $end_date->format('Y-m-d')." 23:59:59"])->get();

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
            ];
        }
        return response()->json($personDetails);
    }
}
