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
        $list = DB::select('SELECT * FROM commercial_spaces_applications');    
        return view('Admin.pages.CommercialSpaces.CommercialSpaceForm', ['list'=>$list]);
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

        $sql = DB::table('commercial_spaces_applications')->where('id', $id)->update(['Status' => $status]);

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
}
