<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stocksfunctions;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\guest_request;
use Carbon\Carbon;

class OperationManagerCOntroller extends Controller
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
        return view('OperationRooms');
    }
    public function Reports()
    {
        return view('Reports');
    }
    public function GuestFolio()
    {
        return view('GuestFolio');
    }
}