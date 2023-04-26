<?php

namespace App\Http\Controllers;
use App\Models\complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ComplaintsController extends Controller
{
    public function Complaints(Request $request){
        $list = DB::select('SELECT * FROM complaints ORDER BY created_at DESC');    
        return view('Admin.pages.OperationManagement.Complaints', ['list'=>$list]);
    }
    public function complaints_status(Request $request){  
        $complaints_id = $request->input('id');
        $status = "Resolved";
        $remarks = $request->input('remarks');

        DB::table('complaints')->where('id', $complaints_id)->update(array
        (
            'status' => $status,
            'remarks' => $remarks,
        ));

        Alert::Success('Success', 'Complaints Resolved');
        return redirect('Complaints')->with('Success', 'Data Updated');
    }
}
