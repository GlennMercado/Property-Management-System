<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_maintenance;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\hotel_room_supplies;
use App\Models\housekeepings;
use App\Models\out_of_order_rooms;
use Carbon\Carbon;

class HousekeepingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function housekeeping_dashboard()
    {
        $list = DB::select('SELECT * FROM housekeepings a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.IsArchived = 0 GROUP BY a.Room_No');

        $list2 = DB::select('SELECT * FROM housekeepings a INNER JOIN guest_requests b ON b.Request_ID = a.Request_ID');
        
        $archived = DB::select("SELECT * FROM housekeepings a INNER JOIN hotel_reservations b ON a.Booking_No = b.Booking_No WHERE a.IsArchived = 1 AND b.IsArchived = 1 ");

        $list3 = DB::select("SELECT a.Room_No, a.Date_Requested, a.Attendant, a.Status as hrsstats, b.status as rstats FROM hotel_room_supplies a INNER JOIN novadeci_suites b ON a.Room_No = b.Room_No GROUP BY a.Room_No");
        
        $list4 = DB::select("SELECT * FROM hotel_room_supplies WHERE Category = 'Guest Supply'");
        $list5 = DB::select("SELECT * FROM hotel_room_linens");

        $count = DB::select('Select * from novadeci_suites');
        $array = array();

        foreach($count as $counts)
        {
            $array[] = ['Room_No' => $counts->Room_No];
        }
        return view('Admin.pages.HousekeepingForms.Housekeeping_Dashboard', 
                    ['list' => $list,'list2' => $list2, 'archived' => $archived,'array' => $array, 'list3' => $list3, 'list4' => $list4, 'list5' => $list5]
                    );
    }
    public function hotel_housekeeping()
    {
        $list2 = DB::select('SELECT * FROM housekeepings a INNER JOIN novadeci_suites b ON a.Room_No = b.Room_No');

		return view('Admin.pages.HousekeepingForms.Hotel_Housekeeping',['list2' =>$list2]);
    }

    public function linen_monitoring()
    {
        $list = DB::select("SELECT a.Room_No, a.Date_Received, SUM(a.Discrepancy) as ds, SUM(a.Quantity) as total, a.Attendant, b.Status as rstats FROM hotel_room_linens a INNER JOIN novadeci_suites b ON a.Room_No = b.Room_No Group By a.Room_No");
        $list2 = DB::select("SELECT * FROM hotel_room_linens");

        $count = DB::select('Select * from novadeci_suites');
        $array = array();

        foreach($count as $counts)
        {
            $array[] = ['Room_No' => $counts->Room_No];
        }
        
        return view('Admin.pages.HousekeepingForms.Linen_Monitoring', ['list' => $list, 'list2' => $list2, 'array' => $array]);
    }
    
    public function check_linen(Request $request)
    {
        try
        {
            $room_no = $request->input('room_no');
            
           
            $totaldiscrepancy = array();
            $quantity = array();
            $status;
            

            for($i = 0; $i < count($request->input('name')); $i++)
            {
                if($request->input('discrepancy')[$i] > $request->input('quantity')[$i] || $request->input('discrepancy')[$i] < 0)
                {
                    Alert::Error('Linen Checking Failed!', 'Discrepancy is greater than quantity!');
                    return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
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
            

            Alert::Success('Success', 'Linens Successfully Checked!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');   
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Line Successfully Checked!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
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
                else
                {
                    $status = "Received";
                }
                DB::table('hotel_room_linens')
                    ->where(['Room_No' => $request->room_no, 'name' => $request->name[$i]])
                    ->update([
                        'Quantity_Requested' => $request->requested_quantity[$i], 
                        'Date_Requested' => $date_requested,
                        'Status' => $status, 
                ]);
            }
                        
            Alert::Success('Success', 'Linens Successfully Requested!');
            return redirect('Linen_Monitoring')->with('Success', 'Data Updated');
            
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Supply Request Failed!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
        }
    }

    public function housekeeping_reports()
    {
        $datenow = Carbon::now()->subDays(7);

        //$datenow = Carbon::now();
        
        $list = housekeepings::select("*")->join("hotel_reservations", "hotel_reservations.Booking_No", "=", "housekeepings.Booking_No")
                ->where('housekeepings.IsArchived', '=', 1)->where('hotel_reservations.IsArchived', '=', 1)
                ->whereDate('Check_Out_Date', '>=', $datenow->format('Y-m-d'))->get();

        $list2 = out_of_order_rooms::select("*")->join("hotel_reservations", "hotel_reservations.Booking_No", "=", "out_of_order_rooms.Booking_No")
                ->where('out_of_order_rooms.Status', '=', 'Resolved')->where('out_of_order_rooms.IsArchived', '=', 1)->where('hotel_reservations.IsArchived', '=', 1)
                ->whereDate('Date_Resolved', '>=', $datenow->format('Y-m-d'))->get();
                
        return view('Admin.pages.HousekeepingForms.Housekeeping_Reports', ['list' => $list, 'list2' => $list2]);
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
                else
                {
                    $status = "Requested";
                }

                DB::table('hotel_room_supplies')
                    ->where(['Room_No' => $request->room_no, 'name' => $request->name[$i]])
                    ->update([
                        'Quantity_Requested' => $request->requested_quantity[$i], 
                        'Date_Requested' => $date_requested,
                        'Status' => $status, 
                ]);
            }
                        
            Alert::Success('Success', 'Supplies Successfully Requested!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
            
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Supply Request Failed!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
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
                    Alert::Error('Supply Checking Failed!', 'Deduction is greater than quantity!');
                    return redirect('Housekeeping_Dashboard')->with('Failed', 'Data Updated');
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
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
            
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Supply Checking Failed!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
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

                DB::table('hotel_room_supplies')->where('Room_No', $room_no)->update(array('Attendant' => $housekeeper));

                DB::table('hotel_room_linens')->where('Room_No', $room_no)->update(array('Attendant' => $housekeeper));
    
                Alert::Success('Success', 'Attendant successfully assigned!');
                return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
            }
            if($check == "arrival")
            {
                $id = $request->input('id');
                $housekeeper = $request->input('housekeeper');
                $inspect = "Inspect";
    
                DB::table('housekeepings')->where('ID', $id)->update(array('Attendant' => $housekeeper, 'Housekeeping_Status' => $inspect));
    
                Alert::Success('Success', 'Attendant successfully assigned!');
                return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
            }
            
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Housekeeper assigning failed!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
        }

    }

    public function update_housekeeping_status($room_no, $id, $status, $req)
    {
        
        try
        {           
            $available = "Vacant for Accommodation";
            $hid = $id;
            $reqid = $req;
            $roomno = $room_no;
            $stats = $status;
            $archive = true;
            
            
            if($stats == "Cleaned")
            {
                if($reqid != "null")
                {               
                    DB::table('housekeepings')->where('ID', $hid)->update(array('IsArchived' => $archive, 'Housekeeping_Status' => $stats));
                    DB::table('guest_requests')->where('Request_ID', $reqid)->update(array('IsArchived' => $archive));
                    DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $available));
        
                    Alert::Success('Success', 'Setting Status Success!');
                    return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
                }
                else
                {
                    DB::table('housekeepings')->where('ID', $hid)->update(array('IsArchived' => $archive, 'Housekeeping_Status' => $stats));
                    DB::table('novadeci_suites')->where('Room_No', $roomno)->update(array('Status' => $available));
        
                    Alert::Success('Success', 'Setting Status Success!');
                    return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');    
                }
            }
            if($stats == "Arrival")
            {
                
                DB::table('housekeepings')->where('ID', $hid)->update(array('Housekeeping_Status' => "Cleaned (After Inspection)", 'Attendant' => "Unassigned"));

                Alert::Success('Success', 'Inspection Success!');
                return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
            }         
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Error', 'Setting Status failed!');
            return redirect('Housekeeping_Dashboard')->with('Success', 'Data Updated');
        }

    }

    

    
   


}
