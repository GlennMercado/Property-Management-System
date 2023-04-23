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
use App\Models\commercial_spaces_tenant_deposits;

class CommercialSpacesController extends Controller
{
    public function commercial_spaces()
    {
        $list = DB::select('SELECT * FROM commercial_spaces_applications WHERE IsArchived = 0');   
        $list2 = DB::select('SELECT * FROM commercial_spaces_applications WHERE IsArchived = 1');    
        $tenant = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID");
        return view('Admin.pages.CommercialSpaces.CommercialSpaceForm', ['list'=>$list, 'list2' => $list2, 'tenant' => $tenant]);
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

            $tenant->Tenant_ID = $id;
            $tenant->Rental_Fee = $renters_fee;
            $tenant->Total_Amount = $renters_fee;
            $tenant->Due_Date = $due_date;
            $tenant->Space_Unit = $request->input('space_unit');
            $tenant->Start_Date = $request->input('start_date');
            $tenant->End_Date = $request->input('end_date');
            
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

                $security_deposit - $renters_fee * 2;
                
                $now = Carbon::now()->format('Y-m-d');

                $security = new commercial_spaces_tenant_deposits;

                $security->Tenant_ID = $id;
                $security->Security_Deposit = $security_deposit;
                $security->Paid_Date = $now;

                $security->save();
                
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
        $list = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0 AND b.Tenant_Status != 'Ending Contract'");
        $list2 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0 AND b.Tenant_Status = 'Ending Contract' OR b.Tenant_Status = 'For Renewal'");
        $list3 = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 1');
        
        return view('Admin.pages.CommercialSpaces.CommercialSpaceTenants', ['list' => $list, 'list2' => $list2, 'list3' => $list3]);
    }

    public function commercial_rent_collections()
    {
        $list = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0');
        
        $count = DB::select("SELECT * From commercial_spaces_tenants");
        $array = array();

        foreach($count as $counts)
        {
            $array[] = ['Tenant_ID' => $counts->Tenant_ID];
        }

        $list3 = DB::select("SELECT * FROM commercial_space_rent_reports");
        return view('Admin.pages.CommercialSpaces.CommercialSpaceRent', ['list' => $list, 'array' => $array, 'list3' => $list3]);
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
        }
        else
        {
            $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Remarks' => $remarks, 'updated_at' => DB::raw('NOW()')]);
        }
      
        if($sql)
        {
            DB::table('commercial_spaces_tenants')->where('Tenant_ID', $id)->update(['Tenant_Status' => $status]);

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
}
