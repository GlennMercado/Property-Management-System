<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\hotel_reservations;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\hotel_other_charges;

class GuestFolioController extends Controller
{
    public function guest_folio(){
        $list = DB::select("SELECT * FROM hotel_reservations WHERE Booking_Status IN ('Checked-In', 'Checking(Before Check-Out)', 'Checked-In2')");  
        $charges = DB::table('hotel_other_charges')->whereIn('Booking_No', array_column($list, 'Booking_No'))->get();
        return view('Admin.pages.Reservations.GuestFolio',  ['list'=>$list, 'charges'=>$charges]);
    }

    public function hotel_other_charges(Request $request)
    {
            $room_no = $request->input('room_no');
            $bookingid = $request->input('booking_no');    
            $charges = new hotel_other_charges;    
            $charges->Room_No = $room_no;
            $charges->Booking_No = $bookingid;
            $charges->Description = $request->input('description');
            $charges->Total_Amount = $request->input('total');
            if($charges->save())
            {
                Alert::Success('Success', 'Guest folio successfully updated!');
                return redirect('GuestFolio')->with('Success', 'Data Updated');  
            }
            else
            {
                Alert::Error('Failed', 'Guest folio was not updated!');
                return redirect('GuestFolio')->with('Success', 'Data Updated');   
            }
    }
}
