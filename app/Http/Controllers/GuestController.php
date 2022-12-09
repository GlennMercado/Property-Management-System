<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function welcome()
    {
        $list = DB::select('SELECT * FROM hotel_reservations');
	    $room = DB::select('SELECT * FROM novadeci_suites');
        
        return view('Guest.guest_welcome', ['list'=>$list, 'room'=>$room]);
    }
}
