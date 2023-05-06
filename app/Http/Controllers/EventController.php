<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\convention_center_applications;
use App\Models\events;
use App\Notifications\InquireEvent;
use App\Notifications\InquiryApproved;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\Event_Confirmation;
use DateTime;

class EventController extends Controller
{
    public function event_inquiry()
    {
        $list = DB::select("SELECT * FROM convention_center_applications WHERE Inquiry_Status = 'For Approval' OR Inquiry_Status = 'Approved' OR Inquiry_Status = 'Declined'"); 
        $list1 = DB::select("SELECT * FROM convention_center_applications WHERE Inquiry_Status = 'Event Approved'");
        $list2 = DB::select("SELECT * FROM convention_center_applications WHERE Inquiry_Status = 'Approved'");
        $current_date = date('Y-m-d');
        $list3 = DB::select("SELECT * FROM events WHERE start_date != '{$current_date}'");
        $list4 = DB::select("SELECT * FROM events WHERE start_date = '{$current_date}'");
        $list5 = DB::select("SELECT * FROM events");
        // $list4 = DB::table('events')->select(DB::raw('*'))->whereRaw('Date(start_date) = CURDATE()');
        $events = array();

        foreach($list5 as $lists)
        {
            $startDateTime = new DateTime($lists->start_date . ' ' . $lists->start_time);
            $endDateTime = new DateTime($lists->end_date . ' ' . $lists->end_time);

            $events[] = [
                'title' => $lists->client_name,
                'start' => $startDateTime->format('c'), // format as ISO string
                'end' => $endDateTime->format('c'), // format as ISO string
                'id' => $lists->id
            ];
        }
        
        return view('Admin.pages.Reservations.EventInquiryForm', ['list'=>$list, 'list1'=>$list1, 'list2'=>$list2, 'list3'=>$list3, 'events'=>$events, 'list4'=>$list4, 'list5'=>$list5]);
        // $forApproval = "For Approval";
    }

    public function event_view($id)
    {
        $eventid = $id;
        $list = DB::select("SELECT * FROM convention_center_applications WHERE id = '$eventid'");    
        return view('Admin.pages.Reservations.EventInquiryView', ['list'=>$list]);
    }

    public function event_approval(Request $request)
    {
        //Requesting Value
        $this->validate($request,[
            'event_status' => 'required',
            'id' => 'required',

            ]);

         //Setting the Variables
         $stat = $request->input('event_status');
         $id = $request->input('id');
         

         $sql = DB::table('convention_center_applications')->where('id', $id)->update(array
         (
             'inquiry_status' => $stat, 'updated_at' => DB::RAW('NOW()')
         ));


        if($sql)
        {
            $client = DB::table('convention_center_applications')->where('id', $id)->first();
            
            if ($client) {
                $email = $client->email;
                Mail::to($email)->send(new Event_Confirmation($client));
            }
            

            Alert::Success('Success', 'Successfully Updated!');
            return redirect('EventInquiryForm')->with('Success', 'Data Updated');
        }
        else
        {
            Alert::Error('Error', 'Failed!, Please Try Again.');
            return redirect('EventInquiryForm')->with('Success', 'Data Updated');
        }
    }
    public function update_status(Request $request)
    {
        try{
        $update_status = $request->input('update_status');
        $eventid = $request->input('eventid');
        $name = DB::table('convention_center_applications')
        ->where('id', $eventid)
        ->get();

        foreach ($name as $names) {
            Mail::to($names->Email)->send(new EventConfirmation($names));
        }
        DB::table('convention_center_applications')->where('id', $eventid)->update(array
        (
            'inquiry_status' => $update_status,
        ));
        Alert::Success('Success', 'Updated!');
        return redirect('EventInquiryForm')->with('Success', 'Status Updated');
    }
    catch(\Illuminate\Database\QueryException $e)
    {
        Alert::Error('Failed', 'Update Failed!');
        return redirect('EventInquiryForm')->with('Failed', 'Status was not Updated');
    }

    }

    public function add_event(Request $request)
    {

        // $this->validate($request,[
        //     'facility' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'start_time' => 'required',
        //     'end_time' => 'required',
        //     'event_type' => 'required',
        //     'client_name' => 'required',
        //     'contact' => 'required',
        //     'guest_num' => 'required',
        //     'payment' => 'required',
        // ]);

            $add_event = new events;
            $add_event->event_name = $request->input('event_name');
            $add_event->facility = $request->input('facility');
            $add_event->start_date = $request->input('start_date');
            $add_event->end_date = $request->input('end_date');
            $add_event->start_time = $request->input('start_time');
            $add_event->end_time = $request->input('end_time');
            $add_event->event_type = $request->input('event_type');
            $add_event->client_name = $request->input('client_name');
            $add_event->contact_number = $request->input('contact');
            $add_event->num_of_guest = $request->input('guest_num');
            $add_event->payment = $request->input('payment');
            
            if($add_event->save())
            {
                Alert::Success('Success', 'Event Successfully Created!');
                return redirect('EventInquiryForm')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Error', 'Event Creation Failed');
                return redirect('EventInquiryForm')->with('Error', 'Data Not Saved');
            }
    }
}
