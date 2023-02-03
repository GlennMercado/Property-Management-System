<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stocksfunctions;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class OperationManagerCOntroller extends Controller
{
    public function Reservation()
    {
        return view('Reservation');
    }
    public function RoomAvailable()
    {
        return view('RoomAvailable');
    }
    public function Request()
    {
        return view('Request');
    }
    public function Complaints()
    {
        return view('Complaints');
    }
    public function Inventory()
    {
        return view('Inventory');
    }
    public function GuestFolio()
    {
        return view('GuestFolio');
    }
}