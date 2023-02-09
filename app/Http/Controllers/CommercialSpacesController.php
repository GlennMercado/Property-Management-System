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
}
