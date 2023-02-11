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
        $list = DB::SELECT('SELECT * FROM out_of_order_rooms');
        return view('Admin.pages.HousekeepingForms.Maintenance', ['list' => $list]);
    }


    public function add_out_of_order(Request $request)
    {
        $createdby_name = Auth::user()->name;
        $createdby_role = Auth::user()->User_Type;

        $createdby = $createdby_name.' ('.$createdby_role.')';

        $this->validate($request,[
            'id' => '',
            'room_no' => '',
            'facility_type'=> '',
            'priority' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'book_no' => 'required'
            ]);

        $status = "Out of Order";

        $id = $request->input('id');
        $room_no = $request->input('room_no');
        $facility = $request->input('facility_type');
        $priority = $request->input('priority');
        $description = $request->input('description');
        $due_date = $request->input('due_date');
        $bookno = $request->input('book_no');
        

        $add = new out_of_order_rooms;

        $add->Facility_Type = $facility;
        $add->Room_No = $room_no;
        $add->Description = $description;
        $add->Created_By = $createdby;
        $add->Priority_Level = $priority;
        $add->Due_Date = $due_date;
        $add->Booking_No = $bookno;


        if($add->save())
        {
            DB::table('housekeepings')->where('ID', $id)->update(array('Housekeeping_Status' => $status));
            DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array('Status' => $status));
            
            Alert::Success('Success', 'Out of Order Room Successfully Recorded!');
            return redirect('Maintenance')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Failed', 'Out of Order Room Failed Recording!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Saved');
        }
        
        
    }
}
