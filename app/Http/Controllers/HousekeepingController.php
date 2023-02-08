<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_maintenance;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class HousekeepingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotel_housekeeping()
    {
        $list2 = DB::select('SELECT * FROM housekeepings a INNER JOIN novadeci_suites b ON a.Room_No = b.Room_No');

		return view('Admin.pages.HousekeepingForms.Hotel_Housekeeping',['list2' =>$list2]);
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
        //
    }

    public function assign_housekeeper(Request $request)
    {
        try{
            $this->validate($request,[
                'room_no' => '',
                'housekeeper' => 'required'
                ]);

            $room_no = $request->input('room_no');
            $housekeeper = $request->input('housekeeper');

            DB::table('housekeepings')->where('Room_No', $room_no)->update(array('Room_Attendant' => $housekeeper));

            Alert::Success('Success', 'Housekeeper successfully assigned!');
            return redirect('Hotel Housekeeping')->with('Success', 'Data Updated');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Housekeeper assigning failed!');
            return redirect('Hotel Housekeeping')->with('Success', 'Data Updated');
        }

    }
    public function update_housekeeping_status($id, $status)
    {
        
        try
        {           
            $available = "Vacant for Accommodation";
            $unassigned = "Unassigned";
            $room_no = $id;
            $stats = $status;

            if($stats == "Cleaned")
            {
                DB::table('housekeepings')->where('Room_No', $room_no)->update(array('Housekeeping_Status' => $stats, 'Room_Attendant' => $unassigned));
                DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array('Status' => $available));
    
                Alert::Success('Success', 'Setting Status Success!');
                return redirect('Hotel Housekeeping')->with('Success', 'Data Updated');
            }         
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Setting Status failed!');
            return redirect('Hotel Housekeeping')->with('Success', 'Data Updated');
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
