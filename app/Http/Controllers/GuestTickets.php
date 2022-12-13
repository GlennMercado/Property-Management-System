<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guestticket;
use RealRashid\SweetAlert\Facades\Alert;

class GuestTickets extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('guestloggedin');
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
    public function ticket(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'category' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'guest_image' => 'required'
        ]);

            $ticket= new guestticket;

            $ticket->name = $request->input('name');
            $ticket->email = $request->input('email');
            $ticket->category = $request->input('category');
            $ticket->subject = $request->input('subject');
            $ticket->description = $request->input('description');
        
            if($request->hasfile('ticketimages'))
            {
                $file = $request->file('ticketimages');
                $extention = $file->getClientOriginalExtension();
                $filename = $request->input('guest_id').'-.'.$extention;
                $path = $file->move('ticket_images/', $filename);
                $ticket->guest_image = $path;
            }

            if($ticket->save())
            {
                Alert::Success('Success', 'Ticket Successfully Submitted!');
                return redirect('GuestTicket')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Error', 'Ticket Failed to Submit, Please Try Again.');
                return redirect('GuestTicket')->with('Error', 'Data Not Saved');
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
