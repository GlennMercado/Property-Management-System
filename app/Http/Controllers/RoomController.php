<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\novadeci_suites;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function add_rooms(Request $request)
    {
        $this->validate($request,[
            'room_no' => 'required',
            'room_size' => 'required',
            'no_of_beds' => 'required',
            'extra_bed' => 'required',
            'no_of_pax' => 'required',
            'rate_per_night' => 'required',
            'membership' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);

        $add_rooms= new novadeci_suites;

        $add_rooms->Room_No = $request->input('room_no');
        $add_rooms->Room_Size = $request->input('room_size');
        $add_rooms->No_of_Beds = $request->input('no_of_beds');
        $add_rooms->Extra_Bed = $request->input('extra_bed');
        $add_rooms->No_Pax_Per_Room = $request->input('no_of_pax');
        $add_rooms->Rate_per_Night = $request->input('rate_per_night');
        $add_rooms->Membership = $request->input('membership');
        $add_rooms->Hotel_Image = $request->input('images');

        $add_rooms->save();

        Alert::Success('Success', 'Room Successfully Created!');
        return redirect('RoomManagement')->with('Success', 'Data Saved');
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
