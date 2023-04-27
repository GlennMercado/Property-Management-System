<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\convention_center_applications;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function event_inquiry()
    {
        $list = DB::select('SELECT * FROM convention_center_applications'); 
        $list2 = DB::select("SELECT * FROM convention_center_applications WHERE Inquiry_Status = 'Approved'");
        return view('Admin.pages.Reservations.EventInquiryForm', ['list'=>$list, 'list2'=>$list2]);
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
             'inquiry_status' => $stat
         
         ));

        //Inserting into Database
        if($sql)
        {
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
        $this->validate($request,[
            'eventid' => 'required',
            'update_status' => 'required',
        ]);
        $update_status = $request->input('update_status');
        $eventid = $request->input('eventid');

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
}
