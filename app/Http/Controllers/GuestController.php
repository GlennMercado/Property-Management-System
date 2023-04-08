<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\hotel_reservations;
use App\Models\housekeeping;
use App\Models\convention_center_application;
use App\Models\commercial_spaces_application;
use App\Models\complaints;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

use Mail;

class GuestController extends Controller
{
    public function welcome()
    {   
        return view('Guest.guest_welcome');
    }
    public function BookingEmail(){
        return view('Guest.BookingEmail');
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
    public function guest_event()
    {
        return view('Guest.guest_event');
    }
    public function guest_commercial()
    {
        return view('Guest.guest_commercial_space');
    }
    public function my_bookings(){
        $email = Auth::user()->email;
        $user_id = Auth::user()->id;
        $list = DB::select("SELECT * FROM hotel_reservations WHERE Email = '$email'");
        $event = DB::select("SELECT * FROM convention_center_applications WHERE email = '$email'");
        $event1 = DB::select("SELECT * FROM convention_center_applications WHERE email = '$email'");
        $comm = DB::select("SELECT * FROM commercial_spaces_applications WHERE email = '$email'");
        $comm1 = DB::select("SELECT * FROM commercial_spaces_applications WHERE email = '$email'");
        return view('Guest.MyBookings', ['list' => $list, 'event'=>$event, 'event1'=>$event1, 'comm'=>$comm, 'comm1'=>$comm1]);
    }
    public function suites($id)
    {
        $room_id = $id;
        $room_list = DB::select("SELECT * FROM novadeci_suites WHERE Room_No = '$room_id'");
        $email = Auth::user()->email;

        $room = DB::select("SELECT * FROM novadeci_suites a INNER JOIN hotel_room_supplies b ON a.Room_No = b.Room_No INNER JOIN hotel_room_linens c ON a.Room_No = c.Room_No GROUP BY a.Room_No");
		
        $guest = DB::select("SELECT * FROM users WHERE email = '$email'");
        return view('Guest.suites', ['guest'=>$guest, 'room'=>$room, 'room_list'=>$room_list]);
    }
    public function convention_center()
    {
        return view('Guest.convention_center');
    }
    public function function_room()
    {
        return view('Guest.function_room');
    }
    public function commercial_spaces()
    {
        return view('Guest.commercial_spaces');
    }
    public function event_form()
    {
        return view('Guest.event_form');
    }
    public function complaints(){
        return view('Guest.complaints');
    }
    public function rooms(){
        $room = DB::select('SELECT * FROM novadeci_suites a INNER JOIN hotel_room_supplies b ON a.Room_No = b.Room_No INNER JOIN hotel_room_linens c ON a.Room_No = c.Room_No GROUP BY a.Room_No');
        return view('Guest.rooms', ['room'=>$room]);
    }
    public function FAQ(){
        return view('Guest.FAQ');
    }
    public function complaints_submit(Request $request){
        $this->validate($request,[
            'concern' => 'required',
            'concern_text' => 'required',
        ]);
        
        $submit = new complaints;
        $submit->concern = $request->input('concern');
        $submit->concern_text = $request->input('concern_text');
        if($request->hasfile('images'))
        {
            //add image to a folder
            $file = $request->file('images');
            $extention = $file->getClientOriginalExtension();
            $filename = time().$request->input('id').'-.'.$extention;
            $path = $file->move('complaints-img/', $filename);

            $base64 = base64_encode($extention);

            $submit->complaints_img = $path;
            $submit->DB_Image = $base64;
        }

        if($submit->save())
        {
            Alert::Success('Success', 'Feedback Submitted!');
            return redirect('/complaints')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Failed', 'Feedback not sent');
            return redirect('/complaints')->with('Error', 'Failed!');
        }
    }
    public function guest_reservation(Request $request)
    {
        $email = Auth::user()->email;

        $check = DB::select("SELECT * FROM hotel_reservations WHERE Email = '$email' AND IsArchived = 0");

        if($check)
        {
            Alert::Error('Failed', 'Reservation already booked!');
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
                'pax' => 'required',
                'gcash_account' => 'required',
            ]);
            

            $reserve = new hotel_reservations;

            $reserve->Booking_No = $randID;
            $reserve->Email = $email;
            $reserve->Check_In_Date = $request->input('checkIn');
            $reserve->Check_Out_Date = $request->input('checkOut');
            $reserve->Guest_Name = $request->input('gName');
            $reserve->Mobile_Num = $request->input('mobile');
            $reserve->No_of_Pax = $request->input('pax');
            $reserve->Payment = $request->input('payment');
            $reserve->Room_No = $request->input('room_no');
            $reserve->gcash_account_name = $request->input('gcash_account');

            if($request->hasfile('images'))
            {
                $file = $request->file('images');
                $extension = $file->getClientOriginalExtension();
                $filename = time().$request->input('id').'-.'.$extension;
                $path = $file->move('payments-img/', $filename);

                $base64 = base64_encode($extension);

                $reserve->Proof_Image = $path;
                $reserve->DB_Proof_Image = $base64;
            }

            if($reserve->save())
            {
                Alert::Success('Success', 'Reservation submitted successfully!');
                return redirect('/welcome')->with('Success', 'Data Saved');
                $mail = Auth::user()->email;
                $name = Auth::user()->name;
                $data=['name'=>$name, 'data'=>"Hello world"];
                $user['to']=$mail;
                Mail::send('Guest.BookingEmail',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Hello');
                });
            }
            else
            {
                Alert::Error('Error', 'Reservation Failed!');
                return redirect('/welcome')->with('Error', 'Failed!');
            }
        }
    }
    public function convention_center_application(Request $request)
    {         
            $this->validate($request,[
                'client_name' => 'required',
                'contact_no' => 'required',
                'contact_person' => 'required',
                'contact_person_no' => 'required',
                'billing_address' => 'required',
                'email_address' => 'required',
                'event_name' => 'required',
                'event_type' => 'required',
                'event_date' => 'required',
                'no_of_guest' => 'required',
                'venue' => 'required',
                'caterer' => 'required',
                'audio_visual' => 'required',
                'inquiry_status' => '',
                'concept' => 'required'
            ]);
            
            $submit = new convention_center_application;
            $submit->email = Auth::user()->email;
            $submit->client_name = $request->input('client_name');
            $submit->contact_no = $request->input('contact_no');
            $submit->contact_person = $request->input('contact_person');
            $submit->contact_person_no = $request->input('contact_person_no');
            $submit->billing_address = $request->input('billing_address');
            $submit->email_address = $request->input('email_address');
            $submit->event_name = $request->input('event_name');
            $submit->event_type = $request->input('event_type');
            $submit->event_date = $request->input('event_date');
            $submit->no_of_guest = $request->input('no_of_guest');
            $submit->venue = $request->input('venue');
            $submit->caterer = $request->input('caterer');
            $submit->audio_visual = $request->input('audio_visual');
            $submit->concept = $request->input('concept');
            $submit->inquiry_status = $request->input('inquiry_status');
            if($submit->save())
            {
                Alert::Success('Success', 'Inquiry submitted successfully!');
                return redirect('/convention_center')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Inquiry was not sent');
                return redirect('/convention_center')->with('Error', 'Failed!');
            }
    }

    public function commercial_spaces_application(Request $request)
    {         
            $this->validate($request,[
                'business_name' => 'required',
                'business_style' => 'required',
                'business_address' => 'required',
                'email_website_fb' => 'required',
                'business_landline_no' => 'required',
                'business_mobile_no' => 'required',
                'name_of_owner' => 'required',
                'spouse' => 'required',
                'home_address' => 'required',
                'landline' => 'required',
                'mobile_no' => 'required',
                'tax_identification_no' => 'required',
                'tax_cert_valid_gov_id' => 'required'
            ]);
            
            $submit = new commercial_spaces_application;
            $submit->email = Auth::user()->email;
            $submit->business_name = $request->input('business_name');
            $submit->business_style = $request->input('business_style');
            $submit->business_address = $request->input('business_address');
            $submit->email_website_fb = $request->input('email_website_fb');
            $submit->business_landline_no = $request->input('business_landline_no');
            $submit->business_mobile_no = $request->input('business_landline_no');
            $submit->name_of_owner = $request->input('name_of_owner');
            $submit->spouse = $request->input('spouse');
            $submit->home_address = $request->input('home_address');
            $submit->landline = $request->input('landline');
            $submit->mobile_no = $request->input('mobile_no');
            $submit->tax_identification_no = $request->input('tax_identification_no');
            $submit->tax_cert_valid_gov_id = $request->input('tax_cert_valid_gov_id');


            if($submit->save())
            {
                Alert::Success('Success', 'Inquiry submitted successfully!');
                return redirect('/commercial_spaces')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Inquiry not sent');
                return redirect('/commercial_spaces')->with('Error', 'Failed!');
            }
    }

}
