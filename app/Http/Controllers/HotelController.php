<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\hotel_reservations;
use App\Models\housekeepings;
use App\Models\novadeci_suites;
use App\Models\finance_2_reports;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use App\Notifications\Booked;
use App\Notifications\Success;
use Mail;
use App\Models\User;
use App\Models\Notification;

class HotelController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotel_reservation_form()
    {   
        $count_daily = hotel_reservations::whereDate('Check_In_Date', DB::raw('CURDATE()'))->count();
        $count_daily1 = hotel_reservations::whereDate('Check_Out_Date', DB::raw('CURDATE()'))->count();
        $reserved_guests = hotel_reservations::where('Booking_Status','Reserved')->count(); 
        $checked_guests = hotel_reservations::where('Payment_Status','Checked-In')->count(); 
        $checked_out_guests = hotel_reservations::where('Payment_Status','Checked-Out')->count(); 
        $list = DB::select('SELECT * FROM hotel_reservations');
		$room = DB::select('SELECT * FROM novadeci_suites');
        $supply = DB::select('SELECT * FROM hotelstocks');  
        return view('Admin.pages.Reservations.HotelReservationForm', compact('count_daily1', 'reserved_guests', 'checked_guests', 'checked_out_guests', 'count_daily'),['list'=>$list, 'room'=>$room, 'supply'=>$supply,]);
    }
     public function guest_viewing()
     {
        $list = DB::select('SELECT * FROM hotel_reservations');
		$room = DB::select('SELECT * FROM novadeci_suites');
        $supply = DB::select('SELECT * FROM hotelstocks');  
        return view('Admin.pages.OperationManagement.Guest_Reservation', ['list'=>$list, 'room'=>$room, 'supply'=>$supply,]);
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

  
        $datenow = Carbon::now()->format('Y-m-d');
        $checkindate = Carbon::createFromFormat('m/d/Y', $request->input('checkIn'))->format('Y-m-d');
        $checkoutdate = Carbon::createFromFormat('m/d/Y', $request->input('checkOut'))->format('Y-m-d');

        if($checkindate == $datenow)
        {
            $status = "Occupied";
            $fstats = "Checked-In";
        }
        elseif($checkindate > $datenow)
        {
            $status = "Reserved";
            $fstats = "Reserved";
        }
        else
        {
            return redirect('FrontDesk')->withStats('Reservation Failed');  
        }
        

        

        $reserve = new hotel_reservations;
        $roomno = $request->input('room_no');

        $reserve->Booking_No = $randID;
        $reserve->Check_In_Date = $checkindate;
        $reserve->Check_Out_Date = $checkoutdate;
        $reserve->Guest_Name = $request->input('gName');
        $reserve->Mobile_Num = $request->input('mobile');
        $reserve->No_of_Pax = $request->input('pax');
        $reserve->Room_No = $roomno;
        $reserve->Payment_Status = $paystats;
        $reserve->Booking_Status = $fstats;
        $reserve->Payment = $request->input('payment');

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
    // SPECIFY THE USER
    public function success()
    {
        if (auth()->user()) {
            $user = Auth::user();
            auth()->user()->notify(new Success($user));
        } else{
            Alert::Error('Failed', 'sommething went wrong');
            return redirect('/welcome')->with('Error', 'Failed');
        }      
    }
    // 

    public function update_payment($id, $no, $check)
    {
        $bookno = $id;
        $roomno = $no;
        $isarchived = $check;

        $stats = "Paid";
        $stats2 = "Reserved";


        if($isarchived == false)
        {
            $check = DB::select("SELECT * FROM novadeci_suites WHERE Room_No = '$roomno'");

            $stats3;

            foreach($check as $checks)
            {
                $stats3 = $checks->Status;
            }
        
          
            $facility = "Hotel Room";

            //For FinanceModule Variables
            // $ornum = DB::table('hotel_reservations')->where('id')->get();
            $particular = "Hotel";
            $debit = "Cash";
            $remark = "FULL";
            $finance_amount = DB::table('hotel_reservations')->select('Payment')->first()->Payment;

            $reservations = DB::table('hotel_reservations')->where('Booking_No', $bookno)->get();

            foreach ($reservations as $reservation) {
                $ornum = $reservation->id;
                $finance_payee = $reservation->gcash_account_name;
                $finance_amount = $reservation->Payment;
                $finance_eventdate = $reservation->Check_In_Date;
                // other variables and insert query here
            }

            $outvat = .12;
            $gross = 1.12;
            $cash = $finance_amount / $gross;
            $vat = $outvat * $cash;

            $this->success();
            $user = DB::select("SELECT Guest_Name FROM hotel_reservations WHERE Room_No = '$roomno'");
            // auth()->user()->notify(new Booked($user));
            $mail = Auth::user()->email;
            $name = Auth::user()->name;
            $data=['name'=>$name, 'data'=>"Hello world"];
            $user['to']=$mail;
            Mail::send('Guest.Reserve',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('Hello');
            });    

            DB::table('hotel_reservations')->where('Booking_No', $bookno)->update(array('Payment_Status' => $stats, 'Booking_Status' => $stats2));
            
            if($stats3 != "Checked-In")
            {
                DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $stats2));
            }

            DB::insert('insert into housekeepings (Room_No, Booking_No, Facility_Type, Facility_Status, Front_Desk_Status) 
            values (?, ?, ?, ?, ?)', [$roomno, $bookno, $facility, $stats2, $stats2]);

            DB::insert('insert into finance_2_reports (ornum, payee, particular, debit, remark, amount , eventdate, cash, hotel, outputvat) 
            values (?, ?, ?, ?, ?, ?, ? , ?, ?, ?)', [$ornum, $finance_payee, $particular, $debit, $remark, $finance_amount, $finance_eventdate, $finance_amount, $cash, $vat]);
            Alert::Success('Success', 'Payment successfully updated!');
            return redirect('HotelReservationForm')->with('Success', 'Data Saved');
        
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

                    $check = DB::select("SELECT * FROM hotel_reservations WHERE Room_No = '$roomno' AND Booking_Status = 'Checked-In'");

                    if($check)
                    {
                        Alert::Error('Error', 'Booking is not available!');
                        return redirect('HotelReservationForm')->with('Success', 'Data Updated');
                    }
                    else
                    {
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
                    
                    $check2 = DB::select("SELECT * FROM hotel_reservations WHERE Room_No = '$roomno' AND Booking_Status = 'Checked-In'");

                    if($check2)
                    {
                        Alert::Error('Error', 'Booking is not available!');
                        return redirect('HotelReservationForm')->with('Success', 'Data Updated');
                    }
                    else
                    {
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
                    $roomstats = "Vacant for Accommodation";
                    DB::table('hotel_reservations')->where('Booking_No', $bookno)->update(array(
                        'Booking_Status' => $status,
                        'isarchived' => true
                    ));
                    DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $roomstats));

                    DB::table('housekeepings')->where('Booking_No', $bookno)->update(['Front_Desk_Status' => "Checked-Out"]);

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
            if($status == "Checking(Before Check-Out)")
            {
                if($isarchived == false)
                {
                    $hstatus = "Inspect";
                    $roomstats = "Vacant for Cleaning";
                    DB::table('hotel_reservations')->where('Booking_No', $bookno)->update(array(
                        'Booking_Status' => $status,
                    ));
                    DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $roomstats));

                    DB::table('housekeepings')->where(['Room_No' => $roomno, 'Booking_No' => $bookno])->update(array('Housekeeping_Status' => $hstatus, 'Front_Desk_Status' => $status, 'Facility_Status' => $roomstats));

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
    public function front_desk_getdata($id)
    {
        $data = novadeci_suites::where('Room_No', $id)->first();

        return response()->json($data);
    }

    public function front_desk_getdate($id)
    {
        $min = DB::table('hotel_reservations')->where('Room_No', $id)->pluck('Check_In_Date')->toArray();
        $max = DB::table('hotel_reservations')->where('Room_No', $id)->pluck('Check_Out_Date')->toArray();
        return response()->json([
            'start' => $min,
            'end' => $max
        ]);
    }

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
    public function invoice($id, $bn)
    {
        $invoice_id = $id;
        $booking_no = $bn;
        $list = DB::select("SELECT * FROM hotel_reservations  WHERE Room_No = '$invoice_id' AND Booking_No = '$booking_no'");    
        $list2 = DB::select("SELECT * FROM used_supplies WHERE Room_No = '$invoice_id' AND Booking_No = '$booking_no'");
        $list3 = DB::select("SELECT * FROM hotel_other_charges WHERE Room_No = '$invoice_id' AND Booking_No = '$booking_no'");

        return view('Admin.pages.Reservations.Invoice', ['list'=>$list, 'list2' => $list2, 'list3' => $list3]);
    }

    public function check_in(Request $request){
        $booking_no = $request->input('booking');
        $booking_status = "Checked_In";

        DB::table('hotel_reservations')->where('Booking_No', $booking_no)->update(array
        (
            'Booking_Status' => $booking_status,
        ));

        Alert::Success('Success', 'Guest checked in!');
        return redirect('HotelReservationForm')->with('Success', 'Data Updated');
    }

    public function qrview($id)
    {
        $qr = $id;
        $list = DB::select("SELECT * FROM hotel_reservations WHERE Booking_No = '$qr'");    
        return view('Admin.pages.Reservations.CheckInQr', ['list'=>$list]);
    }

    // public function qrscan(){
    //     return view('Admin.pages.Reservations.CheckInQr');
    // }
}
