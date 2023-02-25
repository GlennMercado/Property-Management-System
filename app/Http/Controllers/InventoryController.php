<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotelstocks;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $sum = hotelstocks::where('total' < 'Stock_Level')->count();
       return view('StockAvailability', compact('sum'));
    
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
            return redirect('StockAvailability')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Error', 'Stock Submission Failed!, Please Try again.');
            return redirect('StockAvailability')->with('Error', 'Failed!');
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
           return redirect('StockAvailability')->with('Success', 'Data Updated');

          
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Stock Edit Failed!');
            return redirect('StockAvailability')->with('Failed', 'Data not Updated');
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
            return redirect('StockAvailability')->with('Success', 'Data Saved');
        }
        else
        {
            Alert::Error('Error', 'Stock Submission Failed!, Please Try again.');
            return redirect('StockAvailability')->with('Error', 'Failed!');
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
