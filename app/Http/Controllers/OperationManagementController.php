<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stocksfunctions;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OperationManagementCOntroller extends Controller
{
    public function OperationDashboard()
    {
        return view('OperationDashboard');
    }
    public function Reservation()
    {
        return view('Reservation');
    }
    public function GuestReservation()
    {
        return view('GuestReservation');
    }
    public function OperationRooms()
    {
        return view('OperationRooms');
    }
    public function Reports()
    {
        return view('Reports');
    }
    public function GuestFolio()
    {
        return view('GuestFolio');
    }

    public function setstats(Request $request)
    {
        try{

            $req_id = $request->input('request_id');
            $stats = $request->input('stats');

            $sql = DB::table('guest_requests')->where('Request_ID', $req_id)->update(['Status' => $stats]);

            if($sql)
            {
                Alert::Success('Success', 'Guest Request Successfully Updated!');
                return redirect('Requests')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Guest Request Failed Updating!');
                return redirect('Requests')->with('Failed', 'Data Saved');
            }
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Guest Request Failed Updating!');
            return redirect('Requests')->with('Failed', 'Data Saved');
        }
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
            'item_request' => ''
            ]);
          
        $type_of_request = $request->input('type_of_request');

        $guest_request;

        $add = new guest_request;

        if($type_of_request == "Service Request")
        {
            $guest_request = $request->input('service_request');

            $bookno = $request->input('bookno');
            $add->Request_ID = $randID;
            $add->Room_No = $request->input('roomno');
            $add->Booking_No = $bookno;
            $add->Guest_Name = $request->input('guest_name');
            $add->Type_of_Request = $type_of_request;
            $add->Request = $guest_request;
        }
        elseif($type_of_request == "Item Request")
        {
            $guest_request = $request->input('item_request');

            $bookno = $request->input('bookno');
            $add->Request_ID = $randID;
            $add->Room_No = $request->input('roomno');
            $add->Booking_No = $bookno;
            $add->Guest_Name = $request->input('guest_name');
            $add->Type_of_Request = $type_of_request;
            $add->Request = $guest_request;
            $add->Quantity = $request->input('qty');
        }

        
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

    public function Operation_Requests()
    {
        $list = DB::select("SELECT * FROM guest_requests a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No");
    
        return view('Admin.pages.OperationManagement.Requests', ['list' => $list]);
    }
    
    public function update_service_request($id, $bs)
    {
        try{
            $datenow = Carbon::now()->format('Y-m-d');
            $req_id = $id;
            
            $status;

            if($bs == "Checked-Out")
            {
                $status = "Unaccomplished";
            }
            else
            {
                $status = "Accomplished";
            }
            
            $sql = DB::table('guest_requests')->where('Request_ID', $req_id)->update([
                'Status' => $status,
                'Date_Updated' => $datenow,
                'IsArchived' => 1
            ]);

            if($sql)
            {
                Alert::Success('Successfully Updated!', 'Guest Request '.$status.'!');
                return redirect('Guest_Request')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Guest Request Failed Updating!');
                return redirect('Guest_Request')->with('Failed', 'Data Saved');
            }

        }
        catch(\Illuminate\Database\QueryException $e){
            Alert::Error('Failed', 'Guest Request Failed Updating!');
            return redirect('Guest_Request')->with('Failed', 'Data Saved');
        }
    }
}