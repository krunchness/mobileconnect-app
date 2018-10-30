<?php

namespace speechless\Http\Controllers;

use Illuminate\Http\Request;
use speechless\PersonInfo;
use speechless\User;
class StrategyController extends Controller
{
    public function showStrategyForm()
    {
    	return view('strategy-form');
    }

    public function storeStrategyForm(Request $request)
    {

        // dd($request->all());
    	$this->validate($request, [
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'email' => 'required',
    		'business_name' => 'required',
    		'mobile_no' => 'required',
    		'industry' => 'required',
    	]);

    	// $mobile_no = str_replace(['(', ')', '-'], '', $request->mobile_no);
    	PersonInfo::create([
    		'first_name' => $request->first_name,
    		'last_name' => $request->last_name,
    		'email' => $request->email,
    		'business_name' => $request->business_name,
    		'mobile_no' => $request->mobile_no,
    		'industry' => $request->industry,
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
