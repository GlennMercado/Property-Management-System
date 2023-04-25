<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commercial_spaces_application;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\commercial_spaces_tenants;
use Carbon\Carbon;
use App\Models\commercial_space_rent_reports;
use Mail;
use App\Mail\Tenant_Status;
use App\Mail\Application_Status;
use App\Mail\Commercial_Unit_Maintenance;
use App\Mail\Commercial_Unit_Maintenance2;
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

            $due_date = new Carbon($request->input('start_date'));
            $due_date = $due_date->addMonth();

            $tenant = new commercial_spaces_tenants;
            
            $start = $request->input('start_date');
            $end = Carbon::parse($start)->addYear();

            $tenant->Tenant_ID = $id;
            $tenant->Rental_Fee = $renters_fee;
            $tenant->Total_Amount = $renters_fee;
            $tenant->Due_Date = $due_date;
            $tenant->Space_Unit = $request->input('space_unit');
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
        $list = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0 AND b.Tenant_Status != 'Ending Contract' AND b.Tenant_Status != 'For Renewal'");
        $list2 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0 AND b.Tenant_Status = 'Ending Contract' OR b.Tenant_Status = 'For Renewal'");
        $list3 = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 1');
        
        $count = DB::select("SELECT * From commercial_spaces_tenants");
        $array = array();

        foreach($count as $counts)
        {
            $array[] = ['Tenant_ID' => $counts->Tenant_ID];
        }
        $list4 = DB::select("SELECT * FROM commercial_spaces_tenant_reports");

        return view('Admin.pages.CommercialSpaces.CommercialSpaceTenants', ['list' => $list, 'list2' => $list2, 'list3' => $list3, 'list4' => $list4, 'array' => $array]);
    }

    public function commercial_rent_collections()
    {
        $list = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0');

        $list2 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenant_deposits b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0");

        $count = DB::select("SELECT * From commercial_spaces_tenants");
        $array = array();

        foreach($count as $counts)
        {
            $array[] = ['Tenant_ID' => $counts->Tenant_ID];
        }

        $list3 = DB::select("SELECT * FROM commercial_space_rent_reports");
        $list4 = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 1');
        $list5 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenant_deposits b ON a.id = b.Tenant_ID WHERE a.IsArchived = 1");

        return view('Admin.pages.CommercialSpaces.CommercialSpaceRent', ['list' => $list, 'list2' => $list2, 'array' => $array, 'list3' => $list3, 'list4' => $list4, 'list5' => $list5]);
    }

    public function commercial_space_units()
    {
        $list = DB::select("SELECT * FROM commercial_space_units");

        $check = DB::select('SELECT COUNT(*) as cnt FROM commercial_space_units');
		$count = array();

		foreach($check as $checks)
		{
			$count[] = ['counts' => $checks->cnt];
		}

        return view('Admin.pages.CommercialSpaces.CommercialSpaceUnits', ['list' => $list, 'count' => $count]);
    
    }
    
    public function update_rental_collection(Request $request)
    {
        $id = $request->input('tenant_id');
        $now = Carbon::now()->format('Y-m-d');
        $status = $request->input('status');
        $due_date = new Carbon($request->input('due'));
        $due_date = $due_date->addMonth();
        $rent_fee = $request->input('rental_fee') + $request->input('total');
        $sql;

        if($status == "Paid")
        {
            $sql = DB::table("commercial_spaces_tenants")->where("Tenant_ID", $id)->update(
                [
                    'Paid_Date' => $now, 
                    'Payment_Status' => $status,
                    'Due_Date' => $due_date,
                    'Total_Amount' => $request->input('rental_fee'),
                    'updated_at' => DB::raw('NOW()')
                ]
            );
            DB::table('commercial_space_rent_reports')->where(['Tenant_ID' => $id, 'Payment_Status' => 'Non-Payment'])
                ->update(
                    [
                        'Payment_Status' => "Paid",
                        'Paid_Date' => $now
                    ]
                );
        }
        else
        {
            $sql = DB::table("commercial_spaces_tenants")->where("Tenant_ID", $id)->update(
                [
                    'Paid_Date' => null, 
                    'Payment_Status' => $status,
                    'Due_Date' => $due_date,
                    'Total_Amount' => $rent_fee,
                    'updated_at' => DB::raw('NOW()')
                ]
            );
        }

        if($sql)
        {   
            $report = new commercial_space_rent_reports;

            $report->Tenant_ID = $id;
            $report->Rental_Fee = $request->input('rental_fee');
            $report->Due_Date = $request->input('due');
            $report->Payment_Status = $request->input('status');
            if($status == "Paid")
            {
                $report->Paid_Date = $now;
            }

            $report->save();

            Alert::Success('Success', 'Payment Status Successfully Updated!');
            return redirect('CommercialSpaceRentCollections')->with('Success', 'Data Updated');
        }
        else
        {
            Alert::Error('Failed', 'Updating of Status Failed!');
            return redirect('CommercialSpaceRentCollections')->with('Success', 'Data Updated');                
        }
    }

    public function update_tenant_status(Request $request)
    {
        $id = $request->input('tenant_id');
        $status = $request->input('status');
        $sql;
        $remarks;
        $now = Carbon::now()->format('Y-m-d');
        if($request->input('remarks') != null)
        {
            $remarks = $request->input('remarks'); 
        }
        else
        {
            $remarks = null;
        }
        
        if($status == "Terminated")
        {
            $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(
                [
                    'Remarks' => $remarks, 
                    'IsArchived' => 1, 
                    'Status' => "Tenant (Terminated)",
                    'updated_at' => DB::raw('NOW()')
                ]);
            DB::table('commercial_spaces_tenants')->where('Tenant_ID', $id)->update(['Tenant_Status' => $status]);
        }
        elseif($status == "Active (Operating)")
        {
            $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(
                [
                    'Remarks' => $remarks,
                    'Status' => "Tenant",
                    'updated_at' => DB::raw('NOW()')
                ]);
            DB::table('commercial_spaces_tenants')->where('Tenant_ID', $id)->update(['Tenant_Status' => $status]);

            DB::table('commercial_space_rent_reports')->where(['Tenant_ID' => $id, 'Payment_Status' => 'Non-Payment'])
                ->update(
                    [
                        'Payment_Status' => "Paid",
                        'Paid_Date' => $now
                    ]
                );
        }
        else
        {
            $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Remarks' => $remarks, 'updated_at' => DB::raw('NOW()')]);
            DB::table('commercial_spaces_tenants')->where('Tenant_ID', $id)->update(['Tenant_Status' => $status]);
        }
      
        if($sql)
        {
            $tenants = DB::table('commercial_spaces_tenants')
            ->join('commercial_spaces_applications', 'commercial_spaces_applications.id', '=', 'commercial_spaces_tenants.Tenant_ID')
            ->where('Tenant_ID', '=', $id)
            ->get();

            foreach ($tenants as $tenant) {
                Mail::to($tenant->email)->send(new Tenant_Status($tenant));
            }

            Alert::Success('Success', 'Tenant Status Successfully Updated!');
            return redirect('CommercialSpaceTenants')->with('Success', 'Data Updated');
        }
        else 
        {
            Alert::Error('Failed', 'Tenant Status Updating Failed!');
            return redirect('CommercialSpaceTenants')->with('Success', 'Data Updated');
        }
       
    }

    public function renew_tenant(Request $request)
    {
        $id = $request->input('tenant_id');
        $start = $request->input('start_date');
        $end = Carbon::parse($start)->addYear()->format('Y-m-d');
        $remarks = $request->input('remarks');
        $rent_fee = $request->input('rent_fee');
        $due_date = new Carbon($start);
        $due_date = $due_date->addMonth();
        $now = Carbon::now()->format('Y-m-d');

        $sql = DB::table('commercial_spaces_tenants')->where('Tenant_ID', $id)->update(
            [
                'Total_Amount' => $rent_fee,
                'Start_Date' => $start,
                'End_Date' => $end,
                'Due_Date' => $due_date,
                'Tenant_Status' => "Active (Operating)",
                'Payment_Status' => "Paid",
                'updated_at' => DB::raw('NOW()')
            ]
        );

        if($sql)
        {
            $add_report = new commercial_spaces_tenant_reports;
            $add_deposit = new commercial_spaces_tenant_deposits;

            $select = DB::select("SELECT * FROM commercial_spaces_tenants WHERE Tenant_ID = '$id'");
            foreach($select as $lists)
            {
                $add_report->Tenant_ID = $lists->Tenant_ID;
                $add_report->Space_Unit = $lists->Space_Unit;
                $add_report->Rental_Fee = $lists->Rental_Fee;
                $add_report->Total_Amount = $lists->Total_Amount;
                $add_report->Due_Date = $lists->Due_Date;
                $add_report->Start_Date = $lists->Start_Date;
                $add_report->End_Date = $lists->End_Date;
                $add_report->Tenant_Status = $lists->Tenant_Status;
                $add_report->Paid_Date = $lists->Paid_Date;
                $add_report->Payment_Status = $lists->Payment_Status;

                $add_report->save();

                $add_deposit->Tenant_ID = $lists->Tenant_ID;
                $add_deposit->Security_Deposit = $lists->Rental_Fee * 2;
                $add_deposit->Paid_Date = $now;
                
                $add_deposit->save();
            }

            $tenants = DB::table('commercial_spaces_tenants')
                ->join('commercial_spaces_applications', 'commercial_spaces_applications.id', '=', 'commercial_spaces_tenants.Tenant_ID')
                ->where('commercial_spaces_applications.id', '=', $id)
                ->get();

            foreach ($tenants as $tenant) {
                Mail::to($tenant->email)->send(new Tenant_Status($tenant));
            }
            
            Alert::Success('Success', 'Tenant Successfully Renewed!');
            return redirect('CommercialSpaceTenants')->with('Success', 'Data Updated');
        }
        else
        {
            Alert::Error('Failed', 'Tenant Renewal Failed!');
            return redirect('CommercialSpaceTenants')->with('Success', 'Data Updated');
        }
    }

    public function add_comm_space_unit(Request $request)
    {
        $spaceunits = $request->input('space_units');
        $size = $request->input('size');
        $rental_fee = $request->input('rental_fee');

        $space = new commercial_space_units;

        $space->Space_Unit = $spaceunits;
        $space->Measurement_Size = $size;
        $space->Rental_Fee = $rental_fee;
        $space->Security_Deposit = $rental_fee * 2;

        if($space->save())
        {
            Alert::Success('Success', 'Commercial Space Successfully Added!');
            return redirect('CommercialSpaceUnits')->with('Success', 'Data Updated');
        }
        else
        {
            Alert::Error('Failed', 'Failed on Adding Commercial Space!');
            return redirect('CommercialSpaceUnits')->with('Success', 'Data Updated');
        }
    }

    public function edit_comm_unit(Request $request)
    {
        $space_unit = $request->input('space_units');
        $size = $request->input('size');
        $rental_fee = $request->input('rental_fee');

        $sql = DB::table('commercial_space_units')->where('Space_Unit', $space_unit)
                ->update([
                    'Measurement_Size' => $size,
                    'Rental_Fee' => $rental_fee,
                    'Security_Deposit' => $rental_fee * 2,
                    'updated_at' => DB::raw('NOW()')
                ]);

        if($sql)
        {
            Alert::Success('Success', 'Commercial Space '.$space_unit.' Successfully Updated!');
            return redirect('CommercialSpaceUnits')->with('Success', 'Data Updated');
        }
        else
        {
            Alert::Error('Failed', 'Commercial Space '.$space_unit.' Failed Updating!');
            return redirect('CommercialSpaceUnits')->with('Success', 'Data Updated');
        }

    }
    public function comm_space_maintainance_cost(Request $request)
    {
        $space_unit = $request->input('space_units');
        $status = $request->input('stats');
        $cost = $request->input('cost');
        $due_date = $request->input('due');
        $now = Carbon::now()->format('Y-m-d');

        $sql = DB::table('commercial_space_units')->where('Space_Unit', $space_unit)->update(
            [
                'Maintenance_Status' => "No",
                'Maintenance_Due_Date' => null, 
                'updated_at' => DB::raw('NOW()')
            ]
        );

        if($sql)
        {
            DB::table('commercial_spaces_tenants')
            ->join('commercial_spaces_applications', 'commercial_spaces_applications.id', '=', 'commercial_spaces_tenants.Tenant_ID')
            ->where('commercial_spaces_tenants.Space_Unit', '=', $space_unit)
            ->update(['Tenant_Status' => "Non-Compliance"]);

            $tenants = DB::table('commercial_spaces_tenants')
            ->join('commercial_spaces_applications', 'commercial_spaces_applications.id', '=', 'commercial_spaces_tenants.Tenant_ID')
            ->where('commercial_spaces_tenants.Space_Unit', '=', $space_unit)->get();
            
            $add = new commercial_space_unit_reports;
            // Send email to each tenant
            foreach ($tenants as $tenant) {
                $add->Tenant_ID = $tenant->Tenant_ID;
                $add->Space_Unit = $space_unit;
                $add->Maintenance_Cost = $cost;
                $add->Due_Date = $due_date;
                $add->Paid_Date = $now;
                $add->Paid_By = "Novadeci";

                $add->save();

                Mail::to($tenant->email)->send(new Commercial_Unit_Maintenance($tenant, $cost));
            }

            Alert::Success('Success', 'Commercial Space '.$space_unit.' Successfully Updated!');
            return redirect('CommercialSpaceUnits')->with('Success', 'Data Updated');
        }
        else
        {
            Alert::Error('Failed', 'Commercial Space '.$space_unit.' Failed in updating!');
            return redirect('CommercialSpaceUnits')->with('Success', 'Data Updated');
        }
    }

    public function update_comm_maintenance_status($id, $stats)
    {
        $space_unit = $id;
        $status = $stats;
        $due_date = Carbon::now()->addMonth()->format('Y-m-d');

        if($status == "Yes")
        {
            $sql = DB::table('commercial_space_units')->where('Space_Unit', $space_unit)->update(['Maintenance_Status' => $status, 'Maintenance_Due_Date' => $due_date]);
        }
        else
        {
            $sql = DB::table('commercial_space_units')->where('Space_Unit', $space_unit)->update(['Maintenance_Status' => $status, 'Maintenance_Due_Date' => null]);
        }
       
        if($sql)
        {
            $tenants = DB::table('commercial_spaces_tenants')
            ->join('commercial_spaces_applications', 'commercial_spaces_applications.id', '=', 'commercial_spaces_tenants.Tenant_ID')
            ->where('commercial_spaces_tenants.Space_Unit', '=', $space_unit)->get();
            
            // Send email to each tenant
            foreach ($tenants as $tenant) {
                Mail::to($tenant->email)->send(new Commercial_Unit_Maintenance2($tenant, $status));
            }

            Alert::Success('Success', 'Commercial Space '.$space_unit.' Successfully Updated!');
            return redirect('CommercialSpaceUnits')->with('Success', 'Data Updated');
        }
        else
        {
            Alert::Error('Failed', 'Commercial Space '.$space_unit.' Failed Updating!');
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

    public function add_commercial_tenant_utility_bill(Request $request)
    {
        $tenant_id = $request->input('tenant_id');
        $type_of_bill = $request->input('type_of_bill');
        $amount = $request->input('amount');
        $due_date;
        $select = DB::select("SELECT * FROM commercial_spaces_tenants WHERE Tenant_ID = '$tenant_id'");

        foreach($select as $lists)
        {
            if($type_of_bill == "Electricity")
            {
                $check = DB::select("SELECT * FROM commercial_space_utility_bills WHERE Tenant_ID = '$tenant_id' AND Type_of_Bill = '$type_of_bill' AND Due_Date = '$lists->Due_Date'");
                if($check)
                {
                    Alert::Error('Failed', 'Tenant Already have Electricity Bill for due!');
                    return redirect('CommercialSpaceUtilityBills')->with('Success', 'Data Updated');
                }
            }
            elseif($type_of_bill == "Water")
            {
                $check = DB::select("SELECT * FROM commercial_space_utility_bills WHERE Tenant_ID = '$tenant_id' AND Type_of_Bill = '$type_of_bill' AND Due_Date = '$lists->Due_Date'");
                if($check)
                {
                    Alert::Error('Failed', 'Tenant Already have Water Bill for due!');
                    return redirect('CommercialSpaceUtilityBills')->with('Success', 'Data Updated');
                }
            }

            $due_date = $lists->Due_Date;
        }


        $add = new commercial_space_utility_bills;

        $add->Tenant_ID = $tenant_id;
        $add->Type_of_Bill = $type_of_bill;
        $add->Total_Amount = $amount;
        $add->Due_Date = $due_date;

        if($add->save())
        {
            $check1 = DB::select("SELECT * FROM commercial_space_utility_bills WHERE Tenant_ID = '$tenant_id' AND Type_of_Bill = 'Electricity' AND Due_Date = '$due_date'");
            $check2 = DB::select("SELECT * FROM commercial_space_utility_bills WHERE Tenant_ID = '$tenant_id' AND Type_of_Bill = 'Water' AND Due_Date = '$due_date'");   
            
            if($check1 && $check2)
            {
                $tenants = DB::table('commercial_spaces_tenants')
                ->join('commercial_spaces_applications', 'commercial_spaces_applications.id', '=', 'commercial_spaces_tenants.Tenant_ID')
                ->where('commercial_spaces_tenants.Tenant_ID', '=', $tenant_id)->get();
                
                // Send email to each tenant
                foreach ($tenants as $tenant) {
                    Mail::to($tenant->email)->send(new Commercial_Utility($tenant));
                }
            }
            

            Alert::Success('Success', $type_of_bill.' Bill Successfully Added!');
            return redirect('CommercialSpaceUtilityBills')->with('Success', 'Data Updated');  
        }
        else
        {
            Alert::Error('Failed', $type_of_bill.' Bill Failed Adding!');
            return redirect('CommercialSpaceUtilityBills')->with('Success', 'Data Updated');   
        }
       

    }

    public function update_utility_payment(Request $request)
    {
        $tenant_id = $request->input('tenant_id');
        $due = $request->input('due');
        $water_status = $request->input('water_status');
        $electric_status = $request->input('electricity_status');
        $now = Carbon::now()->format('Y-m-d');

        $sql1;
        $sql2;

        if($water_status == "Paid")
        {
            $sql1 = DB::table('commercial_space_utility_bills')->where(['Tenant_ID' => $tenant_id, 'Type_of_Bill' => "Water", 'Due_Date' => $due])
                    ->update(['Paid_Date' => $now, 'Payment_Status' => $water_status, 'updated_at' => DB::RAW('NOW()')]);
        }
        elseif($water_status == "Non-Payment")
        {
            $sql1 = DB::table('commercial_space_utility_bills')->where(['Tenant_ID' => $tenant_id, 'Type_of_Bill' => "Water", 'Due_Date' => $due])
            ->update(['Payment_Status' => $water_status, 'updated_at' => DB::RAW('NOW()')]);
        }

        if($electric_status == "Paid")
        {
            $sql2 = DB::table('commercial_space_utility_bills')->where(['Tenant_ID' => $tenant_id, 'Type_of_Bill' => "Electricity", 'Due_Date' => $due])
                ->update(['Paid_Date' => $now, 'Payment_Status' => $electric_status, 'updated_at' => DB::RAW('NOW()')]);
        }
        elseif($electric_status == "Non-Payment")
        {
            $sql2 = DB::table('commercial_space_utility_bills')->where(['Tenant_ID' => $tenant_id, 'Type_of_Bill' => "Electricity", 'Due_Date' => $due])
                ->update(['Payment_Status' => $electric_status, 'updated_at' => DB::RAW('NOW()')]);
        }

        if($water_status != null && $electric_status != null)
        {
            if($sql1 && $sql2)
            {
                Alert::Success('Success', 'Utility Bills Payment Successfully Updated!');
                return redirect('CommercialSpaceUtilityBills')->with('Success', 'Data Updated');  
            }
            else
            {
                Alert::Error('Failed', 'Utility Bills Payment Failed Updating!');
                return redirect('CommercialSpaceUtilityBills')->with('Success', 'Data Updated'); 
            }
        }
        elseif($water_status != null && $electric_status == null)
        {
            if($sql1)
            {
                Alert::Success('Success', 'Utility Bills Payment Successfully Updated!');
                return redirect('CommercialSpaceUtilityBills')->with('Success', 'Data Updated');  
            }
            else
            {
                Alert::Error('Failed', 'Utility Bills Payment Failed Updating!');
                return redirect('CommercialSpaceUtilityBills')->with('Success', 'Data Updated'); 
            }
        }
        elseif($water_status == null && $electric_status != null)
        {
            if($sql2)
            {
                Alert::Success('Success', 'Utility Bills Payment Successfully Updated!');
                return redirect('CommercialSpaceUtilityBills')->with('Success', 'Data Updated');  
            }
            else
            {
                Alert::Error('Failed', 'Utility Bills Payment Failed Updating!');
                return redirect('CommercialSpaceUtilityBills')->with('Success', 'Data Updated'); 
            }
        }
    }
}
