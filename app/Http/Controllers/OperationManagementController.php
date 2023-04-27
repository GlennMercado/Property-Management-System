<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stocksfunctions;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\guest_request;
use Carbon\Carbon;
use App\Models\complaints;
use App\Models\hotel_room_supplies;
use App\Models\hotel_room_supplies_reports;
use App\Models\hotel_room_linens_reports;
use App\Models\housekeepings;
use App\Models\out_of_order_rooms;
use App\Models\lost_and_found;
use Illuminate\Support\Facades\Auth;
use App\Models\List_of_Housekeepers;
use App\Models\used_supplies;
use DataTables;

class OperationManagementCOntroller extends Controller
{
    public function OperationDashboard()
    {
        $role = Auth::user()->User_Type;

        $user = DB::select("SELECT * FROM users WHERE User_Type = '$role'");

        $list = DB::select('SELECT * FROM housekeepings a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.IsArchived = 0');

        $list2 = DB::select('SELECT * FROM housekeepings a INNER JOIN guest_requests b ON b.Request_ID = a.Request_ID');
        
        $archived = DB::select("SELECT * FROM housekeepings a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.IsArchived = 1 AND b.IsArchived = 1 ");

        $list3 = DB::select("SELECT a.id, a.Room_No, a.Date_Requested, a.Attendant, a.Status as hrsstats, b.status as rstats FROM hotel_room_supplies a INNER JOIN novadeci_suites b ON a.Room_No = b.Room_No GROUP BY a.Room_No");
        
        $list4 = DB::select("SELECT * FROM hotel_room_supplies WHERE Category = 'Guest Supply'");
        $list5 = DB::select("SELECT * FROM hotel_room_linens");

        $count = DB::select('Select * from novadeci_suites');
        $array = array();

        $datenow = Carbon::now()->format('Y-m-d');

        $arrival = DB::select("SELECT count(*) as cnt FROM housekeepings a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.IsArchived = 0 AND b.Check_In_Date = '$datenow'");
        $supply_request = DB::select("SELECT count(*) as cnt FROM hotel_room_supplies_reports WHERE STR_TO_DATE(Date_Received,'%Y-%m-%d') = '$datenow'");
        $linen_request = DB::select("SELECT count(*) as cnt FROM hotel_room_linens_reports WHERE STR_TO_DATE(Date_Received,'%Y-%m-%d') = '$datenow'");
        $maintenance = DB::select("SELECT count(*) as cnt FROM out_of_order_rooms WHERE Date_Resolved = '$datenow'");

        foreach($count as $counts)
        {
            $array[] = ['Room_No' => $counts->Room_No];
        }

        $housekeeper = DB::select("SELECT * FROM list_of_housekeepers WHERE Status = 'Available'");

        return view('Admin.pages.OperationManagement.OperationDashboard', 
                    [
                    'list' => $list,'list2' => $list2, 'archived' => $archived,'array' => $array, 'list3' => $list3, 
                    'list4' => $list4, 'list5' => $list5, 'arrival' => $arrival, 'supply' => $supply_request,
                    'linen' => $linen_request, 'maintenance' => $maintenance,
                    'housekeeper' => $housekeeper, 'role' => $user
                    ]
                    );
        // $now = Carbon::now()->format('Y-m-d');
        // $request_count = DB::select("SELECT count(*) as cnt FROM guest_requests WHERE Date_Updated = '$now'");
        // $checked_guests = DB::table('hotel_reservations')->where('Payment_Status', 'Checked-In')->count(); 
        // $checked_complaints = DB::table('complaints')->where('id')->count();

        // $room1 = DB::select("SELECT count(*) as cnt FROM novadeci_suites WHERE Status = 'Vacant for Accommodation'");
        // $room2 = DB::select("SELECT count(*) as cnt FROM novadeci_suites WHERE Status = 'Occupied'");
        // $room3 = DB::select("SELECT count(*) as cnt FROM novadeci_suites WHERE Status = 'Vacant for Cleaning'");

        // return view('Admin.pages.OperationManagement.OperationDashboard', ['request_count'=>$request_count, 'room1'=>$room1, 'room2'=>$room2, 'room3'=>$room3], compact('checked_guests', 'checked_complaints'));
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