<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stocksfunctions;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\guest_request;
use Carbon\Carbon;
use DataTables;
use App\Models\complaints;

class OperationManagementCOntroller extends Controller
{
    public function OperationDashboard()
    {
        return view('Admin.pages.OperationManagement.OperationDashboard');
    }
    public function Reservation()
    {
        return view('Reservation');
    }
    public function GuestReservation()
    {
        return view('GuestReservation');
    }
    public function OperationRooms()
    {
        $list = DB::select("SELECT * FROM novadeci_suites");
        return view('Admin.pages.OperationManagement.OperationRooms', ['list' => $list]);
    }
    public function Operation_Reports(Request $request)
    {
        if($request->ajax()){
            if($request->get('num') == 1)
            {
                $data = guest_request::select('*')->where('IsArchived', 1);
                
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
                        $instance->where('Date_Updated', '=', $now)->get();
                    }
                    elseif($request->get('date') == "Weekly")
                    {
                        $startweek = Carbon::now()->startofweek()->format('Y-m-d');
                        $endweek = Carbon::now()->endofweek()->format('Y-m-d');
                        $instance->where('Date_Updated', '>=', $startweek)
                                ->where('Date_Updated', '<=', $endweek)
                                ->get();
                    }
                    elseif($request->get('date') == "Monthly")
                    {
                        $startmonth = Carbon::now()->startofmonth()->format('Y-m-d');
                        $endmonth = Carbon::now()->endofmonth()->format('Y-m-d');
                        $instance->where('Date_Updated', '>=', $startmonth)
                                ->where('Date_Updated', '<=', $endmonth)
                                ->get();
                    }

                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search');

                            $converttodate = strtotime($search);
                            $date_search = date('Y-m-d', $converttodate);

                            $w->orwhere('Request_ID', 'LIKE', "%$search%")
                                ->orwhere('Booking_No', 'LIKE', "%$search%")
                                ->orwhere('Guest_Name', 'LIKE', "%$search%")
                                ->orwhere('Date_Updated', 'LIKE', "%$date_search%")
                                ->orwhere('Room_No', 'LIKE', "%$search%" );
                        });
                    }          
                })
                ->make(true);   
            }
            elseif($request->get('num') == 2)
            {
                $data = complaints::select('*');
                
                return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request)
                {
                    if($request->get('date2') == "All"){
                        $instance->get();
                    }
                    elseif($request->get('date2') == "Daily")
                    {
                        $now = Carbon::now()->format('Y-m-d');
                        $instance->where(DB::raw("(STR_TO_DATE(created_at,'%Y-%m-%d'))"), '=', $now)->get();
                    }
                    elseif($request->get('date2') == "Weekly")
                    {
                        $startweek = Carbon::now()->startofweek()->format('Y-m-d');
                        $endweek = Carbon::now()->endofweek()->format('Y-m-d');
                        $instance->where(DB::raw("(STR_TO_DATE(created_at,'%Y-%m-%d'))"), '>=', $startweek)
                                ->where(DB::raw("(STR_TO_DATE(created_at,'%Y-%m-%d'))"), '<=', $endweek)
                                ->get();
                    }
                    elseif($request->get('date2') == "Monthly")
                    {
                        $startmonth = Carbon::now()->startofmonth()->format('Y-m-d');
                        $endmonth = Carbon::now()->endofmonth()->format('Y-m-d');
                        $instance->where(DB::raw("(STR_TO_DATE(created_at,'%Y-%m-%d'))"), '>=', $startmonth)
                                ->where(DB::raw("(STR_TO_DATE(created_at,'%Y-%m-%d'))"), '<=', $endmonth)
                                ->get();
                    }

                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search2');

                            $converttodate = strtotime($search);
                            $date_search = date('Y-m-d', $converttodate);

                            $w->orwhere('concern', 'LIKE', "%$search%")
                                ->orwhere('concern_text', 'LIKE', "%$search%")
                                ->orwhere(DB::raw("(STR_TO_DATE(created_at,'%Y-%m-%d'))"), 'LIKE', "%$date_search%");
                        });
                    }          
                })
                ->make(true);   
            }    
        }
        return view('Admin.pages.OperationManagement.Reports');
    }
    public function GuestFolio()
    {
        return view('GuestFolio');
    }

    public function Operation_Requests()
    {
        $list = DB::select("SELECT * FROM guest_requests a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No where a.IsArchived = 0");
    
        $archive = DB::select("SELECT * FROM guest_requests a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No where a.IsArchived = 1");
        
        return view('Admin.pages.OperationManagement.Requests', ['list' => $list, 'archive' => $archive]);
    }

    public function update_service_request($id, $bs)
    {
        try{
            $datenow = Carbon::now()->format('Y-m-d');
            $req_id = $id;
            
            $status;

            if($bs == "Checked-Out")
            {
                $status = "Unaccomplished";
            }
            else
            {
                $status = "Accomplished";
            }
            $sql = DB::table('guest_requests')->where('Request_ID', $req_id)->update([
                'Status' => $status,
                'Date_Updated' => $datenow,
                'IsArchived' => 1
            ]);

            if($sql)
            {
                Alert::Success('Success', 'Guest Request Successfully Updated!');
                return redirect('Guest_Request')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Guest Request Failed Updating!');
                return redirect('Guest_Request')->with('Failed', 'Data Saved');
            }

        }
        catch(\Illuminate\Database\QueryException $e){
            Alert::Error('Failed', 'Guest Request Failed Updating!');
            return redirect('Guest_Request')->with('Failed', 'Data Saved');
        }
    }

    public function update_item_request($id)
    {
        try{
            $datenow = Carbon::now()->format('Y-m-d');
            $req_id = $id;
            
            $status = "Accomplished";

            $sql = DB::table('guest_requests')->where('Request_ID', $req_id)->update([
                'Status' => $status,
                'Date_Updated' => $datenow,
                'IsArchived' => 1
            ]);

            if($sql)
            {
                Alert::Success('Success', 'Guest Request Successfully Updated!');
                return redirect('Requests')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Guest Request Failed Updating!');
                return redirect('Requests')->with('Failed', 'Data Saved');
            }

        }
        catch(\Illuminate\Database\QueryException $e){
            Alert::Error('Failed', 'Guest Request Failed Updating!');
            return redirect('Requests')->with('Failed', 'Data Saved');
        }
    }

    public function set_stats(Request $request)
    {

        $request_id = $request->input('request_id');
        $status = $request->input('status');

        $sql;
        if($status == "Approved")
        {
            $sql = DB::table('guest_requests')->where('Request_ID', $request_id)->update(['Status' => $status]);
        }
        else
        {
            $sql = DB::table('guest_requests')->where('Request_ID', $request_id)->update(['Status' => $status, 'IsArchived' => 1]);
        }
        
        if($sql)
        {
            Alert::Success('Success', 'Guest Request Successfully Updated!');
            return redirect('Requests')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Failed', 'Guest Request Failed Updating!');
            return redirect('Requests')->with('Failed', 'Failed');
        }
    }
}