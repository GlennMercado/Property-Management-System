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
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'stock' => 'required',
            'category' => 'required'
       ]);

       $stock = new hotelstocks;

       $stock->name = $request->input('name');
       $stock->description = $request->input('description');
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
            $in = $request->input('in');
            $out = $request->input('out');
            $category = $request->input('category');

            if($in > 0)
            {
                $total = $total + $in;
            }

            if($out > 0)
            {
                $total = $total - $out;
            }
           
            // $sum = ($total = $request->input('quantity') + $in = $request->input('in'));
            //$sub = ($total = $request->input('quantity') - $out = $request->input('out'));
           
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
