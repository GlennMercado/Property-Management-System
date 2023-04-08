<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotel_reservations;
use App\Models\finance_2_reports;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finance_report()
    {

       //Fetching Database
        $list = DB::select('SELECT * FROM finance_2_reports');
        $list2 = DB::table('finance_2_reports')->where('eventdate', '=', Carbon::now()->format('Y-m-d'))->get();
        $list3 = DB::table('finance_2_reports')
        ->where('eventdate', '>=', Carbon::now()->startofmonth()->format('Y-m-d'))
        ->where('eventdate', '<=', Carbon::now()->endofmonth()->format('Y-m-d'))
        ->get();

        //for Daily Report Module Sums
        $amount_sum = finance_2_reports::sum('amount');
        $amount_sum2 = $list2->sum('amount');
        $cash_sum2 = $list2->sum('cash');
        $unearned_sum2 = $list2->sum('unearned');
        $bank_sum2 = $list2->sum('bank');
        $cheque_sum2 = $list2->sum('cheque');
        $basketball_sum2 = $list2->sum('basketball');
        $otherincome_sum2 = $list2->sum('otherincome');
        $parking_sum2 = $list2->sum('parking');
        $managementfee_sum2 = $list2->sum('managementfee');
        $event_sum2 = $list2->sum('event');
        $hotel_sum2 = $list2->sum('hotel');
        $commercialspace_sum2 = $list2->sum('commercialspace');


        //For MothlyReport
        $cash_sum3 = $list3->sum('cash');
        $unearned_sum3 = $list3->sum('unearned');
        $bank_sum3 = $list3->sum('bank');
        $cheque_sum3 = $list3->sum('cheque');
        $basketball_sum3 = $list3->sum('basketball');
        $otherincome_sum3 = $list3->sum('otherincome');
        $parking_sum3 = $list3->sum('parking');
        $managementfee_sum3 = $list3->sum('managementfee');
        $event_sum3 = $list3->sum('event');
        $hotel_sum3 = $list3->sum('hotel');
        $commercialspace_sum3 = $list3->sum('commercialspace');


        $array = array();

        return view('Admin.pages.Finances.DailyReport', ['list'=>$list, 'list2'=>$list2, 'list3'=>$list3], compact('amount_sum', 'amount_sum2','cash_sum2','unearned_sum2','bank_sum2',
                    'cheque_sum2','basketball_sum2','otherincome_sum2','parking_sum2','managementfee_sum2','event_sum2','hotel_sum2','commercialspace_sum2','cash_sum3','unearned_sum3',
                    'bank_sum3','cheque_sum3','basketball_sum3','otherincome_sum3','parking_sum3','managementfee_sum3','event_sum3','hotel_sum3','commercialspace_sum3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finance_dash()
    {
        //
        //Finance Dashboards Sums
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
      

        $list = DB::select('SELECT * FROM hotel_reservations');
        $sql = DB::select("SELECT * FROM hotel_reservations WHERE Payment_Status = 'Paid'");


        if ($sql) {
            return view('Admin.pages.Finances.FinanceArchives', ['list'=>$list]);

        } else{
            return view('Admin.pages.Finances.FinanceArchives', ['list'=>$list]);

        }
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
