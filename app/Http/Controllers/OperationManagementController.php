<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stocksfunctions;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class OperationManagerCOntroller extends Controller
{
    public function index
    {
        return view('OperationManagement');
    }
}