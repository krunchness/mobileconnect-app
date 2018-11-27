<?php

namespace mobileconnect\Http\Controllers;

use Illuminate\Http\Request;
use mobileconnect\PersonInfo;
use mobileconnect\User;
class MobileConnectController extends Controller
{
    public function showMobileConnectForm()
    {
    	return view('mobileconnect-form');
    }

    public function storeMobileConnectForm(Request $request)
    {

        // dd($request->all());
    	$this->validate($request, [
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'email' => 'required',
    		'company_name' => 'required',
    		'mobile_no' => 'required',
    		'scmconnect_question' => 'required',
    	]);

    	// $mobile_no = str_replace(['(', ')', '-'], '', $request->mobile_no);

        $info = PersonInfo::where('mobile_no', '=', $request->mobile_no)->first();

        // dd($info);

        if ($info === null) {
            
            PersonInfo::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'mobile_no' => $request->mobile_no,
                'scmconnect_question' => $request->scmconnect_question,
            ]);
            
            return back()->with('message_status', 'true');


        } else {
            
            return back()->with('message_status', 'false');

        }
    

    	
    }

    public function resetPasswordForm()
    {
        return view('auth.reset-password');
    }

    public function resetPasswordSubmit(Request $request)
    {
        

        $user = User::where('username', '=', $request->username)->first();


        if (empty($user)) {
            

            return back()->with('error-msg', 'No Existing User');
        }else{
            
            $user->update([
                'password' => bcrypt($request->password),
            ]);

            return redirect('/login');
        }
    }
}
