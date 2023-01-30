<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\purchasereports;
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
        
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'stock' => 'required',
            'suppliername' => 'required'
           ]);
    
           $stocks = new purchasereports;

           $stocks->name = $request->input('name');
           $stocks->description = $request->input('description');
           $stocks->suppliername = $request->input('suppliername');
           $stocks->quantity = $request->input('quantity');
           $stocks->Stock_Level = $request->input('stock');
           $stocks->unit = $request->input('unit');
    
           if($stock->save())
            {
                Alert::Success('Success', 'Stock Successfully Added!');
            return redirect('StockPurchaseReport')->with('Success', 'Data Saved');
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
    public function edit_report(Request $request)
    {
        //
        try {
            $this->validate($request,[
                'productid' => 'required',
                'name' => 'required',
                'description' => 'required',
                'unit' => 'required',
                'quantity' => 'required',
                'suppliername' => 'required'
            ]);
        
            $productid = $request->input('productid');
            $name = $request->input('name');
           $description = $request->input('description');
           $suppliername = $request->input('suppliername');
           $quantity = $request->input('quantity');
           $unit = $request->input('unit');
    
           DB::table('purchasereports')->where('productid', $productid)->update(array
            (
                'productid' => $productid,
                'name' => $name,
                'description' => $description,
                'unit' => $unit,
                'quantity' => $quantity,
                'suppliername' => $suppliername
            ));
    
           Alert::Success('Success', 'Report Successfully Updated!');
           return redirect('StockPurchaseReport')->with('Success', 'Data Saved');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Stock Edit Failed!, Please try again.');
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
