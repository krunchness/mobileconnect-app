<?php

namespace speechless\Http\Controllers;

use Illuminate\Http\Request;
use speechless\PersonInfo;
use speechless\User;
class CruiseController extends Controller
{
    public function showCruiseForm()
    {
    	return view('cruise-form');
    }

    public function storeCruiseForm(Request $request)
    {

    	$this->validate($request, [
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'birth_date' => 'required',
    		'gender' => 'required',
    		'mobile_no' => 'required',
    		'cpconnect_question' => 'required',
    	]);

    	$mobile_no = str_replace(['(', ')', '-'], '', $request->mobile_no);
    	PersonInfo::create([
    		'first_name' => $request->first_name,
    		'last_name' => $request->last_name,
    		'birth_date' => $request->birth_date,
    		'gender' => $request->gender,
    		'mobile_no' => $mobile_no,
    		'cpconnect_question' => $request->cpconnect_question,
    		'anniv_date' => $request->anniv_date,	
    	]);
    

    	return back();
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
