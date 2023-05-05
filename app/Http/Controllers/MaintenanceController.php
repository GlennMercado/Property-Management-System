<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\out_of_order_rooms;
use Illuminate\Support\Facades\Auth;
use App\Models\guest_request;
use Carbon\Carbon;

class MaintenanceController extends Controller
{
    public function Maintenance()
    {   
        $list = DB::SELECT('SELECT *, a.id FROM out_of_order_rooms a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.IsArchived = 0');
        $list2 = DB::SELECT('SELECT * FROM out_of_order_rooms a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.IsArchived = 1');
        
        return view('Admin.pages.HousekeepingForms.Maintenance', ['list' => $list, 'list2' => $list2]);
    }


    public function add_out_of_order(Request $request)
    {
        // $this->validate($request,[
        //     'id' => '',
        //     'room_no' => '',
        //     'facility_type'=> '',
        //     'priority' => 'required',
        //     'description' => 'required',
        //     'due_date' => 'required',
        //     'book_no' => 'required',
        //     'discoveredby' => ''
        //     ]);
        
        $stats = $request->input('maintenance_stats');

        $status = "Out of Order";

        $id = $request->input('id');
        $room_no = $request->input('room_no');
        $facility = $request->input('facility_type');
        $priority = $request->input('priority');
        $description = $request->input('description');
        $due_date = $request->input('due_date');
        $bookno = $request->input('book_no');
        $discoveredby = $request->input('discoveredby');
        $cost = $request->input('cost');

        if($stats == "Yes")
        {  
            $add = new out_of_order_rooms;

            $add->Facility_Type = $facility;
            $add->Room_No = $room_no;
            $add->Description = $description;
            $add->Priority_Level = $priority;
            $add->Due_Date = $due_date;
            $add->Booking_No = $bookno;
            $add->Discovered_By = $discoveredby;
            $add->Cost = $cost;


            if($add->save())
            {
                DB::table('housekeepings')->where('ID', $id)->update(array('Housekeeping_Status' => $status));
                DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array('Status' => $status));
                DB::table('list_of_housekeepers')->where('Housekeepers_Name', $discoveredby)->update(['Status' => "Available"]);
                DB::table('hotel_reservations')->where('Booking_No', $bookno)->update(['Booking_Status' => "Room Checked"]);

                Alert::Success('Success', 'Out of Order Room Successfully Recorded!');
                return redirect('Maintenance')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Out of Order Room Failed Recording!');
                return redirect('Housekeeping_Dashboard')->with('Success', 'Data Saved');
            }
        }
        else
        {
            DB::table('hotel_reservations')->where('Booking_No', $bookno)->update(['Booking_Status' => "Room Checked"]);
            DB::table('housekeepings')->where(['Room_No' => $room_no, 'Booking_No' => $bookno])->update(['Housekeeping_Status' => "Out of Service", 'Front_Desk_Status' => "Room Checked"]);
            DB::table('novadeci_suites')->where('Room_No', $room_no)->update(['Status' => "Vacant for Cleaning"]);

            Alert::Success('Success', 'Housekeeping Successfully Updated!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Saved');
        }
        
        
    }

    public function Guest_Request()
    {
        $list = DB::select("SELECT * FROM guest_requests a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.Type_of_Request = 'Service Request' AND a.Status != 'Ongoing'");
        return view('Admin.pages.HousekeepingForms.Guest_Request', ['list' => $list]);
    }

    public function add_guest_request(Request $request)
    {

        
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $qty;
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
            'item_request' => ''
            ]);
          
        $type_of_request = $request->input('type_of_request');

        $guest_request;

        if($type_of_request == "Service Request")
        {
            $guest_request = $request->input('service_request');
            $qty = null;
        }
        elseif($type_of_request == "Item Request")
        {
            $guest_request = $request->input('item_request');
            $qty = $request->input('qty');
        }

        $add = new guest_request;
 
        $bookno = $request->input('bookno');
        
        $add->Request_ID = $randID;
        $add->Room_No = $request->input('roomno');
        $add->Booking_No = $bookno;
        $add->Guest_Name = $request->input('guest_name');
        $add->Type_of_Request = $type_of_request;
        $add->Request = $guest_request;
        $add->Quantity = $qty;

        if($add->save())
        {
            DB::table('housekeepings')->where('Booking_No', $bookno)->update(array('Request_ID' => $randID));

            Alert::Success('Success', 'Guest Request Successfully Recorded!');
            return redirect('HotelReservationForm')->with('Success', 'Data Saved');   
        }
        else
        {
            Alert::Error('Success', 'Guest Request Failed in Recording!');
            return redirect('HotelReservationForm')->with('Failed', 'Data Saved');
        }
        
    }

    public function update_maintenance_status($id, $rno, $bno, $due)
    {
        $maintenance_id = $id;
        $room_no = $rno;
        $booking_no = $bno;
        $datenow = now()->format('Y-m-d');
        $due_date = $due; 
        $status = "Resolved";
        $status2 = "Late Resolved";
        $datenow = Carbon::now();
        $datenow = date('Y-m-d', strtotime($datenow));

        

        try{

            if($due_date >= $datenow)
            {
                DB::table('out_of_order_rooms')->where('id', $maintenance_id)->update(array('Status' => $status, 'Date_Resolved' => $datenow, 'IsArchived' => true));
               
                DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array('Status' => "Vacant for Accommodation"));
                DB::table('hotel_reservations')->where('Booking_No', $booking_no)->update(array('IsArchived' => true));
                DB::table('housekeepings')->where('Booking_No', $booking_no)->update(array('IsArchived' => true));

                Alert::Success('Success', 'Maintenance Successfully Updated!');
                return redirect('Maintenance')->with('Success', 'Data Saved');
            }
            else
            {
                DB::table('out_of_order_rooms')->where('id', $maintenance_id)->update(array('Status' => $status2, 'Date_Resolved' => $datenow, 'IsArchived' => true));
                DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array('Status' => "Vacant for Accommodation"));
                DB::table('hotel_reservations')->where('Booking_No', $booking_no)->update(array('IsArchived' => true));
                DB::table('housekeepings')->where('Booking_No', $booking_no)->update(array('IsArchived' => true));

                Alert::Success('Success', 'Maintenance Successfully Updated!');
                return redirect('Maintenance')->with('Success', 'Data Saved');
            }
            

        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Maintenance Failed Updating!');
            return redirect('Maintenance')->with('Success', 'Data Saved');
        }
    }


}
