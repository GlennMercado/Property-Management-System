@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.css"/>
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.js"></script>


    <div class="container-fluid mt--7">
        <br>

        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0 title">Reports</h3>
                            </div>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <div class="col text-right">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                            data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Housekeeping</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"> Supply Request </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                            href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                            aria-selected="false"> Maintenance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab"
                                            href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4"
                                            aria-selected="false"> Linen Request</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                {{-- Arrival / Departure --}}
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    <select class="form-control" style="width:20%;" id="date">
                                        <option value="All">All Records</option>
                                        <option value="Daily">Daily</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                    </select>
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Room Number</th>
                                                <th scope="col" style="font-size:18px;">Booking Number</th>
                                                <th scope="col" style="font-size:18px;">Housekeeping Status</th>
                                                <th scope="col" style="font-size:18px;">Attendant</th>
                                                <th scope="col" style="font-size:18px;">Guest Name</th>
                                                <th scope="col" style="font-size:18px;">Check-In Date</th>
                                                <th scope="col" style="font-size:18px;">Check-Out Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Supply Request --}}
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <select class="form-control" style="width:20%;" id="date2">
                                        <option value="All">All Records</option>
                                        <option value="Daily">Daily</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                    </select>
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Room Number</th>
                                                <th scope="col" style="font-size:18px;">Item Name</th>
                                                <th scope="col" style="font-size:18px;">Quantity</th>
                                                <th scope="col" style="font-size:18px;">Quantity Requested</th>
                                                <th scope="col" style="font-size:18px;">Attendant</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;">Date Requested</th>
                                                <th scope="col" style="font-size:18px;">Date Received</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Maintenance --}}
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-3-tab">
                                    <select class="form-control" style="width:20%;" id="date3">
                                        <option value="All">All Records</option>
                                        <option value="Daily">Daily</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                    </select>
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable3">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Booking Number</th>
                                                <th scope="col" style="font-size:18px;">Room Number</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Description</th>
                                                <th scope="col" style="font-size:18px;">Discovered By</th>
                                                <th scope="col" style="font-size:18px;">Priority Level</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;">Due Date</th>
                                                <th scope="col" style="font-size:18px;">Date Resolved</th>
                                            </tr>
                                        </thead>
                                        <tbody>    
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Linen Request --}}
                                <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-4-tab">
                                    <select class="form-control" style="width:20%;" id="date4">
                                        <option value="All">All Records</option>
                                        <option value="Daily">Daily</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                    </select>
                                    <table class="table align-items-center table-flush" id="myTable4">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Room Number</th>
                                                <th scope="col" style="font-size:18px;">Item Name</th>
                                                <th scope="col" style="font-size:18px;">Quantity</th>
                                                <th scope="col" style="font-size:18px;">Quantity Requested</th>
                                                <th scope="col" style="font-size:18px;">Discrepancy</th>
                                                <th scope="col" style="font-size:18px;">Attendant</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;">Date Requested</th>
                                                <th scope="col" style="font-size:18px;">Date Received</th>
                                            </tr>
                                        </thead>
                                        <tbody>          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>




        <style>
            .title {
                text-transform: uppercase;
                font-size: 25px;
                letter-spacing: 2px;
            }

            .category {
                font-size: 22px;
                color: #5BDF4A;
            }

            .category2 {
                font-size: 22px;
                color: #E46000;
            }

            .tab {
                font-size: 100px;
            }
        </style>

<script type="text/javascript">
$.noConflict();

jQuery(function($) {

    var table = $('#myTable').DataTable({
        dom: 'lBfrtip',
        orderCellsTop: true,
        fixedHeader: true,
        lengthChange: false,
        processing: true,
        serverSide: true,
        buttons: [ 
                'pageLength',
                {
                    extend: 'pdfHtml5',
                    orientation: 'portrait',
                    pageSize: 'LEGAL'
                },
                'excel', 'colvis', 'print' 
            ],
        ajax: {
            url: "{{route('Housekeeping_Reports.reports')}}",
            data:function (d){
                d.num = 1,
                d.date = $('#date').val()
            }
        },
        columns: [
            {data: 'Room_No'},
            {data: 'Booking_No'},
            {data: 'Housekeeping_Status'},
            {data: 'Attendant'},
            {data: 'Guest_Name'},
            {data: 'Check_In_Date', 
                render: function(data){
                    var date = new Date(data);
                    var month = [ "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December" ];

                    return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
                }
            },
            {data: 'Check_Out_Date',
                render: function(data){
                    var date = new Date(data);
                    var month = [ "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December" ];

                    return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
                }
            },
            ]
    });

    table.buttons().container().insertBefore('#myTable_filter');

    $('#date').change(function(){
         table.draw();
    });


    var table2 = $('#myTable2').DataTable({
        dom: 'lBfrtip',
        orderCellsTop: true,
        fixedHeader: true,
        lengthChange: false,
        processing: true,
        serverSide: true,
        buttons: [ 
                'pageLength',
                {
                    extend: 'pdfHtml5',
                    orientation: 'portrait',
                    pageSize: 'LEGAL'
                },
                'excel', 'colvis', 'print' 
            ],
        ajax: {
            url: "{{route('Housekeeping_Reports.reports')}}",
            data:function (d){
                d.num = 2,
                d.date2 = $('#date2').val()
            }
        },
        columns: [
            {data: 'Room_No'},
            {data: 'name'},
            {data: 'Quantity'},
            {data: 'Quantity_Requested'},
            {data: 'Attendant'},
            {data: 'Status'},
            {data: 'Date_Requested',
                render: function(data){
                    var date = new Date(data);
                    var month = [ "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December" ];
                    var hours = date.getHours();
                    var minutes = date.getMinutes();
                    var seconds = date.getSeconds();
                    var ampm = hours >= 12 ? 'pm' : 'am';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0'+minutes : minutes;
                    var strTime = hours + ':' + minutes + ':' + seconds +' ' + ampm;

                    return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear() + "<br>" + strTime;
                }
            },
            {data: 'Date_Received',
                render: function(data){
                    var date = new Date(data);
                    var month = [ "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December" ];
                    var hours = date.getHours();
                    var minutes = date.getMinutes();
                    var seconds = date.getSeconds();
                    var ampm = hours >= 12 ? 'pm' : 'am';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0'+minutes : minutes;
                    var strTime = hours + ':' + minutes + ':' + seconds +' ' + ampm;

                    return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear() + "<br>" + strTime;
                }}
            ]
    });

    table2.buttons().container().insertBefore('#myTable2_filter');

    $('#date2').change(function(){
         table2.draw();
    });

    var table3 = $('#myTable3').DataTable({
        dom: 'lBfrtip',
        orderCellsTop: true,
        fixedHeader: true,
        lengthChange: false,
        processing: true,
        serverSide: true,
        buttons: [ 
                'pageLength',
                {
                    extend: 'pdfHtml5',
                    orientation: 'portrait',
                    pageSize: 'LEGAL'
                },
                'excel', 'colvis', 'print' 
            ],
        ajax: {
            url: "{{route('Housekeeping_Reports.reports')}}",
            data:function (d){
                d.num = 3,
                d.date3 = $('#date3').val()
            }
        },
        columns: [
            {data: 'Booking_No'},
            {data: 'Room_No'},
            {data: 'Facility_Type'},
            {data: 'Description'},
            {data: 'Discovered_By'},
            {data: 'Priority_Level'},
            {data: 'Status'},
            {data: 'Due_Date',
                render: function(data){
                    var date = new Date(data);
                    var month = [ "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December" ];

                    return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
                }
            },
            {data: 'Date_Resolved',
                render: function(data){
                    var date = new Date(data);
                    var month = [ "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December" ];

                    return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
                }
            },
            ]
    });

    table3.buttons().container().insertBefore('#myTable3_filter');

    $('#date3').change(function(){
         table3.draw();
    });

    var table4 = $('#myTable4').DataTable({
        dom: 'lBfrtip',
        orderCellsTop: true,
        fixedHeader: true,
        lengthChange: false,
        processing: true,
        serverSide: true,
        buttons: [ 
                'pageLength',
                {
                    extend: 'pdfHtml5',
                    orientation: 'portrait',
                    pageSize: 'LEGAL'
                },
                'excel', 'colvis', 'print' 
            ],
        ajax: {
            url: "{{route('Housekeeping_Reports.reports')}}",
            data:function (d){
                d.num = 4,
                d.date4 = $('#date4').val()
            }
        },
        columns: [
            {data: 'Room_No'},
            {data: 'name'},
            {data: 'Quantity'},
            {data: 'Quantity_Requested'},
            {data: 'Discrepancy'},
            {data: 'Attendant'},
            {data: 'Status'},
            {data: 'Date_Requested',
                render: function(data){
                    var date = new Date(data);
                    var month = [ "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December" ];
                    var hours = date.getHours();
                    var minutes = date.getMinutes();
                    var seconds = date.getSeconds();
                    var ampm = hours >= 12 ? 'pm' : 'am';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0'+minutes : minutes;
                    var strTime = hours + ':' + minutes + ':' + seconds +' ' + ampm;

                    return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear() + "<br>" + strTime;
                }
            },
            {data: 'Date_Received',
                render: function(data){
                    var date = new Date(data);
                    var month = [ "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December" ];
                    var hours = date.getHours();
                    var minutes = date.getMinutes();
                    var seconds = date.getSeconds();
                    var ampm = hours >= 12 ? 'pm' : 'am';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0'+minutes : minutes;
                    var strTime = hours + ':' + minutes + ':' + seconds +' ' + ampm;

                    return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear() + "<br>" + strTime;
                }}
            ]
    });

    table4.buttons().container().insertBefore('#myTable4_filter');

    $('#date4').change(function(){
         table4.draw();
    });

});
</script>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
