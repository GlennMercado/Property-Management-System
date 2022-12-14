<?php

namespace App\Http\Controllers;

use App\Models\hotel_reservations;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WelcomeController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         return view('welcome');
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
         /*$this->validate($request,[
             'checkIn' => 'required',
             'checkOut' => 'required',
             'gName' => 'required',
             'address' => 'required',
             'mobile' => 'required'
         ]);
 
         $maintain = new hotel_reservations;
 
         $maintain->check_in_date = $request->input('checkIn');
         $maintain->check_out_date = $request->input('checkOut');
         $maintain->guest_name = $request->input('gName');
         $maintain->address = $request->input('address');
         $maintain->mobile_num = $request->input('mobile');
 
         $maintain->save();
         Alert::Success('Success', 'Reservation was successfully submitted!');
         return redirect('welcome')->with('Success', 'Data Saved');*/
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
 
