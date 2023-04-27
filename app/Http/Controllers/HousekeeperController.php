<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_maintenance;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\hotel_room_supplies;
use App\Models\hotel_room_supplies_reports;
use App\Models\hotel_room_linens_reports;
use App\Models\List_of_Housekeepers;
use App\Models\housekeepings;
use App\Models\out_of_order_rooms;
use App\Models\lost_and_found;
use Carbon\Carbon;
use DataTables;

class HousekeeperController extends Controller
{
    public function housekeeper_dashboard()
    {
        $list = DB::select('SELECT * FROM housekeepings a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.IsArchived = 0 GROUP BY a.Room_No');

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
        return view('Housekeeper.Housekeeper_Dashboard', 
                    [
                    'list' => $list,'list2' => $list2, 'archived' => $archived,'array' => $array, 'list3' => $list3, 
                    'list4' => $list4, 'list5' => $list5, 'arrival' => $arrival, 'supply' => $supply_request,
                    'linen' => $linen_request, 'maintenance' => $maintenance
                    ]
                    );
    }

    public function linen_monitoring()
    {
        $list = DB::select("SELECT a.id, a.Room_No, a.Date_Received, SUM(a.Discrepancy) as ds, SUM(a.Quantity) as total, a.Attendant, b.Status as rstats FROM hotel_room_linens a INNER JOIN novadeci_suites b ON a.Room_No = b.Room_No Group By a.Room_No");
        $list2 = DB::select("SELECT * FROM hotel_room_linens");

        $count = DB::select('Select * from novadeci_suites');
        $array = array();

        foreach($count as $counts)
        {
            $array[] = ['Room_No' => $counts->Room_No];
        }
        
        return view('Housekeeper.Linen_Monitoring', ['list' => $list, 'list2' => $list2, 'array' => $array]);
    }

    public function Maintenance()
    {   
        $list = DB::SELECT('SELECT *, a.id FROM out_of_order_rooms a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.IsArchived = 0');
        $list2 = DB::SELECT('SELECT * FROM out_of_order_rooms a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.IsArchived = 1');
        
        return view('Housekeeper.Maintenances', ['list' => $list, 'list2' => $list2]);
    }

    public function Guest_Request()
    {
        $list = DB::select("SELECT * FROM guest_requests a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.Type_of_Request = 'Service Request' ");
        return view('Housekeeper.Guest_Request', ['list' => $list]);
    }

    public function reports(Request $request)
    {
        if($request->ajax()){
            if($request->get('num') == 1)
            {
                $data = housekeepings::join('hotel_reservations', 'housekeepings.Booking_No', '=', 'hotel_reservations.Booking_No')
                        ->select('housekeepings.*', 'hotel_reservations.Guest_Name', 'hotel_reservations.Check_In_Date', 'hotel_reservations.Check_Out_Date')
                        ->where('housekeepings.IsArchived', '=', 1)->where('hotel_reservations.IsArchived', '=', 1);

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
                        $instance->where('hotel_reservations.Check_Out_Date', '=', $now)->get();
                    }
                    elseif($request->get('date') == "Weekly")
                    {
                        $startweek = Carbon::now()->startofweek()->format('Y-m-d');
                        $endweek = Carbon::now()->endofweek()->format('Y-m-d');
                        $instance->where('hotel_reservations.Check_Out_Date', '>=', $startweek)
                                ->where('hotel_reservations.Check_Out_Date', '<=', $endweek)
                                ->get();
                    }
                    elseif($request->get('date') == "Monthly")
                    {
                        $startmonth = Carbon::now()->startofmonth()->format('Y-m-d');
                        $endmonth = Carbon::now()->endofmonth()->format('Y-m-d');
                        $instance->where('hotel_reservations.Check_Out_Date', '>=', $startmonth)
                                ->where('hotel_reservations.Check_Out_Date', '<=', $endmonth)
                                ->get();
                    }

                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search');

                            $converttodate = strtotime($search);
                            $date_search = date('Y-m-d', $converttodate);

                            $w->orwhere('housekeepings.Booking_No', 'LIKE', "%$search%")
                                ->orwhere('housekeepings.Attendant', 'LIKE', "%$search%")
                                ->orwhere('hotel_reservations.Guest_Name', 'LIKE', "%$search%")
                                ->orwhere('housekeepings.Housekeeping_Status', 'LIKE', "%$search%")
                                ->orwhere(DB::raw("(STR_TO_DATE(hotel_reservations.Check_Out_Date,'%Y-%m-%d'))"), 'LIKE', "%$date_search%" );
                        });
                    }          
                })
                ->make(true);   
            } 
            elseif($request->get('num') == 2)
            {
                $data = hotel_room_supplies_reports::select("*");
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
                    
                        $instance->where(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), '=', $now);
                    }
                    elseif($request->get('date2') == "Weekly")
                    {
                        $startweek = Carbon::now()->startofweek()->format('Y-m-d');
                        $endweek = Carbon::now()->endofweek()->format('Y-m-d');

                        $instance->where(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), '>=', $startweek)
                                ->where(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), '<=', $endweek);
                    }
                    elseif($request->get('date2') == "Monthly")
                    {
                        $startweek = Carbon::now()->startofmonth()->format('Y-m-d');
                        $endweek = Carbon::now()->endofmonth()->format('Y-m-d');

                        $instance->where(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), '>=', $startweek)
                                ->where(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), '<=', $endweek);
                    }

                    if (!empty($request->get('search2'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search2');

                            $converttodate = strtotime($search);

                            $date_search = date('Y-m-d', $converttodate);

                            $w->orwhere('name', 'LIKE', "%$search%")
                                ->orwhere('Attendant', 'LIKE', "%$search%")
                                ->orwhere('Status', 'LIKE', "%$search%")      
                                ->orwhere(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), 'LIKE', "%$date_search%");
                        });
                    }
                })
                ->make(true);   
            } 
            elseif($request->get('num') == 3)
            {
                $data =out_of_order_rooms::select("*")->where('IsArchived', '=', 1);
                return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request)
                {
                    if($request->get('date3') == "All"){
                        $instance->get();
                    }
                    elseif($request->get('date3') == "Daily")
                    {
                        $now = Carbon::now()->format('Y-m-d');
                    
                        $instance->where('Date_Resolved', '=', $now);
                    }
                    elseif($request->get('date3') == "Weekly")
                    {
                        $startweek = Carbon::now()->startofweek()->format('Y-m-d');
                        $endweek = Carbon::now()->endofweek()->format('Y-m-d');

                        $instance->where('Date_Resolved', '>=', $startweek)
                                ->where('Date_Resolved', '<=', $endweek);
                    }
                    elseif($request->get('date3') == "Monthly")
                    {
                        $startweek = Carbon::now()->startofmonth()->format('Y-m-d');
                        $endweek = Carbon::now()->endofmonth()->format('Y-m-d');

                        $instance->where('Date_Resolved', '>=', $startweek)
                                ->where('Date_Resolved', '<=', $endweek);
                    }
                    if (!empty($request->get('search3'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search3');
                            $converttodate = strtotime($search);

                            $date_search = date('Y-m-d', $converttodate);

                            $w->orwhere('Booking_No', 'LIKE', "%$search%")
                                ->orwhere('Room_No', 'LIKE', "%$search%")
                                ->orwhere('Status', 'LIKE', "%$search%")
                                ->orwhere('Priority_Level', 'LIKE', "%$search%")
                                ->orwhere('Discovered_By', 'LIKE', "%$search%")
                                ->orwhere(DB::raw("(STR_TO_DATE(Date_Resolved,'%Y-%m-%d'))"), 'LIKE', "%$date_search%");
                        });
                    }
                })
                ->make(true);  
            } 
            elseif($request->get('num') == 4)
            {
                $data = hotel_room_linens_reports::select("*");
                return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request)
                {
                    if($request->get('date4') == "All"){
                        $instance->get();
                    }
                    elseif($request->get('date4') == "Daily")
                    {
                        $now = Carbon::now()->format('Y-m-d');
                    
                        $instance->where(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), '=', $now);
                    }
                    elseif($request->get('date4') == "Weekly")
                    {
                        $startweek = Carbon::now()->startofweek()->format('Y-m-d');
                        $endweek = Carbon::now()->endofweek()->format('Y-m-d');

                        $instance->where(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), '>=', $startweek)
                                ->where(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), '<=', $endweek);
                    }
                    elseif($request->get('date4') == "Monthly")
                    {
                        $startweek = Carbon::now()->startofmonth()->format('Y-m-d');
                        $endweek = Carbon::now()->endofmonth()->format('Y-m-d');

                        $instance->where(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), '>=', $startweek)
                                ->where(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), '<=', $endweek);
                    }

                    if (!empty($request->get('search4'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search4');

                            $converttodate = strtotime($search);

                            $date_search = date('Y-m-d', $converttodate);

                            $w->orwhere('name', 'LIKE', "%$search%")
                                ->orwhere('Attendant', 'LIKE', "%$search%")
                                ->orwhere('Status', 'LIKE', "%$search%")
                                ->orwhere(DB::raw("(STR_TO_DATE(Date_Received,'%Y-%m-%d'))"), 'LIKE', "%$date_search%");
                        });
                    }
                })
                ->make(true);  
            }    
        }   
        return view('Housekeeper.Housekeeping_Reports');
    }

    public function check_linen(Request $request)
    {
        try
        {
            $room_no = $request->input('room_no');
            $bookingid = $request->input('booking_no');
            
           
            $totaldiscrepancy = array();
            $quantity = array();
            $status;
            

            for($i = 0; $i < count($request->input('name')); $i++)
            {
                if($request->input('discrepancy')[$i] > $request->input('quantity')[$i] || $request->input('discrepancy')[$i] < 0)
                {
                    Alert::Error('Linen Checking Failed!', 'Invalid Inputs!');
                    return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
                }
                else
                {
                    if($request->input('discrepancy')[$i] > 0)
                    {
                        $status = "Returned to Inventory";
                    }
                    else
                    {
                        $status = "Received";
                    }
                
                    $totaldiscrepancy[$i] = $request->input('current_discrepancy')[$i] + $request->input('discrepancy')[$i];
                    
                    $quantity[$i] = $request->input('quantity')[$i] - $request->input('discrepancy')[$i];
                    
                    DB::table('hotel_room_linens')
                        ->where(['Room_No' => $room_no, 'name' => $request->input('name')[$i]])
                        ->update([
                                'Discrepancy' => $totaldiscrepancy[$i],
                                'Status' => $status,
                                'Quantity' => $quantity[$i]    
                                ]);
                                
                }
            }

            DB::table('housekeepings')->where(['Room_No' => $room_no, 'IsArchived' => false])->update(['Housekeeping_Status' => "Out of Service"]);

            DB::table('hotel_reservations')->where('Booking_No', $bookingid)->update(['Booking_Status' => "Room Checked"]);

            

            Alert::Success('Success', 'Linen Successfully Checked!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');   
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Linen Checking Failed!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
        }
    }

    public function linen_request(Request $request)
    {
        try{
            $arraysofname[] = $request->name;
            $arraysofquantity[] = $request->requested_quantity;
            $arraysofremarks[] = $request->remarks;
            
            $date_requested = Carbon::now();
            Carbon::createFromFormat('Y-m-d H:i:s', $date_requested);

            $status;

            

            for($i=0; $i < count($request->name); $i++)
            {
                if($request->input('requested_quantity')[$i] > 0)
                {
                    $status = "Requested";
                }
                elseif($request->input('requested_quantity')[$i] == 0)
                {
                    $status = $request->input('stats')[$i];
                }
                else
                {
                    Alert::Error('Error', 'Linen Request Failed!');
                    return redirect('Linens_Monitoring')->with('Success', 'Data Updated');
                }
                DB::table('hotel_room_linens')
                    ->where(['Room_No' => $request->room_no, 'name' => $request->name[$i]])
                    ->update([
                        'Quantity_Requested' => $request->requested_quantity[$i], 
                        'Date_Requested' => $date_requested,
                        'Status' => $status, 
                ]);
            }
                        
            Alert::Success('Success', 'Linens Successfully Updated!');
            return redirect('Linens_Monitoring')->with('Success', 'Data Updated');
            
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Linen Request Failed!');
            return redirect('Linens_Monitoring')->with('Success', 'Data Updated');
        }
    }

    public function supply_request(Request $request)
    {
       
        try{
            $arraysofname[] = $request->name;
            $arraysofquantity[] = $request->requested_quantity;
            
            $date_requested = Carbon::now();
            Carbon::createFromFormat('Y-m-d H:i:s', $date_requested);

            $status;

            

            for($i=0; $i < count($request->name); $i++)
            {
                if($request->input('requested_quantity')[$i] > 0)
                {
                    $status = "Requested";
                }
                elseif($request->input('requested_quantity')[$i] == 0)
                {
                    $status = $request->input('stats')[$i];
                }
                else
                {
                    Alert::Error('Error', 'Supply Request Failed!');
                    return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
                }

                DB::table('hotel_room_supplies')
                    ->where(['Room_No' => $request->room_no, 'name' => $request->name[$i]])
                    ->update([
                        'Quantity_Requested' => $request->requested_quantity[$i], 
                        'Date_Requested' => $date_requested,
                        'Status' => $status, 
                ]);
            }
                        
            Alert::Success('Success', 'Supplies Successfully Updated!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
            
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Supply Request Failed!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
        }
    }

    public function deduct_supply(Request $request)
    {
        try{
            $arraysofname[] = $request->name;
            $arraysofquantity[] = $request->requested_quantity;
            $room_no = $request->input('room_no');
            $quantity = array();
            for($i=0; $i < count($request->name); $i++)
            {
                if($request->input('quantity')[$i] < $request->input('deduction')[$i] || $request->input('deduction')[$i] < 0)
                {
                    Alert::Error('Supply Checking Failed!', 'Invalid Inputs!');
                    return redirect('Housekeeper_Dashboard')->with('Failed', 'Data Updated');
                }
                else
                {  
                    $quantity[$i] = $request->input('quantity')[$i] - $request->input('deduction')[$i];
                    
                    DB::table('hotel_room_supplies')
                        ->where(['Room_No' => $request->room_no, 'name' => $request->name[$i]])
                        ->update([
                            'Quantity' => $quantity[$i],
                    ]);
                }
            }
                 
            DB::table('housekeepings')->where(['Room_No' => $room_no, 'IsArchived' => false])->update(array(
                'Housekeeping_Status' => "Inspect(After Checking)"
            ));
            Alert::Success('Success', 'Supplies Successfully Checked!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
            
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Supply Checking Failed!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
        }
    }

    public function assign_housekeeper(Request $request)
    {
        try{
            $this->validate($request,[
                'id' => '',
                'room_no'=> '',
                'check' => '',
                'housekeeper' => 'required'
                ]);

            $check = $request->input('check');
            $room_no = $request->input('room_no');

            if($check == "checkin")
            {
                $id = $request->input('id');
                $housekeeper = $request->input('housekeeper');
    
                DB::table('housekeepings')->where('ID', $id)->update(array('Attendant' => $housekeeper));

                Alert::Success('Success', 'Attendant successfully assigned!');
                return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
            }
            if($check == "arrival")
            {
                $id = $request->input('id');
                $housekeeper = $request->input('housekeeper');
                $inspect = "Inspect";
    
                DB::table('housekeepings')->where('ID', $id)->update(array('Attendant' => $housekeeper, 'Housekeeping_Status' => $inspect));
    
                Alert::Success('Success', 'Attendant Successfully Assigned!');
                return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
            }
            
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Attendant Assigning Failed!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
        }

    }

    public function update_housekeeping_status($id, $status, $req)
    {
        
        try
        {           
            $hid = $id;
            $reqid = $req;
            $stats = $status;
            $archive = true;
            
            
            if($stats == "Cleaned")
            {
                if($reqid != "null")
                {               
                    DB::table('housekeepings')->where('ID', $hid)->update(array('IsArchived' => $archive, 'Housekeeping_Status' => $stats));
                    DB::table('guest_requests')->where('Request_ID', $reqid)->update(array('IsArchived' => $archive));
                    //DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $available));
                   
                    Alert::Success('Success', 'Setting Status Success!');
                    return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
                }
                else
                {
                    DB::table('housekeepings')->where('ID', $hid)->update(array('IsArchived' => $archive, 'Housekeeping_Status' => $stats));
                    //DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $available));
                  
                    Alert::Success('Success', 'Setting Status Success!');
                    return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');    
                }
            }
            if($stats == "Arrival")
            {
                
                DB::table('housekeepings')->where('ID', $hid)->update(array('Housekeeping_Status' => "Cleaned (After Inspection)", 'Attendant' => "Unassigned"));

                Alert::Success('Success', 'Inspection Success!');
                return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
            }         
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Setting Status failed!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
        }

    }

    public function add_out_of_order(Request $request)
    {
        $this->validate($request,[
            'id' => '',
            'room_no' => '',
            'facility_type'=> '',
            'priority' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'book_no' => 'required',
            'discoveredby' => ''
            ]);

        $status = "Out of Order";

        $id = $request->input('id');
        $room_no = $request->input('room_no');
        $facility = $request->input('facility_type');
        $priority = $request->input('priority');
        $description = $request->input('description');
        $due_date = $request->input('due_date');
        $bookno = $request->input('book_no');
        $discoveredby = $request->input('discoveredby');
        

        $add = new out_of_order_rooms;

        $add->Facility_Type = $facility;
        $add->Room_No = $room_no;
        $add->Description = $description;
        $add->Priority_Level = $priority;
        $add->Due_Date = $due_date;
        $add->Booking_No = $bookno;
        $add->Discovered_By = $discoveredby;


        if($add->save())
        {
            DB::table('housekeepings')->where('ID', $id)->update(array('Housekeeping_Status' => $status));
            DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array('Status' => $status));
            
            Alert::Success('Success', 'Out of Order Room Successfully Recorded!');
            return redirect('Maintenances')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Failed', 'Out of Order Room Failed Recording!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Saved');
        }
        
        
    }

    public function update_maintenance_status($id, $rno, $bno, $due)
    {

        $maintenance_id = $id;
        $room_no = $rno;
        $booking_no = $bno;
        $datenow = now()->format('Y-m-d');
        $due_date = $due; 
        $status = "Resolved";
        $status2 = "Late Resolved";
        $datenow = Carbon::now();
        $datenow = date('Y-m-d', strtotime($datenow));

        

        try{

            if($due_date >= $datenow)
            {
                DB::table('out_of_order_rooms')->where('id', $maintenance_id)->update(array('Status' => $status, 'Date_Resolved' => $datenow, 'IsArchived' => true));
                DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array('Status' => "Vacant for Accommodation"));
                DB::table('hotel_reservations')->where('Booking_No', $booking_no)->update(array('IsArchived' => true));
                DB::table('housekeepings')->where('Booking_No', $booking_no)->update(array('IsArchived' => true));

                Alert::Success('Success', 'Maintenance Successfully Updated!');
                return redirect('Maintenances')->with('Success', 'Data Saved');
            }
            else
            {
                DB::table('out_of_order_rooms')->where('id', $maintenance_id)->update(array('Status' => $status2, 'Date_Resolved' => $datenow, 'IsArchived' => true));
                DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array('Status' => "Vacant for Accommodation"));
                DB::table('hotel_reservations')->where('Booking_No', $booking_no)->update(array('IsArchived' => true));
                DB::table('housekeepings')->where('Booking_No', $booking_no)->update(array('IsArchived' => true));

                Alert::Success('Success', 'Maintenance Successfully Updated!');
                return redirect('Maintenances')->with('Success', 'Data Saved');
            }
            

        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Maintenance Failed Updating!');
            return redirect('Maintenances')->with('Success', 'Data Saved');
        }
    }

    public function assign_housekeeper_supplies(Request $request)
    {
        try{

            $id = $request->input('id');
            $housekeeper = $request->input('housekeeper');

            DB::table('hotel_room_supplies')->where('id', $id)->update(array(
                'Attendant' => $housekeeper
            ));

            Alert::Success('Success', 'Attendant Successfully Assigned!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Attendant Assigning Failed!');
            return redirect('Housekeeper_Dashboard')->with('Success', 'Data Updated');
        }
    }

    public function assign_housekeeper_linens(Request $request)
    {
        try{

            $id = $request->input('id');
            $housekeeper = $request->input('housekeeper');

            DB::table('hotel_room_linens')->where('id', $id)->update(array(
                'Attendant' => $housekeeper
            ));

            Alert::Success('Success', 'Attendant Successfully Assigned!');
            return redirect('Linens_Monitoring')->with('Success', 'Data Updated');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Attendant Assigning Failed!');
            return redirect('Linens_Monitoring')->with('Success', 'Data Updated');
        }
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
                return redirect('Guest_Requests')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Failed', 'Guest Request Failed Updating!');
                return redirect('Guest_Requests')->with('Failed', 'Data Saved');
            }

        }
        catch(\Illuminate\Database\QueryException $e){
            Alert::Error('Failed', 'Guest Request Failed Updating!');
            return redirect('Guest_Requests')->with('Failed', 'Data Saved');
        }
    }

    public function LostandFound()
    {
        $check = DB::select('SELECT * FROM novadeci_suites');
		$count = array();

        foreach($check as $checks)
		{
			$count[] = ['Room_No' => $checks->Room_No];
		}

        $list = DB::select("SELECT * FROM lost_and_founds");
        return view('Housekeeper.LostandFound', ['count'=>$count, 'list' => $list]);
    }

    public function add_lost_items(Request $request)
    {
        $roomno = $request->input('room_no');
        $facility = $request->input('facility');
        $item = $request->input('item');
        $img = $request->input('images');
        $foundby = $request->input('foundby');
        $item_desc = $request->input('item_desc');

        $add = new lost_and_found;

        if($facility == "Hotel Room")
        {
            $add->Facility_Type = $facility;
            $add->Room_No = $roomno;
            $add->Item = $item;
            $add->Found_By = $foundby;
            $add->Item_Description = $item_desc;
        }
        else
        {
            $add->Facility_Type = $facility;
            $add->Item = $item;
            $add->Found_By = $foundby;
            $add->Item_Description = $item_desc;
        }

        if($request->hasfile('images'))
        {
            //add image to a folder
            $file = $request->file('images');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'--Lost-Item- '.$item.'-.'.$extention;
            $path = $file->move('lost_and_found/', $filename);

            $base64 = base64_encode($extention);

            $add->Item_Image = $path;
            $add->DB_Image = $base64;
        }

        if($add->save())
        {
            Alert::Success('Success', 'Lost Item Successfully Recorded!');
            return redirect('LostandFounds')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Failed', 'Lost Item Failed Recording!');
            return redirect('LostandFounds')->with('Failed', 'Data Saved');
        }
    }

    public function update_lost_items_status(Request $request)
    {
       $lost_id = $request->input('id');
       $claimed_by = $request->input('claimed_by');
       $datenow = Carbon::now()->format('Y-m-d');

       $update = DB::table('lost_and_founds')->where('id', $lost_id)->update([
            'Status' => "Claimed",
            'Date_Claimed' => $datenow,
            'Claimed_By' => $claimed_by,
            'IsArchived' => 1
       ]);

       if($update)
       {
            Alert::Success('Success', 'Lost Item Successfully Claimed!');
            return redirect('LostandFounds')->with('Success', 'Data Saved');
       }
       else
       {
            Alert::Error('Failed', 'Lost Item Failed Updating!');
            return redirect('LostandFounds')->with('Success', 'Data Saved');
       }
       
    }

    public function auctioned_or_disposed_items(Request $request)
    {
        $lost_id = $request->input('lost_id');
        $status = $request->input('status');

        $update = DB::table('lost_and_founds')->where('id', $lost_id)->update([
            'Status' => $status,
            'IsArchived' => 1
        ]);

        if($update)
        {
                Alert::Success('Success', 'Lost Item Successfully '.$status.'!');
                return redirect('LostandFounds')->with('Success', 'Data Saved');
        }
        else
        {
                Alert::Error('Failed', 'Lost Item Failed Updating!');
                return redirect('LostandFounds')->with('Success', 'Data Saved');
        }

    }
}
