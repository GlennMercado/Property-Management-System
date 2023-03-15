<?php

namespace App\Http\Controllers;

use App\Models\hotel_reservations;
use App\Models\housekeepings;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $supply = DB::select('SELECT * FROM hotelstocks');  
        return view('Admin.pages.Reservations.HotelReservationForm', ['list'=>$list, 'room'=>$room, 'supply'=>$supply]);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function front_desk()
    {
        $room = DB::select('SELECT a.Room_No, a.Status, a.No_of_Beds, a.Extra_Bed, a.Rate_per_Night FROM novadeci_suites a INNER JOIN hotel_room_supplies b ON a.Room_No = b.Room_No INNER JOIN hotel_room_linens c ON a.Room_No = c.Room_No GROUP BY a.Room_No');
        return view('Admin.pages.FrontDesk', ['room'=>$room]);
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
        $status;
        $fstats;

  
        $datenow = now()->format('Y-m-d');

        if($request->input('checkIn') == $datenow)
        {
            $status = "Occupied";
            $fstats = "Checked-In";
        }
        elseif($request->input('checkIn') > $datenow)
        {
            $status = "Reserved";
            $fstats = "Reserved";
        }
        

        

        $reserve = new hotel_reservations;
        $roomno = $request->input('room_no');

        $reserve->Booking_No = $randID;
        $reserve->Check_In_Date = $request->input('checkIn');
        $reserve->Check_Out_Date = $request->input('checkOut');
        $reserve->Guest_Name = $request->input('gName');
        $reserve->Mobile_Num = $request->input('mobile');
        $reserve->No_of_Pax = $request->input('pax');
        $reserve->Room_No = $roomno;
        $reserve->Payment_Status = $paystats;
        $reserve->Booking_Status = $fstats;

        if($reserve->save())
        {
            $facility = "Hotel Room";
            DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $status));

            DB::insert('insert into housekeepings (Room_No, Booking_No, Facility_Type, Facility_Status, Front_Desk_Status) 
            values (?, ?, ?, ?, ?)', [$roomno, $randID, $facility, $status, $fstats]);
            
            Alert::Success('Success', 'Reservation was successfully submitted!');
            return redirect('HotelReservationForm')->with('Success', 'Reservation Success');
        }
        else
        {
            Alert::Error('Error', 'Reservation Failed!');
            return redirect('HotelReservationForm')->with('Error', 'Failed!');
        }

        
    }

    public function update_payment($id, $no, $check)
    {
        $bookno = $id;
        $roomno = $no;
        $isarchived = $check;

        $stats = "Paid";
        $stats2 = "Reserved";

        if($isarchived == false)
        {
            $check = DB::select("SELECT * FROM novadeci_suites WHERE Room_No = '$roomno' AND Status = 'Vacant for Accommodation'");
        
            if($check)
            {
                $facility = "Hotel Room";

                DB::table('hotel_reservations')->where('Booking_No', $bookno)->update(array('Payment_Status' => $stats, 'Booking_Status' => $stats2));
                DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $stats2));

                DB::insert('insert into housekeepings (Room_No, Booking_No, Facility_Type, Facility_Status, Front_Desk_Status) 
                values (?, ?, ?, ?, ?)', [$roomno, $bookno, $facility, $stats2, $stats2]);
        
                Alert::Success('Success', 'Payment successfully updated!');
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
            $bookno = $id;
            $roomno = $no;
            $isarchived = $check;
            
            $status = $stats;
            
            if($status == "Checked-In")
            {
                if($isarchived == false)
                {
                    $sql = DB::select("SELECT * FROM hotel_reservations WHERE Booking_No = '$bookno'");

                    $chckin;
                    $chckout;

                    foreach($sql as $lists)
                    {
                        $chckin = $lists->Check_In_Date;
                        $chckout = $lists->Check_Out_Date;
                    }

                    $roomstats = "Occupied";
                    $facility = "Hotel Room";

                    DB::table('hotel_reservations')->where('Booking_No', $bookno)->update(array('Booking_Status' => $status));
                    DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $roomstats));
    
                    DB::insert('insert into housekeepings (Room_No, Booking_No, Facility_Type, Facility_Status, Front_Desk_Status) 
                    values (?, ?, ?, ?, ?)', [$roomno, $bookno, $facility, $roomstats, $status]);

                    Alert::Success('Success', 'Reservation successfully updated!');
                    return redirect('HotelReservationForm')->with('Success', 'Data Saved');
                }
                else
                {
                    Alert::Error('Error', 'Reservation is not available!');
                    return redirect('HotelReservationForm')->with('Success', 'Data Updated');
                }
            }
            if($status == "Checked-In2")
            {
                if($isarchived == false)
                {
                    $sql = DB::select("SELECT * FROM hotel_reservations WHERE Booking_No = '$bookno'");

                    $chckin;
                    $chckout;

                    foreach($sql as $lists)
                    {
                        $chckin = $lists->Check_In_Date;
                        $chckout = $lists->Check_Out_Date;
                    }

                    $roomstats = "Occupied";
                    $status2 = "Checked-In";

                    DB::table('hotel_reservations')->where('Booking_No', $bookno)->update(array('Booking_Status' => $status2));
                    DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $roomstats));
    
                    DB::table('housekeepings')->where('Booking_No', $bookno)->update(array('Facility_Status' => $roomstats, 'Front_Desk_Status' => $status2));

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
                if($isarchived == false)
                {
                    $hstatus = "Inspect";
                    $roomstats = "Vacant for Cleaning";
                    DB::table('hotel_reservations')->where('Booking_No', $bookno)->update(array(
                        'Booking_Status' => $status,
                        'isarchived' => true
                    ));
                    DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $roomstats));

                    DB::table('housekeepings')->where('Room_No', $roomno)->update(array('Housekeeping_Status' => $hstatus, 'Front_Desk_Status' => $status, 'Facility_Status' => $roomstats));

                    $sql2 = DB::select("SELECT * FROM housekeepings a INNER JOIN novadeci_suites b ON a.Room_No = b.Room_No WHERE a.Booking_No = '$bookno'");
                    $attendant;
                    $keyid;

                    foreach($sql2 as $lists)
                    {
                        $attendant = $lists->Attendant;
                        $keyid = $lists->Key_ID;
                    }

                    if($attendant != "Unassigned")
                    {
                        $due_time = Carbon::now();
                        Carbon::createFromFormat('Y-m-d H:i:s', $due_time);
                        
                        $due_time = Carbon::now()->addHour(2);

                        $issued_time = Carbon::now();
                        Carbon::createFromFormat('Y-m-d H:i:s', $issued_time);


                        DB::insert('insert into Key_Management (Key_ID, Room_No, Booking_No, Attendant, Issued_Time, Due_Time) 
                        values (?, ?, ?, ?, ?, ?)', [$keyid ,$roomno, $bookno, $attendant, $issued_time, $due_time]);

                        Alert::Success('Success', 'Booking Successfully Checked Out!');
                        return redirect('HotelReservationForm')->with('Success', 'Data Saved');

                    }
                    else
                    {
                        Alert::Success('Success', 'Booking Successfully Checked Out!');
                        return redirect('HotelReservationForm')->with('Success', 'Data Saved');
                    }
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
    public function guest_folio($id){
        $guest_folio_id = $id;    
        $list = DB::select("SELECT * FROM hotel_reservations  WHERE id = '$guest_folio_id'");    
        return view('Admin.pages.Reservations.GuestFolio', ['list'=>$list]);
    }

}
