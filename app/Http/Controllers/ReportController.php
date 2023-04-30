<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PDF;
use Carbon\Carbon;
use App\Models\hotel_reservations;

class ReportController extends Controller
{
    public function report(Request $request){
        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse(request('end_date'))->format('Y-m-d');
        $sort = $request->input('sort');
        // $data = hotel_reservations::whereBetween('created_at', [$start_date, $end_date])->get();
        // $data;
        // if ($sort == "Pending"){
        //     $data = hotel_reservations::where('Payment_Status', 'Pending')->whereBetween('created_at', [$start_date, $end_date])->get();
        // }else{
        //     $data = hotel_reservations::where('Booking_Status', 'Checked-In')->whereBetween('created_at', [$start_date, $end_date])->get();
        // }
        $data;
        $title;
    switch ($sort) {
    case "Pending":
        $data = hotel_reservations::where('Payment_Status', 'Pending')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Pending Guest Report";
        break;
    case "Reserved":
        $data = hotel_reservations::where('Booking_Status', 'Reserved')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Reserved Guest Report";
        break;
    case "Checked-In":
        $data = hotel_reservations::where('Booking_Status', 'Checked-In')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Checked-In Guest Report";
        break;
    case "Finished":
        $data = hotel_reservations::where('Booking_Status', 'Finished')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Finished Guest Report";
        break;
    default:
        $data = hotel_reservations::whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "All Guest Report";
        break;
}

        $pdf = PDF::loadView('Admin.pages.Reservations.BookingReport', compact('data', 'title'))->setOption('font_path', '')->setOption('font_data', []);
        // return $pdf->download('report.pdf');
        return view('Admin.pages.Reservations.BookingReport', compact('data', 'title'));
    }
}
