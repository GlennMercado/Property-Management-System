<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\purchasereports;
use App\Models\hotelstocks;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\hotel_room_supplies;
use App\Models\hotel_room_linen;
use App\Models\hotel_room_supplies_reports;
use Carbon\Carbon;
use PDF;

class InventoryHotelSupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SupplyRequest()
    {
			$list = DB::select("SELECT * FROM hotel_room_supplies WHERE Status= 'Requested' ");

            return view('Admin.pages.Inventory.StockHotelSupply', ['list'=>$list]);
    }

    public function supply_request_approval(Request $request)
    {
        //$sql = DB::select("SELECT * FROM hotelstocks WHERE productid = '$prodid'");
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

      $datenow = Carbon::now();

      $total_quantity;

      $update = null;

      if($status == "Approved")
      {
        $total_quantity = $qty_owned + $quantity_given;

        $sql = DB::select("SELECT * FROM hotelstocks WHERE productid = '$productid'");

        foreach($sql as $lists)
        {
            if($lists->total < $quantity_given)
            {
                Alert::Error('Failed', 'Supply Request Failed!');
                return redirect('StockHotelSupply')->with('Success', 'Data Updated');
            }
            else
            {
                $update = DB::table('hotel_room_supplies')->where('id', $id)->update(array(
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

        $update = DB::table('hotel_room_supplies')->where('id', $id)->update(array(
                'Quantity_Requested' => 0,
                'Attendant' => "Unassigned",
                'Status' => $status,
                'Date_Received' => $datenow,
                'updated_at' => DB::RAW('NOW()')
            ));
      }

      if($update)
      {
        $add = new hotel_room_supplies_reports;

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

        $add->save();

        DB::table('list_of_housekeepers')->where('Housekeepers_Name', $attendant)->update(['Status' => "Available", 'updated_at' => DB::RAW('NOW()')]);
        DB::table('hotel_room_supplies')->where('id', $id)->update(['Attendant' => "Unassigned", 'updated_at' => DB::RAW('NOW()')]);
                    
        Alert::Success('Success', 'Supply Request Successfully Updated!');
        return redirect('StockHotelSupply')->with('Success', 'Data Updated');
      }
      else
      {
        Alert::Error('Failed', 'Supply Request Failed!');
        return redirect('StockHotelSupply')->with('Success', 'Data Updated');
      }
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

    public function guest_supply_report()
    {
        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse(request('end_date'))->format('Y-m-d');
        $data;
        $title;

        $total = hotel_room_supplies_reports::count();
        $data = hotel_room_supplies_reports::whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Guest Supply Report(s)";

        $pdf = PDF::loadView('Admin.pages.Inventory.GuestSupplyReport', compact('data', 'title', 'total'))->setOption('font_path', '')->setOption('font_data', []);
        // return $pdf->download('report.pdf');
        return view('Admin.pages.Inventory.GuestSupplyReport', compact('data', 'title', 'total'));
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


