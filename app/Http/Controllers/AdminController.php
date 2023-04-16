<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\hotel_reservations;
use Illuminate\Support\Facades\DB;
use App\Models\complaints;
use App\Models\novadeci_suites;
use App\Models\convention_center_application;
use App\Models\commercial_spaces_application;
use App\Models\finance_2_reports;

class AdminController extends Controller
{
    public function index()
    { 
        // Room Management Data
        $vacant = novadeci_suites::where('Status', 'Vacant for Accommodation')->count();
        $occupied = novadeci_suites::where('Status', 'Occupied')->count();
        $reserved = novadeci_suites::where('Status', 'Reserved')->count();
        $vacant_cleaning = novadeci_suites::where('Status', 'Vacant for Cleaning')->count();
        // Front Desk Data
        $reserved_guests = hotel_reservations::where('Booking_Status','Reserved')->count();
        $pending_guests = hotel_reservations::where('Payment_Status','Pending')->count();
        $checked_guests = hotel_reservations::where('Booking_Status','Checked-In')->count();
        $checked_out_guests = hotel_reservations::where('Payment_Status','Checked-Out')->count();
        // Arriving/Departing
        $arriving = DB::table('hotel_reservations')->select(DB::raw('*'))->whereRaw('Date(Check_In_Date) = CURDATE()')->count();
        // Event Inquiry
        $inquiries = convention_center_application::count();
        // Commercial Spaces Applications
        $comm_applications = commercial_spaces_application::count();

     
        //Finance Dashboards Sums
        $basketball_sum = finance_2_reports::sum('basketball');
        $unearned_sum = finance_2_reports::sum('unearned');
        $otherincome_sum = finance_2_reports::sum('otherincome');
        $parking_sum = finance_2_reports::sum('parking');
        $managementfee_sum = finance_2_reports::sum('managementfee');
        $event_sum = finance_2_reports::sum('event');
        $hotel_sum = finance_2_reports::sum('hotel');
        $commercialspace_sum = finance_2_reports::sum('commercialspace');


        return view('Admin.admindashboard', 
        compact(
            'vacant', 
            'reserved', 
            'occupied', 
            'vacant_cleaning', 
            'reserved_guests',
            'pending_guests',
            'checked_guests', 
            'checked_out_guests',
            'inquiries',
            'comm_applications',
            'basketball_sum',
            'unearned_sum',
            'otherincome_sum',
            'parking_sum', 
            'managementfee_sum',
            'event_sum',
            'hotel_sum',
            'commercialspace_sum'));
    }

    public function Calendar(Request $request)
    {
        $room = DB::select('SELECT * FROM novadeci_suites');
        $events = array();

        $bookings = DB::select("SELECT * FROM hotel_reservations WHERE Booking_Status != 'Pending'");
       
        $list = DB::select("SELECT * FROM hotel_reservations");
        
        foreach($bookings as $booking)
        {
            $events[] = [
                'title' => $booking->Room_No.' - '.$booking->Guest_Name,
                'start' => $booking->Check_In_Date,
                'end' => $booking->Check_Out_Date,
                'id' => $booking->Booking_No,
                'status' => $booking->Booking_Status
            ];
        }
        return view('Admin.pages.Calendar', ['room'=>$room, 'events'=>$events, 'list' => $list]);
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
