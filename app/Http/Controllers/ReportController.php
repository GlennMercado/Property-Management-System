<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;
use App\Models\hotel_reservations;
use App\Models\convention_center_applications;

class ReportController extends Controller
{
    public function report(Request $request){
        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse(request('end_date'))->format('Y-m-d');
        $sort = $request->input('sort');
        $total = 0;
        $data;
        $title;
    switch ($sort) {
    case "Pending":
        if (empty($request->input('start_date')) || empty($request->input('end_date'))) {
            $total = 0;
        }else{
            $total = hotel_reservations::where('Payment_Status','Pending')->whereBetween('created_at', [$start_date, $end_date])->count();
        }
        $data = hotel_reservations::where('Payment_Status', 'Pending')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Pending Guest Report";
        break;
    case "Reserved":
        if (empty($request->input('start_date')) || empty($request->input('end_date'))) {
            $total = 0;
        }else{
            $total = hotel_reservations::where('Booking_Status','Reserved')->whereBetween('created_at', [$start_date, $end_date])->count();
        }
        $data = hotel_reservations::where('Booking_Status', 'Reserved')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Reserved Guest Report";
        break;
    case "Checked-In":
        if (empty($request->input('start_date')) || empty($request->input('end_date'))) {
            $total = 0;
        }else{
            $total = hotel_reservations::where('Booking_Status','Checked-In')->whereBetween('created_at', [$start_date, $end_date])->count();
        }
        $data = hotel_reservations::where('Booking_Status', 'Checked-In')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Checked-In Guest Report";
        break;
    case "Finished":
        if (empty($request->input('start_date')) || empty($request->input('end_date'))) {
            $total = 0;
        }else{
            $total = hotel_reservations::where(['Booking_Status' => 'Checked-Out', 'IsArchived' => 1])->whereBetween('created_at', [$start_date, $end_date])->count();
        }
        $data = hotel_reservations::where(['Booking_Status' => 'Checked-Out', 'IsArchived' => 1])->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Finished Guest Report";
        break;
    case "All":
        $total = hotel_reservations::count();
        $data = hotel_reservations::whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "All Guest Report";
        break;
    default:
        $total = hotel_reservations::count();
        $data = hotel_reservations::whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "All Guest Report";
        break;
        }

        $pdf = PDF::loadView('Admin.pages.Reservations.BookingReport', compact('data', 'title', 'start_date', 'end_date', 'total'))->setOption('font_path', '')->setOption('font_data', []);
        // return $pdf->download('report.pdf');
        return view('Admin.pages.Reservations.BookingReport', compact('data', 'title', 'start_date', 'end_date', 'total'));
    }

    public function hotel_reports(Request $request){
        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse(request('end_date'))->format('Y-m-d');
        $sort = $request->input('sort');
        $total = 0;
        $data;
        $title;
    switch ($sort) {
    case "Pending":
        if (empty($request->input('start_date')) || empty($request->input('end_date'))) {
            $total = 0;
        }else{
            $total = hotel_reservations::where('Payment_Status','Pending')->whereBetween('created_at', [$start_date, $end_date])->count();
        }
        $data = hotel_reservations::where('Payment_Status', 'Pending')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Pending Guest Report";
        break;
    case "Reserved":
        if (empty($request->input('start_date')) || empty($request->input('end_date'))) {
            $total = 0;
        }else{
            $total = hotel_reservations::where('Booking_Status','Reserved')->whereBetween('created_at', [$start_date, $end_date])->count();
        }
        $data = hotel_reservations::where('Booking_Status', 'Reserved')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Reserved Guest Report";
        break;
    case "Checked-In":
        if (empty($request->input('start_date')) || empty($request->input('end_date'))) {
            $total = 0;
        }else{
            $total = hotel_reservations::where('Booking_Status','Checked-In')->whereBetween('created_at', [$start_date, $end_date])->count();
        }
        $data = hotel_reservations::where('Booking_Status', 'Checked-In')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Checked-In Guest Report";
        break;
    case "Finished":
        if (empty($request->input('start_date')) || empty($request->input('end_date'))) {
            $total = 0;
        }else{
            $total = hotel_reservations::where('Booking_Status','Finished')->whereBetween('created_at', [$start_date, $end_date])->count();
        }
        $data = hotel_reservations::where('Booking_Status', 'Finished')->whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "Finished Guest Report";
        break;
    case "All":
        $total = hotel_reservations::count();
        $data = hotel_reservations::whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "All Guest Report";
        break;
    default:
        $total = hotel_reservations::count();
        $data = hotel_reservations::whereBetween('created_at', [$start_date, $end_date])->get();
        $title = "All Guest Report";
        break;
        }

        $pdf = PDF::loadView('Admin.pages.OperationManagement.OperationsBookingReport', compact('data', 'title', 'start_date', 'end_date', 'total'))->setOption('font_path', '')->setOption('font_data', []);
        // return $pdf->download('report.pdf');
        return view('Admin.pages.OperationManagement.OperationsBookingReport', compact('data', 'title', 'start_date', 'end_date', 'total'));
    }

    public function inquiry_reports(){
        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse(request('end_date'))->format('Y-m-d');
        $total = DB::table('convention_center_applications')->count();
        $data = DB::table('convention_center_applications')->get();

        $pdf = PDF::loadView('Admin.pages.Reservations.InquiryReport', compact('start_date', 'end_date', 'total', 'data'))->setOption('font_path', '')->setOption('font_data', []);
        return view('Admin.pages.Reservations.InquiryReport', compact('start_date', 'end_date', 'total', 'data'));
    }
    public function event_reports(){
        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse(request('end_date'))->format('Y-m-d');
        $total = DB::table('events')->count();
        $data = DB::table('events')->get();

        $pdf = PDF::loadView('Admin.pages.Reservations.EventReport', compact('start_date', 'end_date', 'total', 'data'))->setOption('font_path', '')->setOption('font_data', []);
        return view('Admin.pages.Reservations.EventReport', compact('start_date', 'end_date', 'total', 'data'));
    }
}
