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
    public function index()
    {
        return view('pages.Reservations.HotelReservationForm');
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

        $reserve = new hotel_reservations;

        $reserve->Reservation_No = $randID;
        $reserve->Check_In_Date = $request->input('checkIn');
        $reserve->Check_Out_Date = $request->input('checkOut');
        $reserve->Guest_Name = $request->input('gName');
        $reserve->Mobile_Num = $request->input('mobile');
        $reserve->No_of_Pax = $request->input('pax');
        $reserve->Room_No = $request->input('room_no');

        if($reserve->save())
        {
            Alert::Success('Success', 'Reservation was successfully submitted!');
            return redirect('HotelReservationForm')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Error', 'Reservation Failed!');
            return redirect('HotelReservationForm')->with('Error', 'Failed!');
        }

        
    }

    public function update_payment($id)
    {
        $reserveno = $id;
        $stats = "Paid";

        DB::table('hotel_reservations')->where('Reservation_No', $reserveno)->update(array('Payment_Status' => $stats));
        
        Alert::Success('Success', 'Reservation successfully updated!');
        return redirect('HotelReservationForm')->with('Success', 'Data Saved');
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
