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
            return redirect('Housekeeping')->with('Success', 'Data Updated');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Housekeeper assigning failed!');
            return redirect('Housekeeping')->with('Success', 'Data Updated');
        }

    }


    public function add_maintenance(Request $request)
    {
        $this->validate($request,[
            'desc' => 'required',
            'asset' => 'required',
            'location' => 'required',
            'due' => 'required'
        ]);

        $maintain = new add_maintenance;

        $stats = 'On-going';
        $maintain->Status = $stats;
        $maintain->Description = $request->input('desc');
        $maintain->Asset = $request->input('asset');
        $maintain->Location = $request->input('location');
        $maintain->Due_Date = $request->input('due');

  

        if($maintain->save())
        {
            Alert::Success('Success', 'Maintenance successfully submitted!');
            return redirect('Maintenance')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Error', 'Maintenance Submission Failed!');
            return redirect('Maintenance')->with('Error', 'Failed!');
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
