@extends('layouts.housekeeper')

@section('content')
    @include('layouts.headers.cards')

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.css"/>
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.js"></script>

    <script type="text/javascript">
        $.noConflict();
       jQuery(document).ready(function($) {
            //Table 1 
            var table = $('#myTable').DataTable( {
                dom: 'lBfrtip',
                orderCellsTop: true,
                fixedHeader: true,
                lengthChange: false,
                buttons: [ 
                            'pageLength',
                            {
                                extend: 'pdfHtml5',
                                orientation: 'landscape',
                                pageSize: 'LEGAL'
                            },
                            'excel', 'colvis', 'print' 
                        ]
            } );
            table.buttons().container().insertBefore( '#myTable_filter' );

            //Table 2 
            var table2 = $('#myTable2').DataTable( {
                dom: 'lBfrtip',
                orderCellsTop: true,
                fixedHeader: true,
                lengthChange: false,
                buttons: [ 
                            'pageLength',
                            {
                                extend: 'pdfHtml5',
                                orientation: 'landscape',
                                pageSize: 'LEGAL'
                            },
                            'excel', 'colvis', 'print' 
                        ]
            } );
            table2.buttons().container().insertBefore( '#myTable2_filter' );

            //Table 3 
            var table3 = $('#myTable3').DataTable( {
                dom: 'lBfrtip',
                orderCellsTop: true,
                fixedHeader: true,
                lengthChange: false,
                buttons: [ 
                            'pageLength',
                            {
                                extend: 'pdfHtml5',
                                orientation: 'landscape',
                                pageSize: 'LEGAL'
                            },
                            'excel', 'colvis', 'print' 
                        ]
            } );
            table3.buttons().container().insertBefore( '#myTable3_filter' );

            //Table 4 
            var table4 = $('#myTable4').DataTable( {
                dom: 'lBfrtip',
                orderCellsTop: true,
                fixedHeader: true,
                lengthChange: false,
                buttons: [ 
                            'pageLength',
                            {
                                extend: 'pdfHtml5',
                                orientation: 'landscape',
                                pageSize: 'LEGAL'
                            },
                            'excel', 'colvis', 'print' 
                        ]
            } );
            table4.buttons().container().insertBefore( '#myTable4_filter' );
        } );
    </script>


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
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">No.</th>
                                                <th scope="col" style="font-size:18px;">Booking Number</th>
                                                <th scope="col" style="font-size:18px;">Room Number</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Housekeeping Status</th>
                                                <th scope="col" style="font-size:18px;">Attendant</th>
                                                <th scope="col" style="font-size:18px;">Guest Name</th>
                                                <th scope="col" style="font-size:18px;">Check-In Date</th>
                                                <th scope="col" style="font-size:18px;">Check-Out Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @php
                                                    $count = 1;
                                                @endphp
                                            @foreach ($list as $lists)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $lists->Booking_No }}</td>
                                                    <td>{{ $lists->Room_No }}</td>
                                                    <td>{{ $lists->Facility_Type }}</td>
                                                    <td>{{ $lists->Housekeeping_Status }}</td>
                                                    <td>{{ $lists->Attendant }}</td>
                                                    <td>{{ $lists->Guest_Name }}</td>
                                                    <td>{{ date('F j Y', strtotime($lists->Check_In_Date)) }}</td>
                                                    <td>{{ date('F j Y', strtotime($lists->Check_Out_Date)) }}</td>
                                                </tr>
                                                @php $count++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Supply Request --}}
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">No.</th>
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
                                            @php
                                                $count = 1;
                                            @endphp
                                            @foreach($list3 as $lists)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$lists->Room_No}}</td>
                                                <td>{{$lists->name}}</td>
                                                <td>{{$lists->Quantity}}</td>
                                                <td>{{$lists->Quantity_Requested}}</td>
                                                <td>{{$lists->Attendant}}</td>
                                                @if($lists->Status == "Approved")
                                                <td style="color:#5cb85c;">{{$lists->Status}}</td>
                                                @else
                                                <td style="color:#d9534f;">{{$lists->Status}}</td>
                                                @endif
                                                <td>{{ date('F j Y', strtotime($lists->Date_Requested)) }} 
                                                    <br> 
                                                    {{date('H:i:s A', strtotime($lists->Date_Requested)) }}
                                                </td>
                                                <td>{{ date('F j Y', strtotime($lists->Date_Received)) }} 
                                                    <br> 
                                                    {{date('H:i:s A', strtotime($lists->Date_Received)) }}
                                                </td>
                                            </tr>
                                            @php $count++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Maintenance --}}
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-3-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable3">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">No.</th>
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
                                                @php
                                                    $count = 1;
                                                @endphp
                                            @foreach ($list2 as $lists)                                             
                                                    <tr>
                                                        <td>{{ $count }}</td>
                                                        <td>{{ $lists->Booking_No }}</td>
                                                        <td>{{ $lists->Room_No }}</td>
                                                        <td>{{ $lists->Facility_Type }}</td>
                                                        <td>{{ $lists->Description }}</td>
                                                        <td>{{ $lists->Discovered_By }}</td>
                                                        <td>{{ $lists->Priority_Level }}</td>
                                                        <td>{{ $lists->Status }}</td>
                                                        <td>{{ date('F j Y', strtotime($lists->Due_Date)) }}</td>
                                                        <td>{{ date('F j Y', strtotime($lists->Date_Resolved)) }}</td>
                                                    </tr>
                                                @php $count++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Linen Request --}}
                                <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-4-tab">
                                    <table class="table align-items-center table-flush" id="myTable4">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">No.</th>
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
                                            @php
                                                $count = 1;
                                            @endphp
                                            @foreach($list4 as $lists)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$lists->Room_No}}</td>
                                                <td>{{$lists->name}}</td>
                                                <td>{{$lists->Quantity}}</td>
                                                <td>{{$lists->Quantity_Requested}}</td>
                                                <td>{{$lists->Discrepancy}}</td>
                                                <td>{{$lists->Attendant}}</td>
                                                @if($lists->Status == "Approved")
                                                <td style="color:#5cb85c;">{{$lists->Status}}</td>
                                                @else
                                                <td style="color:#d9534f;">{{$lists->Status}}</td>
                                                @endif
                                                <td>{{ date('F j Y', strtotime($lists->Date_Requested)) }} 
                                                    <br> 
                                                    {{date('H:i:s A', strtotime($lists->Date_Requested)) }}
                                                </td>
                                                <td>{{ date('F j Y', strtotime($lists->Date_Received)) }} 
                                                    <br> 
                                                    {{date('H:i:s A', strtotime($lists->Date_Received)) }}
                                                </td>
                                            </tr>
                                            @php $count++; @endphp
                                            @endforeach
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

    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
