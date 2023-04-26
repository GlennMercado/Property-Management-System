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
use Carbon\Carbon;
use App\Notifications\Booked;
use App\Notifications\Success;
use Mail;
use App\Models\User;
use App\Models\Notification;

class GuestController extends Controller
{
    public function welcome()
    {   
        return view('Guest.guest_welcome');
    }
    // public function notify()
    // {
    //     if (auth()->user()) {
    //         $user = Auth::user();
    //         auth()->user()->notify(new NVDCnotif($user));
    //     } else{
    //         Alert::Error('Failed', 'sommething went wrong');
    //         return redirect('/welcome')->with('Error', 'Failed');
    //     }      
    // }
    public function booked()
    {
        if (auth()->user()) {
            $user = Auth::user();
            auth()->user()->notify(new Booked($user));
        } else{
            Alert::Error('Failed', 'sommething went wrong');
            return redirect('/welcome')->with('Error', 'Failed');
        }      
    }
    public function MyNotif(){
        return view('Guest.MyNotifications');
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
        $list = DB::select('SELECT * FROM complaints ORDER BY created_at DESC');  
        return view('Guest.guestedit', ['list'=>$list]);
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

        $sql = DB::select("SELECT * FROM commercial_spaces_applications");
        $data = array();

        foreach($sql as $s)
        {
            $data[] = ['date' => $s->Interview_Date];
        }

        return view('Guest.MyBookings', ['list' => $list, 'event'=>$event, 'event1'=>$event1, 'comm'=>$comm, 'comm1'=>$comm1, 'data' => $data]);
    }
    public function suites($id)
    {
        $room_id = $id;
        $room_list = DB::select("SELECT * FROM novadeci_suites WHERE Room_No = '$room_id'");

        $reserve_check = DB::select("SELECT * FROM hotel_reservations WHERE Room_No = '$room_id'");
        $email = Auth::user()->email;

        $room = DB::select("SELECT * FROM novadeci_suites a INNER JOIN hotel_room_supplies b ON a.Room_No = b.Room_No INNER JOIN hotel_room_linens c ON a.Room_No = c.Room_No GROUP BY a.Room_No");
		
        $guest = DB::select("SELECT * FROM users WHERE email = '$email'");
        return view('Guest.suites', ['guest'=>$guest, 'room'=>$room, 'room_list'=>$room_list, 'reserve' => $reserve_check]);
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
    public function Commercial_Space()
    {
        $email = Auth::user()->email;
        $comm = DB::select("SELECT * FROM commercial_spaces_applications WHERE email = '$email'");
        $sql = DB::select("SELECT * FROM commercial_spaces_applications");
        $data = array();

        $list = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0 AND a.email = '$email'");
        $list2 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID INNER JOIN commercial_spaces_tenant_deposits c ON b.Tenant_ID = c.Tenant_ID WHERE a.IsArchived = 0 AND a.email = '$email'");
        $list3 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID INNER JOIN commercial_space_utility_bills c ON b.Tenant_ID = c.Tenant_ID WHERE a.IsArchived = 0 AND a.email = '$email'");
        $list4 = DB::select("SELECT * FROM commercial_space_rent_reports");
        $list5 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID INNER JOIN commercial_space_units c ON b.Space_Unit = c.Space_Unit WHERE a.IsArchived = 0 AND a.email = '$email'");
        $list6 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID INNER JOIN commercial_space_unit_reports c ON b.Tenant_ID = c.Tenant_ID WHERE a.IsArchived = 0 AND a.email = '$email'");
        
        foreach($sql as $s)
        {
            $data[] = ['date' => $s->Interview_Date];
        }
        return view('Guest.Commercial_Space', ['comm' => $comm, 'data' => $data, 'list' => $list, 'list2' => $list2, 'list3' => $list3, 'list4' => $list4, 'list5' => $list5, 'list6' => $list6]);
    }
    public function commercial_space_rent_payment(Request $request)
    {
        $path;
        $base64;
        $now = Carbon::now()->format('Y-m-d');
        $tenant_id = $request->input('tenant_id');
        $due = $request->input('due');
        $gcash = $request->input('gcash_account');

        if($request->hasfile('images'))
        {
            //add image to a folder
            $file = $request->file('images');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'--Space-Rent'.$request->input('tenant_id').'-.'.$extention;
            $path = $file->move('commercial_space_proof_payment/', $filename);

            
            //add image to database (which is not advisable)
            //$path2 = $request->file('images')->getRealPath();
            //$logo = file_get_contents($path2);
            $base64 = base64_encode($extention);
        }

        $sql = DB::table('commercial_spaces_tenants')->where(['Tenant_ID' => $tenant_id, 'Due_Date' => $due])->update(
            [
                'Paid_Date' => $now,
                'Gcash_Name' => $gcash,
                'Proof_Image' => $path,
                'Payment_Status' => 'Paid (Checking)'
            ]);
        
        if($sql)
        {
            Alert::Success('Success', 'Commercial Space Rent Successfully Submitted!');
            return redirect('Commercial_Space')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Failed', 'Commercial Space Rent Failed Submitting!');
            return redirect('Commercial_Space')->with('Success', 'Data Saved');
        }

    }
    public function commercial_space_utility_payment(Request $request)
    {
        $tenant_id = $request->input('tenant_id');
        $due = $request->input('due');
        $type = $request->input('type');
        $gcash = $request->input('gcash_account');
        $path;
        $now = Carbon::now()->format('Y-m-d');

        if($request->hasfile('images'))
        {
            //add image to a folder
            $file = $request->file('images');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'--Space-Utility_Bills'.$request->input('tenant_id').'-.'.$extention;
            $path = $file->move('commercial_space_proof_payment/', $filename);

            
            //add image to database (which is not advisable)
            //$path2 = $request->file('images')->getRealPath();
            //$logo = file_get_contents($path2);
            $base64 = base64_encode($extention);
        }

        $sql = DB::table('commercial_space_utility_bills')->where(['Tenant_ID' => $tenant_id, 'Type_of_Bill' => $type, 'Due_Date' => $due])
                ->update([
                    'Paid_Date' => $now,
                    'Payment_Status' => "Paid (Checking)",
                    'Gcash_Name' => $gcash,
                    'Proof_Image' => $path,
                    'updated_at' => DB::RAW('NOW()') 
                ]);

        if($sql)
        {
            Alert::Success('Success', 'Utility Bills Payment Successfully Submitted!');
            return redirect('Commercial_Space')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Failed', 'Commercial Space Payment Failed Submitting!');
            return redirect('Commercial_Space')->with('Success', 'Data Saved');
        }
    }

    public function commercial_space_maintenance_payment(Request $request)
    {
        $tenant_id = $request->input('tenant_id');
        $due = $request->input('due');
        $space_unit = $request->input('space_unit');
        $gcash = $request->input('gcash_account');
        $cost = $request->input('cost');
        $path;
        $now = Carbon::now()->format('Y-m-d');
        
        if($request->hasfile('images'))
        {
            //add image to a folder
            $file = $request->file('images');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'--Space-Utility_Bills'.$request->input('tenant_id').'-.'.$extention;
            $path = $file->move('commercial_space_proof_payment/', $filename);

            
            //add image to database (which is not advisable)
            //$path2 = $request->file('images')->getRealPath();
            //$logo = file_get_contents($path2);
            $base64 = base64_encode($extention);
        }

        $sql = DB::table('commercial_space_units')->where('Space_Unit', $space_unit)->update(
            [
                'Maintenance_Cost' => $cost,
                'Payment_Status' => "Paid (Checking)",
                'Gcash_Name' => $gcash,
                'Proof_Image' => $path,
                'Paid_Date' => $now,
                'updated_at' => DB::RAW('NOW()')
            ]);

        if($sql)
        {
            Alert::Success('Success', 'Maintenance Payment Successfully Submitted!');
            return redirect('Commercial_Space')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Failed', 'Maintenance Payment Failed Submitting!');
            return redirect('Commercial_Space')->with('Success', 'Data Saved');
        }

    }
    public function complaints_submit(Request $request){
        $this->validate($request,[
            'concern' => 'required',
            'concern_text' => 'required',
        ]);
        
        $submit = new complaints;
        $submit->status = 'On-going';
        $submit->name = Auth::user()->name;
        $submit->profile_pic = Auth::user()->profile_pic;
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
            return redirect('/complaints')->withStats(__('Complaint was successfully submitted.'));
        }
        else
        {
            return redirect('/complaints')->withStats(__('Sending failed.'));
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

            $checkindate = Carbon::createFromFormat('m/d/Y', $request->input('checkIn'))->format('Y-m-d');
            $checkoutdate = Carbon::createFromFormat('m/d/Y', $request->input('checkOut'))->format('Y-m-d');

            $reserve->Booking_No = $randID;
            $reserve->Email = $email;
            $reserve->Check_In_Date = $checkindate;
            $reserve->Check_Out_Date = $checkoutdate;
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
                $this->booked();
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
        $email = Auth::user()->email;
        $this->validate($request,[
            'business_name' => 'required',
            'business_style' => 'required',
            'business_address' => 'required',
            'email_website_fb' => 'required',
            'business_landline_no' => '',
            'business_mobile_no' => 'required',
            'name_of_owner' => 'required',
            'spouse' => '',
            'home_address' => 'required',
            'landline' => '',
            'mobile_no' => 'required',
            'tax_identification_no' => 'required',
            'tax_cert_valid_gov_id' => 'required'
        ]);
        
        $check = DB::select("SELECT * FROM commercial_spaces_applications WHERE email = '$email' AND Status != 'Tenant'");

        if($check)
        {
            Alert::Error('Failed', 'You still have Application being Processed!');
            return redirect('Commercial_Space')->with('Success', 'Data Saved');
        }
        $spouse;
        $business;
        $landline;
        $path;
        $path2;

        // Spouse
        if($request->input('spouse') != null)
        {
            $spouse = $request->input('spouse');
        }
        else
        {
            $spouse = null;
        }

        // Business landline
        if($request->input('business_landline_no') != null)
        {
            $business = $request->input('business_landline_no');
        }
        else
        {
            $business = null;
        }

        // Home Landline
        if($request->input('landline') != null)
        {
            $landline = $request->input('landline');
        }
        else
        {
            $landline = null;
        }
        
        if($request->hasfile('tin_images'))
        {
            //add image to a folder
            $file = $request->file('tin_images');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'--TIN-'.$request->input('name_of_owner').'-.'.$extention;
            $path = $file->move('commercial_space_application/', $filename);

            
            //add image to database (which is not advisable)
            //$path2 = $request->file('images')->getRealPath();
            //$logo = file_get_contents($path2);
            $base64 = base64_encode($extention);
        }

        if($request->hasfile('other_images'))
        {
            //add image to a folder
            $files = $request->file('other_images');
            $extentions = $files->getClientOriginalExtension();
            $filenames = time().'--Other-Docu-'.$request->input('name_of_owner').'-.'.$extentions;
            $path2 = $files->move('commercial_space_application/', $filenames);

            
            //add image to database (which is not advisable)
            //$path2 = $request->file('images')->getRealPath();
            //$logo = file_get_contents($path2);
            $base642 = base64_encode($extentions);
        }

        
        $submit = new commercial_spaces_application;

        $submit->email = $email;
        $submit->business_name = $request->input('business_name');
        $submit->business_style = $request->input('business_style');
        $submit->business_address = $request->input('business_address');
        $submit->email_website_fb = $request->input('email_website_fb');
        $submit->business_landline_no = $business;
        $submit->business_mobile_no = $request->input('business_mobile_no');
        $submit->name_of_owner = $request->input('name_of_owner');
        $submit->spouse = $spouse;
        $submit->home_address = $request->input('home_address');
        $submit->landline = $landline;
        $submit->mobile_no = $request->input('mobile_no');
        $submit->tax_identification_no = $request->input('tax_identification_no');
        $submit->TIN_Image = $path;
        $submit->tax_cert_valid_gov_id = $request->input('tax_cert_valid_gov_id');
        $submit->Other_Cert_Image = $path2;


        if($submit->save())
        {
            Alert::Success('Success', 'Application Successfully Submitted!');
            return redirect('Commercial_Space')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Failed', 'Application Failed');
            return redirect('commercial_spaces')->with('Error', 'Failed!');
        }
    }
    public function edit_commercial_spaces_application(Request $request)
    {
        try{
            $id = $request->input('id');
            $spouse;
            $business;
            $landline;
            if($request->input('spouse') != null)
            {
                $spouse = $request->input('spouse');
            }
            else
            {
                $spouse = null;
            }

            // Business landline
            if($request->input('business_landline_no') != null)
            {
                $business = $request->input('business_landline_no');
            }
            else
            {
                $business = null;
            }

            // Home Landline
            if($request->input('landline') != null)
            {
                $landline = $request->input('landline');
            }
            else
            {
                $landline = null;
            }

            $sql = DB::table("commercial_spaces_applications")->where('id', $id)->update(
                [
                    'business_name' => $request->input('business_name'),
                    'business_style' => $request->input('business_style'),
                    'business_address' => $request->input('business_address'),
                    'email_website_fb' => $request->input('email_website_fb'),
                    'business_landline_no' => $business,
                    'business_mobile_no' => $request->input('business_mobile_no'),
                    'name_of_owner' => $request->input('name_of_owner'),
                    'spouse' => $spouse,
                    'home_address' => $request->input('home_address'),
                    'landline' => $landline,
                    'mobile_no' => $request->input('mobile_no'),
                    'tax_identification_no' => $request->input('tax_identification_no'),
                    'tax_cert_valid_gov_id' => $request->input('tax_cert_valid_gov_id'),
                    'Status' => "Revised"
                ]
            );

            if($sql)
            {
                Alert::Success('Success', 'Application Successfully Revised!');
                return redirect('Commercial_Space')->with('Error', 'Failed!');
            }
            else
            {
                Alert::Error('Failed', 'Application not Updated');
                return redirect('Commercial_Space')->with('Error', 'Failed!');
            }
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Application not Edited');
            return redirect('Commercial_Space')->with('Error', 'Failed!');
        }
    }
    public function set_commercial_space_schedule(Request $request)
    {
        try
        {
            $id = $request->input('id');
            $date = Carbon::createFromFormat('m/d/Y', $request->input('interview_date'))->format('Y-m-d');

            $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(
                [
                    'Interview_Date' => $date,
                    'Status' => 'For Interview'
                ]
            );

            if($sql)
            {
                Alert::Success('Success', 'Interview Schedule Successfully Set');
                return redirect('Commercial_Space')->with('Error', 'Failed!');
            }
            else
            {
                Alert::Error('Failed', 'Setting Schedule Failed!');
                return redirect('Commercial_Space')->with('Error', 'Failed!');
            }
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Application not Edited');
            return redirect('Commercial_Space')->with('Error', 'Failed!');
        }
    }

}
