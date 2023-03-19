<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\finances;
use App\Models\finance_2_reports;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finance_chart()
    {
        $count = DB::select('SELECT * FROM finance_2_reports');
        $array = array();

        foreach($count as $counts)
        {
            $array[] = ['ornum' => $counts->ornum];
        }
        return view('Admin.pages.Finances.DailyReport', 
                    ['array' => $array]
                    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finance_dash()
    {
        //
        //Finance Dashboards
		$list = DB::select('SELECT * FROM finance_2_reports');
        $basketball_sum = finance_2_reports::sum('basketball');
        $unearned_sum = finance_2_reports::sum('unearned');
        $otherincome_sum = finance_2_reports::sum('otherincome');
        $parking_sum = finance_2_reports::sum('parking');
        $managementfee_sum = finance_2_reports::sum('managementfee');
        $event_sum = finance_2_reports::sum('event');
        $hotel_sum = finance_2_reports::sum('hotel');
        $commercialspace_sum = finance_2_reports::sum('commercialspace');

            return view('Admin.pages.Finances.FinanceDashboard', ['list'=>$list], compact('basketball_sum', 'unearned_sum', 'otherincome_sum', 'parking_sum', 'managementfee_sum', 'event_sum', 'hotel_sum', 'commercialspace_sum'));
    }

    public function finance_archives()
    {
        //
        //Finance Dashboards
		$list = DB::select('SELECT * FROM finances');

            return view('Admin.pages.Finances.FinanceArchives', ['list'=>$list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addinfo(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'cnumber' => 'required',
            'status' => 'required'
            ]);

            $finance = new finances;

            $finance->name = $request->input('name');
            $finance->email = $request->input('email');
            $finance->cnumber = $request->input('cnumber');
            $finance->status = $request->input('status');

            if($request->hasfile('proof'))
            {
                //add image to a folder
                $file = $request->file('proof');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'--Room '.$request->input('name').'-.'.$extension;
                $path = $file->move('finance_images/', $filename);
                
                $base64 = base64_encode($extension); 

                $finance->proof_image = $path;
                $finance->proof_image_b = $base64;

            }

        
        if($finance->save())
        {
            Alert::Success('Success', 'Successfully Alerted the Finance Department!');
            return redirect('Finance')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Error', 'Failed!, Please Try Again.');
            return redirect('Finance')->with('Success', 'Data Updated');
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
    public function update_info(Request $request)
    {
        try{
            $this->validate($request,[
                'userid' => 'required',
                'name' => 'required',
                'email' => 'required',
                'cnumber' => 'required',
                'proof' => 'required',
                'status' => 'required'
            ]);
            
            $userid = $request->input('userid');
            $name = $request->input('name');
            $email = $request->input('email');
            $cnumber = $request->input('cnumber');
            $proof = $request->input('proof');
            $status = $request->input('status');

           
           DB::table('finances')->where('userid', $userid)->update(array
            (
                'userid' => $userid,
                'name' => $name,
                'email' => $email,
                'cnumber' => $cnumber,
                'proof' => $proof,
                'status' => $status
            ));
    
            Alert::Success('Success', 'Successfully Updated the Data!');
            return redirect('Finance')->with('Success', 'Data Updated');
          
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Failed!, Please Try Again.');
            return redirect('Finance')->with('Success', 'Data Updated');
        }
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
