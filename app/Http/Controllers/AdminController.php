<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\hotel_reservations;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    { 
        return view('Admin.admindashboard');
    }

    public function Calendar(Request $request)
    {
        $room = DB::select('SELECT * FROM novadeci_suites');
        $events = array();

        $bookings = hotel_reservations::all();
       
        
        foreach($bookings as $booking)
        {
            $events[] = [
                'title' => $booking->Room_No.' - '.$booking->Guest_Name,
                'start' => $booking->Check_In_Date,
                'end' => $booking->Check_Out_Date
            ];
        }
        return view('Admin.pages.Calendar', ['room'=>$room, 'events'=>$events]);
    }
    public function hotel_sched(Request $request)
    {
        
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $randID = str_shuffle($pin);
        $paystats = "Paid";
        $status = "Checked-In";

        
        $request->validate([
            'room_no' => 'required',
            'checkin' => '',
            'checkout' => '',
            'pax' => 'required',
            'mobile_num' => 'required',
            'guest_name' => 'required'
        ]);
       
        $checkoutdate = date('Y-m-d', strtotime($request->checkout));

        $booking = hotel_reservations::create([
            'Reservation_No' => $randID,
            'Guest_Name' => $request->guest_name,
            'Mobile_Num' => $request->mobile_num,
            'Room_No' => $request->room_no,
            'No_of_Pax' => $request->pax,
            'Payment_Status' => $paystats,
            'Booking_Status' => $status,
            'Check_In_Date' => $request->checkin,
            'Check_Out_Date' => $checkoutdate,
        ]);

        DB::table('novadeci_suites')->where('Room_No', $request->room_no)->update(array('Status' => $status));

        return response()->json($booking);
    }

}
