<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\purchasereports;
use App\Models\reports;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PurchaseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('StockPurchaseReport');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {

    
    }
            
    

    public function add(Request $request)
    {
        
           $category = $request->category;
           $pax = $request->room_pax;
           $unit = $request->unit;
           $quantity = $request->quantity;
           $receiver = $request->receiver;
           $supervisor = $request->supervisor;


           for($i=1;$i<count($pax);$i++){
            $datasave=[
                'category' => $category[$i],
            'pax' => $pax[$i],
            'unit' => $unit[$i],
            'quantity' => $quantity[$i],
            'receiver' => $receiver[$i],
            'supervisor' => $supervisor[$i],
            ];

            DB::table('purchasereports')->insert($datasave);
        }
            return redirect()->back();
           
    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


