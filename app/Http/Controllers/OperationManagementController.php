<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stocksfunctions;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\guest_request;
use Carbon\Carbon;

class OperationManagementCOntroller extends Controller
{
    public function OperationDashboard()
    {
        return view('OperationDashboard');
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
    public function Reports()
    {
        return view('Reports');
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