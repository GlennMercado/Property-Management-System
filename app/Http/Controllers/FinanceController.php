<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotel_reservations;
use App\Models\finance_2_reports;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

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
        ->orderBy('created_at', 'desc')
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

    public function finance_approve()
    {
        
        //Finance Approval
        $list = DB::select('SELECT * FROM hotel_reservations a LEFT JOIN novadeci_suites b ON a.Room_No = b.Room_No');
        $list2 = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0');
        $list3 = DB::select("SELECT * FROM commercial_space_rent_reports");
        $count2 = DB::select("SELECT COUNT(*) as cnt FROM commercial_space_rent_reports WHERE Payment_Status = 'Non-Payment'");
        $array = array();

        $list4 = DB::select("SELECT a.Space_Unit, b.* FROM commercial_spaces_tenants a INNER JOIN commercial_spaces_tenant_deposits b ON a.Tenant_ID = b.Tenant_ID");

        $count = DB::select("SELECT * From commercial_spaces_tenants");
        foreach($count as $counts)
        {
            $array[] = ['Tenant_ID' => $counts->Tenant_ID];
        }
        //wadasdasdasdasd

        $list5 = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0');
           
        $count3 = DB::select("SELECT * From commercial_spaces_tenants");
        $arrays2 = array();
        
        foreach($count as $counts)
        {
            $arrays2[] = ['Tenant_ID' => $counts->Tenant_ID];
        }
        $list6 = DB::select("SELECT * FROM commercial_space_utility_bills");

        return view('Admin.pages.Finances.FinanceApproval', ['list'=>$list, 'list2'=>$list2, 'count2'=>$count2 ,'array'=>$array, 'list3'=>$list3, 'list4' => $list4, 'list5' => $list5 ,'list6' => $list6, 'count3' => $count3, 'arrays2' => $arrays2,]);
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
        
            return view('Admin.pages.Finances.FinanceArchives', ['list'=>$list, 'list2'=>$list2, 'sql'=>$sql], compact('amount_sum', 'cash_sum', 'unearned_sum', 'bank_sum', 'cheque_sum', 'basketball_sum', 
                        'otherincome_sum', 'parking_sum', 'managementfee_sum', 'event_sum', 'hotel_sum', 'commercialspace_sum', 'output_sum'));
    
    }

    public function finance_invoice($bn)
    {
         // $list = DB::select("SELECT * FROM finance_2_reports"); 
        // $invoice_id = $id;   
        // $list = DB::select("SELECT * FROM hotel_reservations WHERE id = '$invoice_id'");   

        // return view('Admin.pages.Finances.FinanceInvoice', ['list'=>$list,]);

        $booking_no = $bn;
        $list = DB::select("SELECT * FROM hotel_reservations WHERE Booking_No = '$booking_no'");    
        $list2 = DB::select("SELECT * FROM used_supplies WHERE Booking_No = '$booking_no'");
        $list3 = DB::select("SELECT * FROM hotel_other_charges WHERE Booking_No = '$booking_no'");
        $list4 = DB::select("SELECT * FROM out_of_order_rooms WHERE Booking_No = '$booking_no'");

        return view('Admin.pages.Finances.FinanceInvoice', ['list'=>$list, 'list2' => $list2, 'list3' => $list3, 'list4'=>$list4]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function archives(Request $request){

        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse(request('end_date'))->format('Y-m-d');
        $data;
        $title;


            $data = finance_2_reports::where('Client_Status', 'Paid')->whereBetween('created_at', [$start_date, $end_date])->get();
            $title = "Client's Payment Details";
            

        $pdf = PDF::loadView('Admin.pages.Finances.FinanceReport', compact('data', 'title'))->setOption('font_path', '')->setOption('font_data', []);
        //  return $pdf->download('report.pdf');
        return view('Admin.pages.Finances.FinanceReport', compact('data', 'title'));
    }

    public function archives_summary(Request $request){

        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse(request('end_date'))->format('Y-m-d');
        $data;
        $title;

        $data = finance_2_reports::where('Client_Status', 'Paid')->whereBetween('created_at', [$start_date, $end_date])->get();
            $title = "Revenue Archives";

        $pdf = PDF::loadView('Admin.pages.Finances.FinanceReport2', compact('data', 'title'))->setOption('font_path', '')->setOption('font_data', []);
        // return $pdf->download('report.pdf');
        return view('Admin.pages.Finances.FinanceReport2', compact('data', 'title'));
    }
    public function proof_payment_summary(Request $request){

        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse(request('end_date'))->format('Y-m-d');
        $data;
        $title;
        
        $data = hotel_reservations::where('Payment_Status', 'Paid')->whereBetween('created_at', [$start_date, $end_date])->get();
            $title = "Proof of Payment Report(s)";

        $pdf = PDF::loadView('Admin.pages.Finances.FinanceReport3', compact('data', 'title'))->setOption('font_path', '')->setOption('font_data', []);
        // return $pdf->download('report.pdf');
        return view('Admin.pages.Finances.FinanceReport3', compact('data', 'title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finance_hotel_approval($id, $no, $check)
    {
        $bookno = $id;
        $roomno = $no;
        $isarchived = $check;
        $stats = "Paid";
        $stats2 = "Reserved";

        $user_type = Auth::user()->User_Type;

        if($isarchived == false)
        {
            $check = DB::select("SELECT * FROM novadeci_suites WHERE Room_No = '$roomno'");

            $stats3;

            foreach($check as $checks)
            {
                $stats3 = $checks->Status;
            }
        
          
            $facility = "Hotel Room";

            //For FinanceModule Variables
            // $ornum = DB::table('hotel_reservations')->where('id')->get();
            $particular = "Hotel";
            $debit = "Cash";
            $remark = "FULL";
            $finance_amount = DB::table('hotel_reservations')->select('Payment')->first()->Payment;

            $reservations = DB::table('hotel_reservations')->where('Booking_No', $bookno)->get();

            foreach ($reservations as $reservation) {
                $ornum = $reservation->id;
                $finance_amount = $reservation->Payment;
                $finance_eventdate = $reservation->Check_In_Date;
                // other variables and insert query here
            }

            $outvat = .12;
            $gross = 1.12;
            $cash = $finance_amount / $gross;
            $vat = $outvat * $cash;  

            DB::table('hotel_reservations')->where('Booking_No', $bookno)->update(array('Payment_Status' => $stats, 'Booking_Status' => $stats2));
            
            if($stats3 != "Checked-In")
            {
                DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $stats2));
            }

            DB::insert('insert into housekeepings (Room_No, Booking_No, Facility_Type, Facility_Status, Front_Desk_Status) 
            values (?, ?, ?, ?, ?)', [$roomno, $bookno, $facility, $stats2, $stats2]);

            DB::insert('insert into finance_2_reports (ornum, payee, particular, debit, remark, amount , eventdate, cash, hotel, outputvat) 
            values (?, ?, ?, ?, ?, ?, ? , ?, ?, ?)', [$ornum, $finance_payee, $particular, $debit, $remark, $finance_amount, $finance_eventdate, $finance_amount, $cash, $vat]);
           
            if($user_type == "Operations Manager")
            {
                $name = DB::table('hotel_reservations')
                ->where('Booking_No', '=', $bookno)
                ->get();

                foreach ($name as $names) {
                    Mail::to($names->Email)->send(new BookingConfirmation($names));
                }
                Alert::Success('Success', 'Payment successfully updated!');
                return redirect('Guest_Reservation')->with('Success', 'Data Saved');
            }
            else
            {
                $name = DB::table('hotel_reservations')
                ->where('Booking_No', '=', $bookno)
                ->get();

                foreach ($name as $names) {
                    Mail::to($names->Email)->send(new BookingConfirmation($names));
                }
                Alert::Success('Success', 'Payment successfully updated!');
                return redirect('HotelReservationForm')->with('Success', 'Data Saved');
            }
        }
        else
        {
            if($user_type == "Operations Manager")
            {
                Alert::Error('Failed', 'Payment Failed Updating!');
                return redirect('Guest_Reservation')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Payment Failed Updating!');
                return redirect('HotelReservationForm')->with('Success', 'Data Saved');
            }
        }    
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
