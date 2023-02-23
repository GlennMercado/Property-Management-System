<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\convetion_center_application;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function event_inquiry()
    {
        $list = DB::select('SELECT * FROM convention_center_applications');    
        return view('Admin.pages.Reservations.EventInquiryForm', ['list'=>$list]);
    }
    public function EventInquiryView()
    {
        $list = DB::select('SELECT * FROM convention_center_applications');    
        return view('Admin.pages.Reservations.EventInquiryView', ['list'=>$list]);
    }
}
