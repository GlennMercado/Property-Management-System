<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_management;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class UserManagementController extends Controller
{
    public function UserManagement()
    {
        $list = DB::select('SELECT * FROM users');  
        return view('Admin.pages.UserManagement', ['list'=>$list]);
    }
}
