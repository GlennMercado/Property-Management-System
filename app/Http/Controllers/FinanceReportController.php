<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\finance_reports;
use App\Models\finance_2_reports;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class FinanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function insertfinance(Request $request)
    {
        $this->validate($request,[
            'ornum' => 'required',
            'payee' => 'required',
            'particular' => 'required',
            'debit' => 'required',
            'amount' => 'required',
            'remark' => 'required',
            'eventdate' => 'required',
            'cash' => 'required',
            'unearned' => 'required',
            'bank' => 'required',
            'cheque' => 'required'
            // 'basketball' => 'required',
            // 'otherincome' => 'required',
            // 'parking' => 'required',
            // 'managementfee' => 'required',
            // 'events' => 'required',
            // 'hotel' => 'required',
            // 'commercialspace' => 'required',
            // 'outputvat' => 'required'
            ]);

            $finance = new finance_2_reports;

            $finance->ornum = $request->input('ornum');
            $finance->payee = $request->input('payee');
            $compute = $request->input('particular');
            $finance->credit = $compute;
            $payment = $request->input('debit');
            $finance->debit = $payment;
            $finance->remark = $request->input('remark');
            $finance->amount = $request->input('amount');
            $finance->eventdate = $request->input('eventdate');
            $nopayment = '0';

            //for DEBIT
            if($payment == 'Cash')
        {
            $finance->cash = $request->input('amount');
            $finance->unearned = $nopayment;
            $finance->bank = $nopayment;
            $finance->cheque = $nopayment;
            
        }
        elseif($payment = 'Unearned')
        {
            $finance->cash = $nopayment;
            $finance->unearned = $request->input('amount');
            $finance->bank = $nopayment;
            $finance->cheque = $nopayment;
        }
        elseif($payment =  'Bank')
        {
            $finance->cash = $nopayment;
            $finance->unearned = $nopayment;
            $finance->bank = $request->input('amount');
            $finance->cheque = $nopayment;
        }
        elseif($payment =  'Cheque')
        {
            $finance->cash = $nopayment;
            $finance->unearned = $nopayment;
            $finance->bank = $nopayment;
            $finance->cheque = $request->input('amount');
        }

        //for Credit
        if($compute == 'CourtRental' || 'CourtRental/League')
        {
            $finance->basketball = $request->input('amount');
            $finance->otherincome = $nopayment;
            
        }
        


            // $finance->basketball = $request->input('basketball');
            // $finance->otherincome = $request->input('otherincome');
            // $finance->parking = $request->input('parking');
            // $finance->managementfee = $request->input('managementfee');
            // $finance->events = $request->input('events');
            // $finance->hotel = $request->input('hotel');
            // $finance->commercialspace = $request->input('commercialspace');
            // $finance->outputvat = $request->input('outputvat');

            
        if($finance->save())
        {
            Alert::Success('Success', 'Successfully Alerted the Finance Department!');
            return redirect('DailyReport')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Error', 'Failed!, Please Try Again.');
            return redirect('DailyReport')->with('Success', 'Data Updated');
        }
    }

    public function edit(Request $request)
    {
        try{
            $this->validate($request,[
                'userid' => 'required',
                'ornum' => 'required',
                'payee' => 'required',
                'particular' => 'required',
                'eventdate' => 'required',
                'debit' => 'required',
                'remark' => 'required',
                'amount' => 'required'
            ]);
            
            $userid = $request->input('userid');
            $ornum = $request->input('ornum');
            $payee = $request->input('payee');
            $particular = $request->input('particular');
            $eventdate = $request->input('eventdate');
            $debit = $request->input('debit');
            $remark = $request->input('remark');
            $amount = $request->input('amount');

           
           DB::table('finance_reports')->where('userid', $userid)->update(array
            (
                'userid' => $userid,
                'ornum' => $ornum,
                'payee' => $payee,
                'particular' => $particular,
                'eventdate' => $eventdate,
                'debit' => $debit,
                'remark' => $remark,
                'amount' => $amount
                
                
            ));
    
            Alert::Success('Success', 'Successfully Updated the Data!');
            return redirect('DailyReport')->with('Success', 'Data Updated');
          
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Failed!, Please Try Again.');
            return redirect('DailyReport')->with('Success', 'Data Updated');
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

