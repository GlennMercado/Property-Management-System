<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commercial_spaces_application;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class CommercialSpacesController extends Controller
{
    public function commercial_spaces()
    {
        $list = DB::select('SELECT * FROM commercial_spaces_applications WHERE IsArchived = 0');   
        $list2 = DB::select('SELECT * FROM commercial_spaces_applications WHERE IsArchived = 1');    
        return view('Admin.pages.CommercialSpaces.CommercialSpaceForm', ['list'=>$list, 'list2' => $list2]);
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
        elseif($status == "Disapproved")
        {
            if($remarks != null)
            {
                $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Status' => $status, 'Remarks' => $remarks]);
            }
            else
            {
                $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Status' => $status]);
            }
            
            $sql2 = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Status' => $status, 'IsArchived' => 1]);

            if($sql2)
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
    }
}
