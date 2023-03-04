@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.css"/>
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.js"></script>


<select name="select" class="form-control" id="date">
    <option value="All">All Records</option>
    <option value="Daily">Daily</option>
    <option value="Weekly">Weekly</option>
    <option value="Monthly">Monthly</option>
</select>
 <table id="myTable">
    <thead>
        <tr>
            <th>Room No</th>
            <th>Item Name</th>
            <th>Status</th>
            <th>Date Requested</th>
            <th>Date Received</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
 </table>

<script type="text/javascript">
$.noConflict();
jQuery(function($) {

    var table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{route('test_reports.reports')}}",
            data:function (d){
                d.type = "Housekeeping",
                d.date = $('#date').val()
            }
        },
        columns: [
            {date: 'Booking_Number', name: 'Booking_Number'},
            {data: 'Room_No', name: 'Room_No'},
            {data: 'Facility_Type', name: 'Facility_Type'},
            {data: 'Housekeeping_Status', name: 'Housekeeping_Status'},
            {data: 'Attendant', name: 'Attendant'},
            {data: 'Guest_Name', name: 'Guest_Name'},
            {data: 'Check_In_Date', name: 'Check_In_Date'},
            {data: 'Check_Out_Date', name: 'Check_Out_Date'},

            ]
    });
    $('#date').change(function(){
        table.draw();
    });
});
</script>
 @endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush