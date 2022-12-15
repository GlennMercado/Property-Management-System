<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\novadeci_suites;
use Illuminate\Support\Facades\DB;
use App\Models\housekeeping;
use App\Models\archived_hotel_reservation;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function add_rooms(Request $request)
    {
       
        $this->validate($request,[
            'room_no' => 'required',
            'room_size' => 'required',
            'no_of_beds' => 'required',
            'extra_bed' => 'required',
            'no_of_pax' => 'required',
            'rate_per_night' => 'required',
            'membership' => 'required'
        ]);

        $roomno = $request->input('room_no');
        $checkExist = DB::select("SELECT * FROM novadeci_suites WHERE Room_No = '$roomno' ");

        if($checkExist)
        {
            Alert::Error('Error', 'Room Already Exist');
            return redirect('RoomManagement')->with('Error', 'Data Not Saved');
        }
        else
        {
            $add_rooms= new novadeci_suites;
            $hs = new housekeeping;

            $add_rooms->Room_No = $request->input('room_no');
            $add_rooms->Room_Size = $request->input('room_size');
            $add_rooms->No_of_Beds = $request->input('no_of_beds');
            $add_rooms->Extra_Bed = $request->input('extra_bed');
            $add_rooms->No_Pax_Per_Room = $request->input('no_of_pax');
            $add_rooms->Rate_per_Night = $request->input('rate_per_night');
            $add_rooms->Membership = $request->input('membership');

            $hs->Room_No = $request->input('room_no');
        
            if($request->hasfile('images'))
            {
                //add image to a folder
                $file = $request->file('images');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'--Room '.$request->input('room_no').'-.'.$extention;
                $path = $file->move('hotel_images/', $filename);

                
                //add image to database (which is not advisable)
                //$path2 = $request->file('images')->getRealPath();
                //$logo = file_get_contents($path2);
                $base64 = base64_encode($extention);



                $add_rooms->Hotel_Image = $path;
                $add_rooms->DB_Image = $base64;



            }

            if($add_rooms->save() && $hs->save())
            {
                Alert::Success('Success', 'Room Successfully Created!');
                return redirect('RoomManagement')->with('Success', 'Data Saved');
            }
            else
            {
                Alert::Error('Error', 'Room Creation Failed');
                return redirect('RoomManagement')->with('Error', 'Data Not Saved');
            }

        }
                
    }

    public function edit_rooms(Request $request)
    {
        try{
            $this->validate($request,[
                'room_no' => 'required',
                'room_size' => 'required',
                'no_of_beds' => 'required',
                'extra_bed' => 'required',
                'no_of_pax' => 'required',
                'rate_per_night' => 'required',
                'membership' => 'required'
            ]);

            $room_no = $request->input('room_no');
            $room_size = $request->input('room_size');
            $numbed = $request->input('no_of_beds');
            $extra = $request->input('extra_bed');
            $pax = $request->input('no_of_pax');
            $rate = $request->input('rate_per_night');
            $member = $request->input('membership');


            DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array
            (
                'Room_Size' => $room_size,
                'No_of_Beds' => $numbed,
                'Extra_Bed' => $extra,
                'No_Pax_Per_Room' => $pax,
                'Rate_per_Night' => $rate,
                'Membership' => $member
            ));

            
            Alert::Success('Success', 'Room Edited Successfully!');
            return redirect('RoomManagement')->with('Success', 'Data Updated');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Room Edit Failed!');
            return redirect('RoomManagement')->with('Failed', 'Data not Updateds');
        }


    }
    
    public function update_rooms(Request $request)
    {
        try{
            $this->validate($request,[
                'room_no' => 'required',
                'stats' => '',
                'hstats' => '',
                'reserved_no' => ''
            ]);

            $room_no = $request->input('room_no');
            $status = $request->input('stats');
            $hstatus = $request->input('hstats');
            $stats = "Available";
            $reserved_no = $request->input('reserved_no');

            //dd($reserved_no);
            if($status != null)
            {
                if($reserved_no != null)
                {
                    if($status == "Checked-Out")
                    {
                        // $select = DB::table('hotel_reservations')->get();     
                        // $lists = new archived_hotel_reservation;
                        //  foreach($select as $list)
                        //  {  
                        //     $lists->Reservation_No = $list->Reservation_No;
                        //     $lists->Guest_Name = $list->Guest_Name;
                        //     $lists->Mobile_Num = $list->Mobile_Num;
                        //     $lists->Email = $list->Email;
                        //     $lists->Room_No = $list->Room_No;
                        //     $lists->No_of_Pax = $list->No_of_Pax;
                        //     $lists->Email = $list->Email;
                        //     $lists->Booking_Status = $status;
                        // }   
                        DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array
                        (
                            'Status' => $status
                        ));
                        $select = ['Room_No' => $room_no, 'Reservation_No' => $reserved_no];
                        DB::table('hotel_reservations')->where($select)->update(array
                        (
                            'Booking_Status' => $status,
                            'Isvalid' => False
                        ));  
                       
                    }
                    else
                    {
                        DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array
                        (
                            'Status' => $status
                        ));
                        $select = ['Room_No' => $room_no, 'Reservation_No' => $reserved_no];
                        DB::table('hotel_reservations')->where($select)->update(array
                        (
                            'Booking_Status' => $status
                        ));
                    }                 
                }            
            }

            if($hstatus != null)
            {
                if($hstatus == "Cleaned")
                { 
                    DB::table('housekeepings')->where('Room_No', $room_no)->update(array
                    (
                        'Housekeeping_Status' => $hstatus
                    ));
                    DB::table('novadeci_suites')->where('Room_No', $room_no)->update(array
                    (
                        'Status' => $stats
                    ));
                }
                else
                {
                    DB::table('housekeepings')->where('Room_No', $room_no)->update(array
                    (
                        'Housekeeping_Status' => $hstatus
                    ));
                }
            }
         
            Alert::Success('Success', 'Room Updated Successfully!');
            return redirect('RoomManagement')->with('Success', 'Data Updated');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Alert::Error('Failed', 'Room Edit Failed!');
            return redirect('RoomManagement')->with('Failed', 'Data not Updated');
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
