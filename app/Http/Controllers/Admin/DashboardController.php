<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('users', $users);
    }

    //public function registeredit(Request $request, $userid)
    //{
        //$userid = User::findOrFail($userid);
        //return view('admin.register-edit');
    //}

    public function registeredit(Request $request,  $userid)
    {
        $users = User::findOrFail($userid);
        return view('admin.register-edit')->with('users', $users);
    }

    public function registerupdate(Request $request,  $userid){
        $users = User::find($userid);
        $users->username = $request->input('username');
        $users->email = $request->input('email');
        $users->usertype = $request->input('usertype');
        $users->update();

        return redirect('admin/role-register')->with('status', 'Your data is updated');
    }

    public function registerdelete($userid){
        $users = User::findOrFail($userid);
        $users->delete();

        return redirect('admin/role-register')->with('status', 'Your data is deleted');
    }

}
