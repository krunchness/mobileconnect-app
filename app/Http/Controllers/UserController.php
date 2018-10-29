<?php

namespace speechless\Http\Controllers;

use Illuminate\Http\Request;
use speechless\User;
use speechless\UserRole;

class UserController extends Controller
{
    public function usersList()
    {
    	$users = User::all();

    	return view('dashboard.dashboard-usermanagement', compact(['users']));
    }

    public function rolesList()
    {
      $roles = UserRole::all();

      return view('dashboard.dashboard-rolesmanagement', compact(['roles']));
    }

    public function addRole(Request $request)
    {
        // dd($request->all());
        UserRole::create($request->all());

        return redirect()->route('usermanagement.rolesList');
    }

    public function addUser(Request $request)
    {
       

       $name = ucfirst($request->first_name) . ' ' . ucfirst($request->last_name);
       
       User::create([
            'name' => $name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'user_role' => 2
       ]);

       return redirect()->route('usermanagement.usersList');
    }

    public function editUser(Request $request, User $user)
    {
        

        if ($request->password != '' || !empty($request->password)) {

          $user->update([
              'username' => $request->username,
              'name' => $request->name,
              'email' => $request->email,
          ]);

        }else{

          $user->update([
              'username' => $request->username,
              'name' => $request->name,
              'email' => $request->email,
              'password' => bcrypt($request->password)
          ]);

        }

        return back();
        
    }

    public function deleteUser($id)
    {
      $user = User::findorFail($id);

      $user->delete();

      return back();
    }
}
