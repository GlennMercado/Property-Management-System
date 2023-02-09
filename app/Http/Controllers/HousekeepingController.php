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
    public function housekeeping_dashboard()
    {
        $list = DB::select('SELECT * FROM housekeepings a INNER JOIN guest_requests b ON b.Request_ID = a.Request_ID');
        return view('Admin.pages.HousekeepingForms.Housekeeping_Dashboard', ['list' => $list]);
    }
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
                'id' => '',
                'housekeeper' => 'required'
                ]);

            $id = $request->input('id');
            $housekeeper = $request->input('housekeeper');

            DB::table('housekeepings')->where('ID', $id)->update(array('Attendant' => $housekeeper));

            Alert::Success('Success', 'Attendant successfully assigned!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Housekeeper assigning failed!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
        }

    }
    public function update_housekeeping_status($room_no, $id, $status, $req)
    {
        
        try
        {           
            $available = "Vacant for Accommodation";
            $hid = $id;
            $reqid = $req;
            $roomno = $room_no;
            $stats = $status;
            $archive = true;
            
            
            if($stats == "Cleaned")
            {
                DB::table('housekeepings')->where('ID', $hid)->update(array('IsArchived' => $archive, 'Housekeeping_Status' => $stats));
                DB::table('guest_requests')->where('Request_ID', $reqid)->update(array('IsArchived' => $archive));
                DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $available));
    
                Alert::Success('Success', 'Setting Status Success!');
                return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
            }         
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Setting Status failed!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
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
