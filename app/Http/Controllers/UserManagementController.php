<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserManagementController extends Controller
{
    public function UserManagement()
    {
        $email = Auth::user()->email;

        $list = DB::select("SELECT * FROM users WHERE email != '$email' and User_Type != 'Guest' and IsArchived = 0");  
        $list2 = DB::select("SELECT * FROM users WHERE email != '$email' and User_Type = 'Guest' and IsArchived = 0");  
        $list3 = DB::select("SELECT * FROM users WHERE IsArchived = 1");  
        $count = DB::select("SELECT count(*) as cnt FROM users WHERE User_Type = 'Housekeeping Supervisor' and IsArchived != 1 ");

        return view('Admin.pages.UserManagement', ['list'=>$list, 'list2'=>$list2, 'list3'=>$list3,'count' => $count]);
       
    }
    public function create_new_user(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'User_Type' => 'required'
       ]);

       $create = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'profile_pic' => 'nvdcpics\User2.png',
            'User_Type' => $request->input('User_Type'),
        ]);

        if(!$create)
        {
            Alert::Error('Failed', 'User Creation Failed!');
            return redirect('/UserManagement')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Success('Success', 'Created successfully!');
            return redirect('/UserManagement')->with('Success', 'Data Saved');
        }

        //    $add = new User;

        //    $add->name = $request->input('name');
        //    $add->email = $request->input('email');
        //    $add->password = $request->input('password');
        //    $add->User_Type = $request->input('User_Type');

        //    if($add->save())
        //     {
        //         Alert::Success('Success', 'Created successfully!');
        //         return redirect('/UserManagement')->with('Success', 'Data Saved');
        //     }
        //     else
        //     {
        //         Alert::Error('Error', 'Failed!, Please Try again.');
        //         return redirect('/UserManagement')->with('Error', 'Failed!');
        //     }


    }
    public function edit_user(Request $request)
    {
        try
        {
            $id = $request->input('id');
            $email = $request->input('email');
            $usertype = $request->input('User_Type');
            $current_type = $request->input('type');

            if($current_type == $usertype)
            {
                Alert::Error('Error', "User is already ".$current_type."!");
                return redirect('/UserManagement')->with('Error', 'error');
            }
            else
            {
                $update = DB::table('users')->where(['id' => $id, 'email'=>$email])
                        ->update(['User_Type' => $usertype]);

                if($update)
                {
                    Alert::Success('Success', "User role successfully changed!");
                    return redirect('/UserManagement')->with('Error', 'error');
                }
                else
                {
                    Alert::Success('Error', "Role Changing Failed!");
                    return redirect('/UserManagement')->with('Error', 'error');
                }
            }
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', $e);
            return redirect('/UserManagement')->with('Error', 'error');
        }
    }
    public function enable_disable_user($id, $em, $endis)
    {
        try
        {
            $userid = $id;
            $email = $em;
            $remarks = $endis;
            $sql;
            if($remarks == "Disabled")
            {
                $sql = DB::table('users')->where(['id' => $userid, 'email' => $email])->update(['IsDisabled' => 1]);
            }
            elseif($remarks == "Enabled")
            {
                $sql = DB::table('users')->where(['id' => $userid, 'email' => $email])->update(['IsDisabled' => 0]);
            }
            elseif($remarks == "Archived")
            {
                $datenow = Carbon::now();
                $sql = DB::table('users')->where(['id' => $userid, 'email' => $email])->update(['IsDisabled' => 1, 'IsArchived' => 1, 'updated_at' => $datenow]);
            }

            if($sql)
            {
                Alert::Success('Success', 'User Successfully '.$remarks.'!');
                return redirect('/UserManagement')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Editing User Access Failed!');
                return redirect('/UserManagement')->with('Failed', 'Failed');
            }
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Success('Error', $e);
            return redirect('/UserManagement')->with('Error', 'error');
        }
    }
}
