<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commercial_spaces_application;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\commercial_spaces_tenants;
use App\Models\finance_2_reports;
use Carbon\Carbon;
use App\Models\commercial_space_rent_reports;
use Mail;
use App\Mail\Tenant_Status;
use App\Mail\Application_Status;
use App\Mail\Commercial_Unit_Maintenance;
use App\Mail\Commercial_Unit_Maintenance2;
use App\Mail\Commercial_Unit_Maintenance3;
use App\Mail\Commercial_Utility;
use App\Models\commercial_spaces_tenant_deposits;
use App\Models\commercial_spaces_tenant_reports;
use App\Models\commercial_space_units;
use App\Models\commercial_space_unit_reports;
use App\Models\commercial_space_utility_bills;
// use Twilio\Rest\Client;

class CommercialSpacesController extends Controller
{
    public function commercial_spaces()
    {
        $list = DB::select('SELECT * FROM commercial_spaces_applications WHERE IsArchived = 0');   
        $list2 = DB::select('SELECT * FROM commercial_spaces_applications WHERE IsArchived = 1');    
        $tenant = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID");

        $unit = DB::select("SELECT * FROM commercial_space_units WHERE Occupancy_Status = 'Vacant'");
        return view('Admin.pages.CommercialSpaces.CommercialSpaceForm', ['list'=>$list, 'list2' => $list2, 'tenant' => $tenant, 'unit' => $unit]);
    }

    public function comm_space_getrent($id)
    {
        $data = commercial_space_units::where('Space_Unit', $id)->first();

        return response()->json($data);
    }

    public function commercial_space_view($id)
    {
        $comid = $id;
        
        $list = DB::select("SELECT * FROM commercial_spaces_applications  WHERE id = '$comid'");    

        return view('Admin.pages.CommercialSpaces.CommercialSpaceView', ['list'=>$list]);
    }

    public function update_commercial_status(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $remarks = $request->input('remarks');
        $sql;

        if($status == "Approved" || $status == "For Revision")
        {
            if($remarks != null)
            {
                $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Status' => $status, 'Remarks' => $remarks]);
            }
            else
            {
                $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Status' => $status]);
            }
            
            if($sql)
            {

                $tenants = DB::table('commercial_spaces_applications')
                ->where('id', '=', $id)
                ->get();

                foreach ($tenants as $tenant) {
                    Mail::to($tenant->email)->send(new Application_Status($tenant));
                }

                Alert::Success('Success', 'Status Set to '.$status.'!');
                return redirect('CommercialSpaceForm')->with('Success', 'Data Updated');
            }
            else
            {
                Alert::Error('Failed', 'Updating Status Failed!');
                return redirect('CommercialSpaceForm')->with('Success', 'Data Updated');
            }
        }
        elseif($status == "Disapproved" || $status == "Failed")
        {
            if($remarks != null)
            {
                $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Status' => $status, 'Remarks' => $remarks, 'IsArchived' => 1]);
            }
            else
            {
                $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Status' => $status, 'IsArchived' => 1]);
            }

            if($sql)
            {
                $tenants = DB::table('commercial_spaces_applications')
                ->where('id', '=', $id)
                ->get();

                foreach ($tenants as $tenant) {
                    Mail::to($tenant->email)->send(new Application_Status($tenant));
                }

                Alert::Success('Success', 'Status Set to '.$status.'!');
                return redirect('CommercialSpaceForm')->with('Success', 'Data Updated');
            }
            else
            {
                Alert::Error('Failed', 'Updating Status Failed!');
                return redirect('CommercialSpaceForm')->with('Success', 'Data Updated');
            }
        }
        elseif($status == "Passed")
        {
            if($remarks != null)
            {
                $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Status' => $status, 'Remarks' => $remarks]);
            }
            else
            {
                $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Status' => $status]);
            }

            if($sql)
            {
                $tenants = DB::table('commercial_spaces_applications')
                ->where('id', '=', $id)
                ->get();

                foreach ($tenants as $tenant) {
                    Mail::to($tenant->email)->send(new Application_Status($tenant));
                }

                Alert::Success('Success', 'Interview Passed!');
                return redirect('CommercialSpaceForm')->with('Success', 'Data Updated');
            }
            else
            {
                Alert::Error('Failed', 'Updating Status Failed!');
                return redirect('CommercialSpaceForm')->with('Success', 'Data Updated');
            }
        }
    }

    public function add_commercial_tenant(Request $request)
    {
        try
        {
            $id = $request->input('id');
            $renters_fee = $request->input('renters_fee');
            //$due_date = Carbon::createFromFormat('m/d/Y', $request->input('due_date'))->format('Y-m-d');
            //$due_date = $request->input('due_date');
            $remarks = $request->input('remarks');
            $space_unit = $request->input('space_unit');

            $due_date = new Carbon($request->input('start_date'));
            $due_date = $due_date->addMonth();

            $tenant = new commercial_spaces_tenants;
            
            $start = $request->input('start_date');
            $end = Carbon::parse($start)->addYear();

            $tenant->Tenant_ID = $id;
            $tenant->Rental_Fee = $renters_fee;
            $tenant->Total_Amount = $renters_fee;
            $tenant->Due_Date = $due_date;
            $tenant->Space_Unit = $space_unit;
            $tenant->Start_Date = $start;
            $tenant->End_Date = $end;
            
            if($tenant->save())
            {
                if($remarks != null)
                {
                    DB::table('commercial_spaces_applications')->where('id', $id)->update([ 'Status' => 'Tenant', 'Remarks' => $remarks]);
                }
                else
                {
                    DB::table('commercial_spaces_applications')->where('id', $id)->update([ 'Status' => 'Tenant']);
                }

                DB::table('commercial_space_units')->where('Space_Unit', $request->input('space_unit'))->update(['Occupancy_Status' => "Occupied"]);

                $security_deposit = $renters_fee * 2;
                
                $now = Carbon::now()->format('Y-m-d');

                $security = new commercial_spaces_tenant_deposits;

                $security->Tenant_ID = $id;
                $security->Security_Deposit = $security_deposit;
                $security->Paid_Date = $now;

                $security->save();

                $tenants = DB::table('commercial_spaces_applications')
                ->where('id', '=', $id)
                ->get();

                foreach ($tenants as $tenant) {
                    Mail::to($tenant->email)->send(new Application_Status($tenant));

                    // Send SMS notification
                    // $message = "Congratulations! {$tenant->name_of_owner}. You are now one of our tenants.";
                    // $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
                    // $twilio->messages->create(
                    //     '+63' . substr($tenant->mobile_no, 1),
                    //     [
                    //         'from' => env('TWILIO_FROM_NUMBER'),
                    //         'body' => $message,
                    //     ]
                    // );
                }
                

                Alert::Success('Success', 'Successfully Adding Tenant!');
                return redirect('CommercialSpaceForm')->with('Success', 'Data Updated');
            }
            else
            {
                Alert::Error('Failed', 'Updating Failed!');
                return redirect('CommercialSpaceForm')->with('Success', 'Data Updated');
            }
            
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Updating Failed!');
            return redirect('CommercialSpaceForm')->with('Success', 'Data Updated');
        }
    }

    public function commercial_spaces_tenants()
    {
        $now = Carbon::now()->format('Y-m-d');

        $list = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0 AND b.Tenant_Status != 'Ending Contract' AND b.Tenant_Status != 'For Renewal' AND b.End_Date > '$now'");
        $list2 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0 AND b.Tenant_Status = 'Ending Contract' OR b.Tenant_Status = 'For Renewal' OR b.End_Date <= '$now'");
        $list3 = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 1');
        $list5 = DB::select("SELECT a.*, b.Space_Unit FROM commercial_spaces_tenant_deposit_reports a INNER JOIN commercial_spaces_tenants b ON a.Tenant_ID = b.Tenant_ID");
        
        $count = DB::select("SELECT * From commercial_spaces_tenants");
        $array = array();

        foreach($count as $counts)
        {
            $array[] = ['Tenant_ID' => $counts->Tenant_ID];
        }
        $list4 = DB::select("SELECT * FROM commercial_spaces_tenant_reports");

        return view('Admin.pages.CommercialSpaces.CommercialSpaceTenants', ['list' => $list, 'list2' => $list2, 'list3' => $list3, 'list4' => $list4, 'list5' => $list5, 'array' => $array]);
    }

    public function commercial_rent_collections()
    {
        $list = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0');

        $list2 = DB::select("SELECT a.Space_Unit, b.* FROM commercial_spaces_tenants a INNER JOIN commercial_spaces_tenant_deposits b ON a.Tenant_ID = b.Tenant_ID");

        $count = DB::select("SELECT * From commercial_spaces_tenants");
        $array = array();

        foreach($count as $counts)
        {
            $array[] = ['Tenant_ID' => $counts->Tenant_ID];
        }

        $count2 = DB::select("SELECT COUNT(*) as cnt FROM commercial_space_rent_reports WHERE Payment_Status = 'Non-Payment'");
        $list3 = DB::select("SELECT * FROM commercial_space_rent_reports");
        $list4 = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 1');
        $list5 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenant_deposits b ON a.id = b.Tenant_ID WHERE a.IsArchived = 1");

        return view('Admin.pages.CommercialSpaces.CommercialSpaceRent', ['list' => $list, 'list2' => $list2, 'array' => $array, 'list3' => $list3, 'list4' => $list4, 'list5' => $list5, 'count2' => $count2]);
    }

    public function commercial_space_units()
    {
        //$list = DB::select("SELECT a.*, b.Tenant_ID FROM commercial_space_units a INNER JOIN commercial_spaces_tenants b ON a.Space_Unit = b.Space_Unit INNER JOIN commercial_spaces_applications c ON b.Tenant_ID = c.id WHERE c.IsArchived = 0");
        
        $list = DB::select("SELECT * FROM commercial_space_units WHERE Occupancy_Status != 'Occupied'");
        $list2 = DB::select("SELECT a.IsArchived, a.name_of_owner, b.Tenant_ID, c.* FROM commercial_spaces_applications a RIGHT JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID RIGHT JOIN commercial_space_units c ON b.Space_Unit = c.Space_Unit WHERE a.IsArchived = 0 AND c.Occupancy_Status = 'Occupied'");

        $check = DB::select('SELECT COUNT(*) as cnt FROM commercial_space_units');
		$count = array();

        $count1 = DB::select("SELECT * From commercial_space_units");
        $array = array();

        $list3 = DB::select("SELECT a.*, b.name_of_owner FROM commercial_space_unit_reports a INNER JOIN commercial_spaces_applications b ON a.Tenant_ID = b.id");
        
        foreach($count1 as $counts)
        {
            $array[] = ['Units' => $counts->Space_Unit];
        }

		foreach($check as $checks)
		{
			$count[] = ['counts' => $checks->cnt];
		}
        

        return view('Admin.pages.CommercialSpaces.CommercialSpaceUnits', ['list' => $list, 'list2' => $list2, 'count' => $count, 'array' => $array, 'list3' => $list3]);
    
    }
    public function update_maintenance3_status($id, $tid)
    {
        $id = $id;
        $tenant_id = $tid;

        $tenants = DB::table('commercial_spaces_tenants')
        ->join('commercial_spaces_applications', 'commercial_spaces_applications.id', '=', 'commercial_spaces_tenants.Tenant_ID')
        ->where('commercial_spaces_tenants.Tenant_ID', '=', $tenant_id)->get();

        $name;
        $status = "Paid";
        foreach($tenants as $tenant)
        {
            $name = $tenant->name_of_owner;
            Mail::to($tenant->email)->send(new Commercial_Unit_Maintenance2($tenant, $status));
        }

        $sql = DB::table('commercial_space_unit_reports')->where('id', $id)->update([
            'Paid_By' => $name.' (Late)',
            'Payment_Status' => "Paid (Late)",
            'updated_at' => DB::RAW('NOW()')
        ]);

        

        if($sql)
        {
            Alert::Success('Success', 'Maintenance Payment Successfully Updated!');
            return redirect('CommercialSpaceUnits')->with('Success', 'Data Updated');
        }
        else
        {
            Alert::Error('Failed', 'Maintenance Payment Failed Updating!');
            return redirect('CommercialSpaceUnits')->with('Success', 'Data Updated');
        }
    }
    
    public function commercial_space_utility_bills()
    {
        $list = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0');
           
        $count = DB::select("SELECT * From commercial_spaces_tenants");
        $array = array();
        
        foreach($count as $counts)
        {
            $array[] = ['Tenant_ID' => $counts->Tenant_ID];
        }
        $list2 = DB::select("SELECT * FROM commercial_space_utility_bills");
        
        return view('Admin.pages.CommercialSpaces.CommercialSpaceUtility', ['list' => $list, 'array' => $array, 'list2' => $list2]);
    }

   
}
