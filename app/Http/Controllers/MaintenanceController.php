<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\out_of_order_rooms;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function Maintenance()
    {   
        return view('Admin.pages.HousekeepingForms.Maintenance');
    }


    public function add_out_of_order(Request $request)
    {
        $createdby_name = Auth::user()->name;
        $createdby_role = Auth::user()->User_Type;

        $createdby = $createdby_name.' ('.$createdby_role.')';

        $this->validate($request,[
            'room_no' => '',
            'facility_type'=> '',
            'priority' => 'required',
            'description' => 'required',
            'due_date' => 'required'
            ]);

        $status = "Out of Order";

        $room_no = $request->input('room_no');
        $facility = $request->input('facility_type');
        $priority = $request->input('priority');
        $description = $request->input('description');
        $due_date = $request->input('due_date');
        

        $add = new out_of_order_rooms;

        $add->Facility_Type = $facility;
        $add->Room_No = $room_no;
        $add->Description = $description;
        $add->Created_By = $createdby;
        $add->Priority_Level = $priority;
        $add->Due_Date = $due_date;


        if($add->save())
        {
            DB::table('housekeepings')->where('Room_No', $room_no)->update(array('Housekeeping_Status' => $status));
            DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array('Housekeeping_Status' => $status));
            
            Alert::Success('Success', 'Out of Order Room Successfully Recorded!');
            return redirect('Out of Order Rooms')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Failed', 'Out of Order Room Failed Recording!');
            return redirect('Out of Order Rooms')->with('Success', 'Data Saved');
        }
        
        
    }
}
