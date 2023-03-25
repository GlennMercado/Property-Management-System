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

    public function reports(Request $request)
    {   
        
        if($request->ajax()){
            if($request->get('num') == 1)
            {
                // $data = finance_2_reports::select('finance_2_reports.*');
                $data = DB::select('SELECT * FROM finance_2_reports');
dd($data);
                return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request)
                {
                    if($request->get('date') == "All"){
                        $instance->get();
                    }
                    elseif($request->get('date') == "Daily")
                    {
                        $now = Carbon::now()->format('Y-m-d');
                        $instance->where('finance_2_reports.eventdate', '=', $now)->get();
                    }
                    elseif($request->get('date') == "Weekly")
                    {
                        $startweek = Carbon::now()->startofweek()->format('Y-m-d');
                        $endweek = Carbon::now()->endofweek()->format('Y-m-d');
                        $instance->where('finance_2_reports.eventdate', '>=', $startweek)
                                ->where('finance_2_reports.eventdate', '<=', $endweek)
                                ->get();
                    }
                    elseif($request->get('date') == "Monthly")
                    {
                        $startmonth = Carbon::now()->startofmonth()->format('Y-m-d');
                        $endmonth = Carbon::now()->endofmonth()->format('Y-m-d');
                        $instance->where('finance_2_reports.eventdate', '>=', $startmonth)
                                ->where('finance_2_reports.eventdate', '<=', $endmonth)
                                ->get();
                    }

                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search');

                            $converttodate = strtotime($search);
                            $date_search = date('Y-m-d', $converttodate);

                            // $w->orwhere('finances.Booking_No', 'LIKE', "%$search%")
                            //     ->orwhere('finances.Attendant', 'LIKE', "%$search%")
                            //     ->orwhere('finances.Guest_Name', 'LIKE', "%$search%")
                            //     ->orwhere('finances.Housekeeping_Status', 'LIKE', "%$search%")
                            //     ->orwhere(DB::raw("(STR_TO_DATE(finances.Check_Out_Date,'%Y-%m-%d'))"), 'LIKE', "%$date_search%" );
                        });
                    }          
                })
                ->make(true);   
            } 
            
            
    
                
                 
        }
        return view('Admin.pages.Finances.DailyReport');
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

