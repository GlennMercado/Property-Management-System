<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotelstocks;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\hotel_room_supplies;
use App\Models\hotel_room_linen;
use App\Models\hotel_room_supplies_reports;
use App\Models\hotel_room_linens_reports;
use Carbon\Carbon;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StockHotel()
    {


       //Hotel Inventory
		
		$list = DB::select('SELECT * FROM hotelstocks');
		$check = DB::select('SELECT COUNT(*) as cnt FROM hotelstocks');
		$count = array();

        $list2 = DB::select('SELECT * FROM novadeci_suites');
        $check2 = DB::select('SELECT * FROM novadeci_suites');
		$count2 = array();

		foreach($check as $checks)
		{
			$count[] = ['counts' => $checks->cnt];
		}

        foreach($check2 as $checks2)
		{
			$count2[] = ['Room_No' => $checks2->Room_No];
		}
		

		return view('Admin.pages.Inventory.StockCount', ['list'=>$list, 'count' => $count, 'count2'=>$count2]);
	
    
    }

    public function StockReport()
    {
       //Hotel Reports

        $datenow = Carbon::now();

        $list2 = hotel_room_supplies_reports::select("*")->whereDate('Date_Received', '=', $datenow)->get();

        $list = hotel_room_linens_reports::select("*")->whereDate('Date_Received', '=', $datenow)->get();

        return view('Admin.pages.Inventory.StockReports', ['list'=>$list, 'list2'=>$list2]);
	
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_stock_room(Request $request)
    {
        $roomno = $request->input('roomno');
        $prodid = $request->input('id');
        $category = $request->input('category');
        $sql = DB::select("SELECT * FROM hotelstocks WHERE productid = '$prodid'");
        $sql2 = DB::select("SELECT * FROM hotel_room_supplies WHERE Room_No = '$roomno' AND productid = '$prodid'");
        $sql3 = DB::select("SELECT * FROM hotel_room_linens WHERE Room_No = '$roomno' AND productid = '$prodid'");
        $quantity;

        if($category == "Linen")
        {
            if($sql3)
            {
                Alert::Error('Error', 'Item already exist!');
                return redirect('StockCount')->with('Success', 'Data Updated');
            }
            else
            {
                foreach($sql as $lists)
                {
                    if($lists->total < $request->input('quantity'))
                    {
                        Alert::Error('Error', 'Quantity Requested is Higher than Inventory Stock!');
                        return redirect('StockCount')->with('Success', 'Data Updated');
                    }
                    else
                    {
                        $quantity = $lists->total - $request->input('quantity');
                    }
                }
    
                $datenow = Carbon::now();
                Carbon::createFromFormat('Y-m-d H:i:s', $datenow);
    
                $supply = new hotel_room_linen;
    
                $supply->Room_No = $roomno;
                $supply->productid = $prodid;
                $supply->name = $request->input('name');
                $supply->Category = $category;
                $supply->Quantity = $request->input('quantity');
                $supply->Date_Received = $datenow;
    
                if($supply->save())
                {
                    DB::table('hotelstocks')->where('productid', $prodid)->update(['total' => $quantity]);
                    //history
                    // DB::insert('insert into housekeepings (Room_No, Booking_No, Facility_Type, Facility_Status, Front_Desk_Status) 
                    // values (?, ?, ?, ?, ?)', [$roomno, $randID, $facility, $status, $fstats]);
    
                    Alert::Success('Success', 'Stock Successfully Added to Room!');
                    return redirect('StockCount')->with('Success', 'Data Updated');
                }
                else
                {
                    Alert::Error('Error', 'Stock Failed Adding to Room!');
                    return redirect('StockCount')->with('Success', 'Data Updated');
                }
            }
        }
        elseif($category == "Guest Supply")
        {
            if($sql2)
            {
                Alert::Error('Error', 'Item already exist!');
                return redirect('StockCount')->with('Success', 'Data Updated');
            }
            else
            {
                foreach($sql as $lists)
                {
                    if($lists->total < $request->input('quantity'))
                    {
                        Alert::Error('Error', 'Quantity Requested is Higher than Inventory Stock!');
                        return redirect('StockCount')->with('Success', 'Data Updated');
                    }
                    else
                    {
                        $quantity = $lists->total - $request->input('quantity');
                    }
                }
    
                $datenow = Carbon::now();
                Carbon::createFromFormat('Y-m-d H:i:s', $datenow);
    
                $supply = new hotel_room_supplies;
    
                $supply->Room_No = $roomno;
                $supply->productid = $prodid;
                $supply->name = $request->input('name');
                $supply->Category = $category;
                $supply->Quantity = $request->input('quantity');
                $supply->Date_Received = $datenow;
    
                if($supply->save())
                {
                    DB::table('hotelstocks')->where('productid', $prodid)->update(['total' => $quantity]);
    
                    Alert::Success('Success', 'Stock Successfully Added to Room!');
                    return redirect('StockCount')->with('Success', 'Data Updated');
                }
                else
                {
                    Alert::Error('Error', 'Stock Failed Adding to Room!');
                    return redirect('StockCount')->with('Success', 'Data Updated');
                }
            }
        }
        
    }
    public function received_supply(Request $request)
    {
        //
        $roomno = $request->input('roomno');
        $prodid = $request->input('id');
        $category = $request->input('category');
        $sql = DB::select("SELECT * FROM hotelstocks WHERE productid = '$prodid'");
        $sql2 = DB::select("SELECT * FROM hotel_room_supplies WHERE Room_No = '$roomno' AND productid = '$prodid'");
        $sql3 = DB::select("SELECT * FROM hotel_room_linens WHERE Room_No = '$roomno' AND productid = '$prodid'");
        $quantity;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addstock(Request $request)
    {
        $this->validate($request,[
            'productid' => 'required',
            'category' => 'required',
            'Linens' => 'required',
            'GuestSupplies' => 'required',
            'Amenities' => 'required',
            'description' => 'required',
            'allstock' => 'required',
            'quantity' => 'required',
            'stock' => 'required'
       ]);

       $stock = new hotelstocks;

       $stock->productid = $request->input('productid');

       $category = $request->input('category');
       $name;

       if($category == 'Linen')
        {
            $name = $request->input('Linens');
        }
        elseif($category == 'Guest Supply')
        {
            $name = $request->input('GuestSupplies');
        }
        elseif($category == 'Amenities')
        {
            $name = $request->input('Amenities');
        }


       $stock->description = $request->input('description');
       $stock->allstock = $request->input('allstock');
       $stock->total = $request->input('quantity');
       $stock->Stock_Level = $request->input('stock');
       $stock->category = $request->input('category');
       $stock->name = $name;

       
       if($stock->save())
        {
            Alert::Success('Success', 'Stock Successfully Submitted!');
            return redirect('StockCount')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Error', 'Stock Submission Failed!, Please Try again.');
            return redirect('StockCount')->with('Error', 'Failed!');
        }
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
    public function edit_stock(Request $request)
    {
        try
        {
            $this->validate($request,[
                'productid' => 'required',
                'name' => 'required',
                'description' => 'required',
                'quantity' => 'required',
                'in' => 'required',
                'out' => 'required',
                'category' => 'required'
            ]);
            
            $productid = $request->input('productid');
            $name = $request->input('name');
            $description = $request->input('description');
            $total = $request->input('quantity');
            $in = $request->input('hotelin');
            $out = $request->input('hotelout');
            $category = $request->input('category');

            if($in > 0)
            {
                $total = $total + $in;

            }

            if($out > 0)
            {
                $total = $total - $out;
            }
           
           
           DB::table('hotelstocks')->where('productid', $productid)->update(array
            (
                'productid' => $productid,
                'name' => $name,
                'description' => $description,
                'total' => $total,
                'category' => $category
            ));

    
           Alert::Success('Success', 'Stock Successfully Updated!');
           return redirect('StockCount')->with('Success', 'Data Updated');

          
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Stock Edit Failed!');
            return redirect('StockCount')->with('Failed', 'Data not Updated');
        }
    }

    public function addrequest(Request $request)
    {
        $this->validate($request,[
            'productid' => 'required',
            'category' => 'required',
            'Linens' => 'required',
            'GuestSupplies' => 'required',
            'Amenities' => 'required',
            'description' => 'required',
            'allstock' => 'required',
            'quantity' => 'required',
            'stock' => 'required'
       ]);

       $stock = new hotelstocks;

       $stock->productid = $request->input('productid');
       $linens = $request->input('Linens');
       $guest = $request->input('GuestSupplies');
       $amenities = $request->input('Amenities');

       if($linens = 'Linens')
        {
            $stock->name = $request->input('Linens');
        }
        elseif($guest = 'GuestSupplies')
        {
            $stock->name = $request->input('GuestSupplies');
        }
        elseif($amenities =  'Amenities')
        {
            $stock->name = $request->input('Amenities');
        }

       $stock->description = $request->input('description');
       $stock->allstock = $request->input('allstock');
       $stock->total = $request->input('quantity');
       $stock->Stock_Level = $request->input('stock');
       $stock->category = $request->input('category');

       
       if($stock->save())
        {
            Alert::Success('Success', 'Stock Successfully Submitted!');
            return redirect('StockCount')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Error', 'Stock Submission Failed!, Please Try again.');
            return redirect('StockCount')->with('Error', 'Failed!');
        }
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
