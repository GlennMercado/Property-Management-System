<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\hotel_room_supplies;
use App\Models\hotel_room_linen;
use App\Models\hotel_room_linens_reports;
use Carbon\Carbon;

class InventoryHotelLinenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function LinenRequest()
    {
        $list = DB::select("SELECT * FROM hotel_room_linens WHERE Status = 'Requested'");

		return view('Admin.pages.Inventory.StockHotelLinen', ['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function linen_request_approval(Request $request)
    {

        $id = $request->input('id');
        $roomno = $request->input('roomno');
        $productid = $request->input('productid');
        $attendant = $request->input('attendant');
        $category = $request->input('category');
        $productname = $request->input('name');
        $quantity_requested = $request->input('Quantity_Requested');
        $quantity_given = $request->input('quantity');
        $status = $request->input('status');
        $qty_owned = $request->input('qty_owned');
        $date_requested = $request->input('date_requested');
        $discrepancy = $request->input('discrepancy');

        $datenow = Carbon::now();

        $total_quantity;
        $update = null; // Initialize the $update variable

        if($status == "Approved")
        {
            $total_quantity = $qty_owned + $quantity_given;

            $sql = DB::select("SELECT * FROM hotelstocks WHERE productid = '$id'");

            foreach($sql as $lists)
            {
                if($lists->total < $quantity_given)
                {
                    Alert::Error('Failed', 'Linen Request Failed!');
                    return redirect('StockHotelLinen')->with('Success', 'Data Updated');
                }
                else
                {
                    $update = DB::table('hotel_room_linens')->where('id', $id)->update(array(
                        'Quantity_Requested' => 0,
                        'Attendant' => "Unassigned",
                        'Status' => $status,
                        'Date_Received' => $datenow,
                        'Quantity' => $total_quantity,
                        'updated_at' => DB::RAW('NOW()')
                    ));
                }
            }        
        }
        else
        {
            $total_quantity = $qty_owned;

            $update = DB::table('hotel_room_linens')->where('id', $id)->update(array(
                'Quantity_Requested' => 0,
                'Attendant' => "Unassigned",
                'Status' => $status,
                'Date_Received' => $datenow,
                'updated_at' => DB::RAW('NOW()')
            ));
        }
  
  
        if($update)
        {
          $add = new hotel_room_linens_reports;
  
          $add->Room_No = $roomno;
          $add->productid = $productid;
          $add->name = $productname;
          $add->Category = $category;
          $add->Quantity = $total_quantity;
          $add->Quantity_Requested = $quantity_requested;
          $add->Attendant = $attendant;
          $add->Status = $status;
          $add->Date_Requested = $date_requested;
          $add->Date_Received = $datenow;
          $add->Discrepancy = $discrepancy;
  
          $add->save();

          DB::table('list_of_housekeepers')->where('Housekeepers_Name', $attendant)->update(['Status' => "Available"]);
          DB::table('hotel_room_linens')->where('id', $id)->update(['Attendant' => "Unassigned"]);          

          Alert::Success('Success', 'Linen Request Successfully Updated!');
          return redirect('StockHotelLinen')->with('Success', 'Data Updated');
        }
        else
        {
          Alert::Error('Failed', 'Linen Request Failed!');
          return redirect('StockHotelLinen')->with('Success', 'Data Updated');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
