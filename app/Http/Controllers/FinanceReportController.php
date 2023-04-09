<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\finances;
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

        //Requesting Value
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
            'cheque' => 'required',
            'bank' => 'required'
            ]);

            //Selecting Database
            $finance = new finance_2_reports;


            //Setting the Variables
            $finance->ornum = $request->input('ornum');
            $finance->payee = $request->input('payee');
            $compute = $request->input('particular');
            $finance->particular = $compute;
            $payment = $request->input('debit');
            $finance->debit = $payment;
            $finance->remark = $request->input('remark');
            $finance->amount = $request->input('amount');
            $finance->eventdate = $request->input('eventdate');
            $gross= $request->input('amount');
            $nopayment = 0;
            $grosspile = 1.12;
            $output = .12;
            $grosspiles = $gross / $grosspile;
            $grosspiless = $gross / $grosspile;
            $outvat = $output * $grosspiless;

            
            //Commputation for IntialGross Ang OutputVAT
            //for CREDIT 
            //Basketball
            if ($compute == 'CourtRental' || $compute == 'CourtRental/League') {
                $finance->basketball = $grosspiles;
                $finance->otherincome = $nopayment;
                $finance->parking = $nopayment;
                $finance->managementfee = $nopayment;
                $finance->event = $nopayment;
                $finance->hotel = $nopayment;
                $finance->commercialspace = $nopayment;
                $finance->outputvat = $outvat;

                //Other Income
            } elseif ($compute == 'Venue Rental' || $compute == 'Kiosk Rental' || $compute == 'Foodstall' || $compute == 'Space Rental' || $compute == 'Convention Center/Hot' || $compute == 'Electrical Charge' || $compute == 'Zumba' || $compute == 'Event Registration' || $compute == 'Other Charges') {
                $finance->basketball = $nopayment;
                $finance->otherincome = $grosspiles;
                $finance->parking = $nopayment;
                $finance->managementfee = $nopayment;
                $finance->event = $nopayment;
                $finance->hotel = $nopayment;
                $finance->commercialspace = $nopayment;
                $finance->outputvat = $outvat;

                //Hotel
            } elseif ($compute == 'Hotel' || $compute == 'Hotel Other Charges') {
                $finance->basketball = $nopayment;
                $finance->otherincome = $nopayment;
                $finance->parking = $nopayment;
                $finance->managementfee = $nopayment;
                $finance->event = $nopayment;
                $finance->hotel = $grosspiles;
                $finance->commercialspace = $nopayment;
                $finance->outputvat = $outvat;

                //Function Room/ Convention Center/ Events
            } elseif ($compute == 'Function Room' || $compute == 'Function Room/Hotel' || $compute == 'Function Rooms/Others' || $compute == 'Convention Center' || $compute == 'Convention Center/Hot') {
                $finance->basketball = $nopayment;
                $finance->otherincome = $nopayment;
                $finance->parking = $nopayment;
                $finance->managementfee = $nopayment;
                $finance->event = $grosspiles;
                $finance->hotel = $nopayment;
                $finance->commercialspace = $nopayment;
                $finance->outputvat = $outvat;

                //Management Fee
            } elseif ($compute == 'Management Fee') {
                $finance->basketball = $nopayment;
                $finance->otherincome = $nopayment;
                $finance->parking = $nopayment;
                $finance->managementfee = $grosspiles;
                $finance->event = $nopayment;
                $finance->hotel = $nopayment;
                $finance->commercialspace = $nopayment;
                $finance->outputvat = $outvat;

                //Parking Ticket/ Parking Rental
            } elseif ($compute == 'Parking Rental' ) {
                $finance->basketball = $nopayment;
                $finance->otherincome = $nopayment;
                $finance->parking = $grosspiles;
                $finance->managementfee = $nopayment;
                $finance->event = $nopayment;
                $finance->hotel = $nopayment;
                $finance->commercialspace = $nopayment;
                $finance->outputvat = $outvat;

                //Commercial Space
            } elseif ($compute == 'Commercial Space'  ) {
                $finance->basketball = $nopayment;
                $finance->otherincome = $nopayment;
                $finance->parking = $nopayment;
                $finance->managementfee = $nopayment;
                $finance->event = $nopayment;
                $finance->hotel = $nopayment;
                $finance->commercialspace = $grosspiles;
                $finance->outputvat = $outvat;
            } 

            //OutputVAT
            elseif ($compute == 'OutputVAT'  ) {
                $finance->basketball = $nopayment;
                $finance->otherincome = $nopayment;
                $finance->parking = $nopayment;
                $finance->managementfee = $nopayment;
                $finance->event = $nopayment;
                $finance->hotel = $nopayment;
                $finance->commercialspace = $nopayment;
        } 

            //Inserting the Amount Value
            // For Debit
            if ($payment == 'Cash') {
                $finance->cash = $request->input('amount');
                $finance->unearned = $nopayment;
                $finance->bank = $nopayment;
                $finance->cheque = $nopayment;
            } elseif ($payment == 'Unearned') {
                $finance->cash = $nopayment;
                $finance->unearned = $request->input('amount');
                $finance->bank = $nopayment;
                $finance->cheque = $nopayment;
            } elseif ($payment == 'Bank') {
                $finance->cash = $nopayment;
                $finance->unearned = $nopayment;
                $finance->bank = $request->input('amount');
                $finance->cheque = $nopayment;
            } elseif ($payment == 'Cheque') {
                $finance->cash = $nopayment;
                $finance->unearned = $nopayment;
                $finance->bank = $nopayment;
                $finance->cheque = $request->input('amount');
            }
    

            //Inserting into Database
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

