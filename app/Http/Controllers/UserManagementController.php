<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class UserManagementController extends Controller
{
    public function UserManagement()
    {
        $list = DB::select('SELECT * FROM users');  
        return view('Admin.pages.UserManagement', ['list'=>$list]);
       
    }
    public function create_new_user(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'User_Type' => 'required'
       ]);

       $add = new User;

       $add->name = $request->input('name');
       $add->email = $request->input('email');
       $add->password = $request->input('password');
       $add->User_Type = $request->input('User_Type');

       if($add->save())
        {
            Alert::Success('Success', 'Created successfully!');
            return redirect('/UserManagement')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Error', 'Failed!, Please Try again.');
            return redirect('/UserManagement')->with('Error', 'Failed!');
        }
    }
}
