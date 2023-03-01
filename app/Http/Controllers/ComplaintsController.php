<?php

namespace App\Http\Controllers;
use App\Models\complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplaintsController extends Controller
{
    public function Complaints(Request $request){
        $list = DB::select('SELECT * FROM complaints ORDER BY created_at DESC');    
        return view('Admin.pages.OperationManagement.Complaints', ['list'=>$list]);
    }
}
