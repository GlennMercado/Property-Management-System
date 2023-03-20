<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\hotel_reservations;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GuestFolioController extends Controller
{
    public function guest_folio(){
        $list = DB::select("SELECT * FROM hotel_reservations  WHERE Booking_Status = 'Checked-In' ");  
        // $list = hotel_reservations::where('Booking_Status', 'Checked-In')->firstOrfail();
        return view('Admin.pages.Reservations.GuestFolio',  ['list'=>$list]);
    }
}
