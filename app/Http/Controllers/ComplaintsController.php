<?php

namespace App\Http\Controllers;
use App\Models\complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ComplaintsController extends Controller
{
    public function Complaints(Request $request){
        $list1 = DB::select("SELECT * FROM complaints WHERE status = 'Pending' ORDER BY created_at DESC");   
        $list2 = DB::select("SELECT * FROM complaints WHERE status = 'Scheduled' ORDER BY created_at DESC");   
        $list3 = DB::select("SELECT * FROM complaints WHERE status = 'Resolved' ORDER BY created_at DESC");   
        return view('Admin.pages.OperationManagement.Complaints', ['list1'=>$list1, 'list2'=>$list2, 'list3'=>$list3]);
    }
    public function complaints_status(Request $request){  
        $complaints_id = $request->input('id');
        $status = $request->input('status');
        $sched = $request->input('sched');
        $remarks = $request->input('remarks');

        DB::table('complaints')->where('id', $complaints_id)->update(array
        (
            'schedule' => $sched,
            'status' => $status,
            'remarks' => $remarks,
        ));

        Alert::Success('Success', 'Complaints Resolved');
        return redirect('Complaints')->with('Success', 'Data Updated');
    }
}
