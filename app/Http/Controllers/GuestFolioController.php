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
        $list = DB::select("SELECT * FROM hotel_reservations  WHERE Booking_Status = 'Checked-In' OR Booking_Status = 'Checking(Before Check-Out)' OR Booking_Status = 'Checked-In2'");  
        // $list = hotel_reservations::where('Booking_Status', 'Checked-In')->firstOrfail();
        return view('Admin.pages.Reservations.GuestFolio',  ['list'=>$list]);
    }

    public function hotel_other_charges(Request $request)
    {
        try{
            $room_no = $request->input('room_no');
            $bookingid = $request->input('booking_no');
            
            

            for($i = 0; $i < count($request->input('description')); $i++)
            {
                $charges = new hotel_other_charges;
                
                $charges->Room_No = $room_no;
                $charges->Booking_No = $bookingid;
                $charges->Description = $request->input('description')[$i];
                $charges->Total_Amount = $request->input('total')[$i];
                $charges->save();
            }

            Alert::Success('Success', 'Guest folio successfully updated!');
            return redirect('GuestFolio')->with('Success', 'Data Updated');  
        }
        catch(\Illuminate\Database\QueryException $e)
        { 
            Alert::Error('Failed', 'Guest folio was not updated!');
            return redirect('GuestFolio')->with('Success', 'Data Updated');   
        }
    }
}
