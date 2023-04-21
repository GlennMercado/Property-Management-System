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
        $list4 = DB::select('SELECT * FROM finance_2_reports');
        $list2 = DB::table('finance_2_reports')->where('eventdate', '=', Carbon::now()->format('Y-m-d'))->get();
        $list3 = DB::table('finance_2_reports')
        ->where('eventdate', '>=', Carbon::now()->startofmonth()->format('Y-m-d'))
        ->where('eventdate', '<=', Carbon::now()->endofmonth()->format('Y-m-d'))
        ->get();
        
        $month = DB::table('finance_2_reports')->where('eventdate', '=', Carbon::now()->month)->get();

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
        $output_sum2 = $list2->sum('outputvat');


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
        $output_sum3 = $list3->sum('outputvat');

        //Counts
        $daily_count = DB::table('finance_2_reports')
        ->where('eventdate', '=',Carbon::now()->format('Y-m-d'))->get()
        ->count(); 
        $monthly_count = DB::table('finance_2_reports')
        ->where('eventdate', '>=', Carbon::now()->startofmonth()->format('Y-m-d'))
        ->where('eventdate', '<=', Carbon::now()->endofmonth()->format('Y-m-d'))
        ->get()
        ->count();



        $array = array();

        return view('Admin.pages.Finances.DailyReport', ['list2'=>$list2, 'list3'=>$list3, 'list4'=>$list4], compact('amount_sum', 'amount_sum2','cash_sum2','unearned_sum2','bank_sum2',
                    'cheque_sum2','basketball_sum2','otherincome_sum2','parking_sum2','managementfee_sum2','event_sum2','hotel_sum2','commercialspace_sum2','output_sum2','cash_sum3','unearned_sum3',
                    'bank_sum3','cheque_sum3','basketball_sum3','otherincome_sum3','parking_sum3','managementfee_sum3','event_sum3','hotel_sum3','commercialspace_sum3','output_sum3','daily_count','monthly_count', 'month'));
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
      
        //Fetching Database
        $list = DB::select('SELECT * FROM hotel_reservations');
        $list2 = DB::select('SELECT * FROM finance_2_reports');
        $sql = DB::select("SELECT * FROM hotel_reservations WHERE Payment_Status = 'Paid'");

         //for Archive Module Sums
         $amount_sum = finance_2_reports::sum('amount');
         $cash_sum = finance_2_reports::sum('cash');
         $unearned_sum = finance_2_reports::sum('unearned');
         $bank_sum = finance_2_reports::sum('bank');
         $cheque_sum = finance_2_reports::sum('cheque');
         $basketball_sum = finance_2_reports::sum('basketball');
         $otherincome_sum = finance_2_reports::sum('otherincome');
         $parking_sum = finance_2_reports::sum('parking');
         $managementfee_sum = finance_2_reports::sum('managementfee');
         $event_sum = finance_2_reports::sum('event');
         $hotel_sum = finance_2_reports::sum('hotel');
         $commercialspace_sum = finance_2_reports::sum('commercialspace');
         $output_sum = finance_2_reports::sum('outputvat');

        if ($sql) {
            return view('Admin.pages.Finances.FinanceArchives', ['list'=>$list, 'list2'=>$list2, 'sql'=>$sql], compact('amount_sum', 'cash_sum', 'unearned_sum', 'bank_sum', 'cheque_sum', 'basketball_sum', 
                        'otherincome_sum', 'parking_sum', 'managementfee_sum', 'event_sum', 'hotel_sum', 'commercialspace_sum', 'output_sum'));

        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

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

    public function destroy($id)
    {
        //
    }
}
