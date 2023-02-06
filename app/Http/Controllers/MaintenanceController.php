<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function Out_of_Order_Rooms()
    {   
        return view('Admin.pages.Maintenance.OutofOrder');
    }
    public function Lost_or_Damage_Items()
    {   
        return view('Admin.pages.Maintenance.LostDamageItems');
    }
    public function Lost_or_Damage_Keys()
    {   
        return view('Admin.pages.Maintenance.LostDamageKeys');
    }
}
