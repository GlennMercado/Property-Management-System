<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\hotel_reservations;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class GuestController extends Controller
{
    public function welcome()
    {
        $email = Auth::user()->email;
        $list = DB::select('SELECT * FROM hotel_reservations');
	    $room = DB::select('SELECT * FROM novadeci_suites');
        $guest = DB::select("SELECT * FROM users WHERE email = '$email'");
        
        return view('Guest.guest_welcome', ['list'=>$list, 'room'=>$room, 'guest'=>$guest]);
    }
    public function about_us()
    {
        return view('Guest.AboutUs');
    }
    public function contact_us()
    {
        return view('Guest.ContactUs');
    }
    public function map()
    {
        return view('Guest.Map');
    }
    public function guest_profile()
    {
        return view('Guest.guestedit');
    }
    public function guest_reservation(Request $request)
    {
        $email = Auth::user()->email;

        $check = DB::select("SELECT * FROM hotel_reservations WHERE Email = '$email'");

        if($check)
        {
            Alert::Error('Failed', 'You have already booked a hotel reservation!');
            return redirect('/welcome')->with('Error', 'Failed');
        }
        else
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];

            // shuffle the result
            $randID = str_shuffle($pin);

            
            $this->validate($request,[
                'checkIn' => 'required',
                'checkOut' => 'required',
                'gName' => 'required',
                'mobile' => 'required',
                'room_no' => 'required',
                'pax' => 'required'
            ]);
            

            $reserve = new hotel_reservations;

            $reserve->Reservation_No = $randID;
            $reserve->Email = $email;
            $reserve->Check_In_Date = $request->input('checkIn');
            $reserve->Check_Out_Date = $request->input('checkOut');
            $reserve->Guest_Name = $request->input('gName');
            $reserve->Mobile_Num = $request->input('mobile');
            $reserve->No_of_Pax = $request->input('pax');
            $reserve->Room_No = $request->input('room_no');

            if($reserve->save())
            {
                Alert::Success('Success', 'Reservation was successfully submitted!');
                return redirect('/welcome')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Error', 'Reservation Failed!');
                return redirect('/welcome')->with('Error', 'Failed!');
            }
        }
    }
}
