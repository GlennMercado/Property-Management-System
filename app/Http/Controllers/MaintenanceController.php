<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\out_of_order_rooms;
use Illuminate\Support\Facades\Auth;
use App\Models\guest_request;

class MaintenanceController extends Controller
{
    public function Maintenance()
    {   
        $list = DB::SELECT('SELECT * FROM out_of_order_rooms a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No');
        return view('Admin.pages.HousekeepingForms.Maintenance', ['list' => $list]);
    }


    public function add_out_of_order(Request $request)
    {
        $this->validate($request,[
            'id' => '',
            'room_no' => '',
            'facility_type'=> '',
            'priority' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'book_no' => 'required',
            'discoveredby' => ''
            ]);

        $status = "Out of Order";

        $id = $request->input('id');
        $room_no = $request->input('room_no');
        $facility = $request->input('facility_type');
        $priority = $request->input('priority');
        $description = $request->input('description');
        $due_date = $request->input('due_date');
        $bookno = $request->input('book_no');
        $discoveredby = $request->input('discoveredby');
        

        $add = new out_of_order_rooms;

        $add->Facility_Type = $facility;
        $add->Room_No = $room_no;
        $add->Description = $description;
        $add->Priority_Level = $priority;
        $add->Due_Date = $due_date;
        $add->Booking_No = $bookno;
        $add->Discovered_By = $discoveredby;


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

    public function Guest_Call_Register()
    {
        $list = DB::select("SELECT * FROM guest_requests");
        return view('Admin.pages.HousekeepingForms.Guest_Call_Register', ['list' => $list]);
    }

    public function add_guest_request(Request $request)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 5)];

        // shuffle the result
        $randID = str_shuffle($pin);

        $this->validate($request,[
            'roomno' => '',
            'bookno' => '',
            'guest_name'=> 'required',
            'type_of_request' => 'required',
            'item_request' => '',
            'service_request' => ''
            ]);
          
        $guestrequest;
        if($request->input('item_request') != null)
        {
            $guestrequest = $request->input('item_request');
        }
        if($request->input('service_request') != null)
        {
            $guestrequest = $request->input('service_request');
        }
        
        

        $add = new guest_request;
 
        $bookno = $request->input('bookno');
        
        $add->Request_ID = $randID;
        $add->Room_No = $request->input('roomno');
        $add->Booking_No = $bookno;
        $add->Guest_Name = $request->input('guest_name');
        $add->Type_of_Request = $request->input('type_of_request');
        $add->Request = $guestrequest;

        if($add->save())
        {
            DB::table('housekeepings')->where('Booking_No', $bookno)->update(array('Request_ID' => $randID));

            Alert::Success('Success', '"'. $randID .'" Guest Request Successfully Recorded!');
            return redirect('Guest_Call_Register')->with('Success', 'Data Saved');   
        }
        else
        {
            Alert::Error('Success', 'Guest Request Failed in Recording!');
            return redirect('HotelReservationForm')->with('Failed', 'Data Saved');
        }
        
    }

    public function update_maintenance_status($id, $rno, $bno)
    {

        $maintenance_id = $id;
        $room_no = $rno;
        $booking_no = $bno;
        $datenow = now()->format('Y-m-d');
        $status = "Resolved";

        try{
            DB::table('out_of_order_rooms')->where('id', $maintenance_id)->update(array('Status' => $status, 'Date_Resolved' => $datenow, 'IsArchived' => true));
            DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array('Status' => "Vacant for Accommodation"));
            DB::table('hotel_reservations')->where('Booking_No', $booking_no)->update(array('IsArchived' => true));
            DB::table('housekeepings')->where('Booking_No', $booking_no)->update(array('IsArchived' => true));

            Alert::Success('Success', 'Maintenance Successfully Updated!');
            return redirect('Maintenance')->with('Success', 'Data Saved');

        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Maintenance Failed Updating!');
            return redirect('Maintenance')->with('Success', 'Data Saved');
        }
    }
}
