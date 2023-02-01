<?php

namespace App\Http\Controllers;

use App\Models\hotel_reservations;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotel_reservation_form()
    {
        $list = DB::select('SELECT * FROM hotel_reservations');
		$room = DB::select('SELECT * FROM novadeci_suites');    
        return view('Admin.pages.Reservations.HotelReservationForm', ['list'=>$list, 'room'=>$room]);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Available alpha caracters
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

        $paystats = "Paid";
        $status = "Checked-In";
        $reserve = new hotel_reservations;
        $roomno = $request->input('room_no');

        $reserve->Reservation_No = $randID;
        $reserve->Check_In_Date = $request->input('checkIn');
        $reserve->Check_Out_Date = $request->input('checkOut');
        $reserve->Guest_Name = $request->input('gName');
        $reserve->Mobile_Num = $request->input('mobile');
        $reserve->No_of_Pax = $request->input('pax');
        $reserve->Room_No = $roomno;
        $reserve->Payment_Status = $paystats;
        $reserve->Booking_Status = $status;

        if($reserve->save())
        {
            DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $status));
            
            Alert::Success('Success', 'Reservation was successfully submitted!');
            return redirect('HotelReservationForm')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Error', 'Reservation Failed!');
            return redirect('HotelReservationForm')->with('Error', 'Failed!');
        }

        
    }

    public function update_payment($id, $no, $check)
    {
        $reserveno = $id;
        $roomno = $no;
        $isvalid = $check;

        $stats = "Paid";
        $stats2 = "Reserved";

        if($isvalid == true)
        {
            $check = DB::select("SELECT * FROM novadeci_suites WHERE Room_No = '$roomno' AND Status = 'Available'");
        
            if($check)
            {
                DB::table('hotel_reservations')->where('Reservation_No', $reserveno)->update(array('Payment_Status' => $stats, 'Booking_Status' => $stats2));
                DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $stats2));
        
                Alert::Success('Success', 'Reservation successfully updated!');
                return redirect('HotelReservationForm')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Room is already reserved!');
                return redirect('HotelReservationForm')->with('Success', 'Data Saved');
            }
        }
        else
        {
            Alert::Error('Failed', 'Reservation is not available!');
            return redirect('HotelReservationForm')->with('Success', 'Data Saved');
        }    
    }

    public function update_booking_status($id, $no, $check, $stats)
    {
            $reserveno = $id;
            $roomno = $no;
            $isvalid = $check;
            
            $status = $stats;
            
            if($status == "Checked-In")
            {
                if($isvalid == true)
                {
                    DB::table('hotel_reservations')->where('Reservation_No', $reserveno)->update(array('Booking_Status' => $status));
                    DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $status));
    
                    Alert::Success('Success', 'Reservation successfully updated!');
                    return redirect('HotelReservationForm')->with('Success', 'Data Saved');
                }
                else
                {
                    Alert::Error('Error', 'Reservation is not available!');
                    return redirect('HotelReservationForm')->with('Success', 'Data Updated');
                }
            }
            if($status == "Checked-Out")
            {
                if($isvalid == true)
                {
                    $hstatus = "Out of Service";
                    DB::table('hotel_reservations')->where('Reservation_No', $reserveno)->update(array(
                        'Booking_Status' => $status,
                        'Isvalid' => false
                    ));
                    DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $status));
                    DB::table('housekeepings')->where('Room_No', $roomno)->update(array('Housekeeping_Status' => $hstatus));


                    Alert::Success('Success', 'Reservation successfully updated!');
                    return redirect('HotelReservationForm')->with('Success', 'Data Saved');
                }
                else
                {
                    Alert::Error('Error', 'Reservation is not available!');
                    return redirect('HotelReservationForm')->with('Success', 'Data Updated');
                }
            }
            
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
