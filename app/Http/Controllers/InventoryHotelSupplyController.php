<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\purchasereports;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\hotel_room_supplies;
use App\Models\hotel_room_linen;

class InventoryHotelSupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SupplyRequest()
    {
			$list = DB::select('SELECT * FROM hotel_room_supplies');

            return view('Admin.pages.Inventory.StockHotelSupply', ['list'=>$list]);
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
    public function supply_approval(Request $request)
    {
            $roomno = $request->input('roomno');
            $prodid = $request->input('productid');
            $name = $request->input('name');
            $quantity = $request->input('quantity');
            $sql = DB::select("SELECT * FROM hotelstocks WHERE productid = '$prodid'");
            $s = DB::select("SELECT * FROM hotel_room_supplies WHERE Room_No = '$roomno' AND productid = '$prodid'");
            $quantity;
        
                    $datenow = Carbon::now();
                    Carbon::createFromFormat('Y-m-d H:i:s', $datenow);
        
                    $supply = new hotel_room_supplies;
        
                    $supply->Room_No = $roomno;
                    $supply->productid = $prodid;
                    $supply->name = $request->input('name');
                    $supply->Quantity = $request->input('quantity');
                    $supply->Date_Received = $datenow;
                    $stat = $request->input('status');
                    $supply->Status = $stat;

    
                    if($stat == 'Approved')
                    {
                        DB::table('hotel_room_supplies')->where('productid', $prodid)->update(array
                            (
                                'Quantity' => $quantity,
                                'Status' => $stat
                            ));
                        Alert::Success('Success', 'Stock Approved!');
                        return redirect('StockHotelSupply')->with('Success', 'Data Updated');
                    }
                    elseif($stat == 'Denied')
                    {
                        Alert::Error('Error', 'Stock Denied to Approve!');
                        return redirect('StockHotelSupply')->with('Success', 'Data Updated');
                    }else{
                        Alert::Error('Error', 'Stock Failed Updating!');
                        return redirect('StockHotelSupply')->with('Success', 'Data Updated');
                    }
    
    }
            
    

    public function add(Request $request)
    {
        
           $category = $request->category;
           $pax = $request->room_pax;
           $unit = $request->unit;
           $quantity = $request->quantity;
           $receiver = $request->receiver;
           $supervisor = $request->supervisor;

           for($i=0;$i<count($unit);$i++){
            $datasave=[
                'category' => $category[$i],
            'pax' => $pax[$i],
            'unit' => $unit[$i],
            'quantity' => $quantity[$i],
            'receiver' => $receiver[$i],
            'supervisor' => $supervisor[$i]
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


