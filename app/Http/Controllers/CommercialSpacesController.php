<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commercial_spaces_application;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\commercial_spaces_tenants;
use Carbon\Carbon;

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
        $list = DB::select('SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0');
        $list2 = DB::select("SELECT * FROM commercial_spaces_applications a INNER JOIN commercial_spaces_tenants b ON a.id = b.Tenant_ID WHERE a.IsArchived = 0 AND b.End_Date = '$now'");
        return view('Admin.pages.CommercialSpaces.CommercialSpaceTenants', ['list' => $list, 'list2' => $list2]);
    }

    public function commercial_rent_collections()
    {
        return view('Admin.pages.CommercialSpaces.CommercialSpaceRent');
    }
    
    public function update_tenant_status(Request $request)
    {
        dd($request->all());

    }
}
