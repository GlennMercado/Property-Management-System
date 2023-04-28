@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.js">
    </script>


    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Reports</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Operations Management</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Reports</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col text-right">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                            data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Guest Requests</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"> Complaints </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                            href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                            aria-selected="false"> Checked-in</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                {{-- Guest Requests --}}
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
                                                <th scope="col" style="font-size:18px;">Request ID</th>
                                                <th scope="col" style="font-size:18px;">Room Number</th>
                                                <th scope="col" style="font-size:18px;">Booking Number</th>
                                                <th scope="col" style="font-size:18px;">Guest Name</th>
                                                <th scope="col" style="font-size:18px;">Type of Request</th>
                                                <th scope="col" style="font-size:18px;">Request</th>
                                                <th scope="col" style="font-size:18px;">Date Requested</th>
                                                <th scope="col" style="font-size:18px;">Date Updated</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                {{-- Complaints --}}
                                {{-- <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
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
                                                <th scope="col" style="font-size:18px;">Concern</th>
                                                <th scope="col" style="font-size:18px;">Complaint</th>
                                                <th scope="col" style="font-size:18px;">Date Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div> --}}

                                {{-- Maintenance --}}
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-3-tab">

                                </div>

                                {{-- Linen Request --}}
                                <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-4-tab">

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

                //Guest Request
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
                        url: "{{ route('Reports.Operation_Reports') }}",
                        data: function(d) {
                            d.num = 1,
                                d.date = $('#date').val(),
                                d.search = $('#search1').val()
                        }
                    },
                    columns: [{
                            data: 'Request_ID'
                        },
                        {
                            data: 'Room_No'
                        },
                        {
                            data: 'Booking_No'
                        },
                        {
                            data: 'Guest_Name'
                        },
                        {
                            data: 'Type_of_Request'
                        },
                        {
                            data: 'Request'
                        },
                        {
                            data: 'Date_Requested',
                            render: function(data) {
                                var date = new Date(data);
                                var month = ["January", "February", "March", "April", "May", "June",
                                    "July", "August", "September", "October", "November", "December"
                                ];

                                return month[date.getMonth()] + " " + date.getDate() + ", " + date
                                    .getFullYear();
                            }
                        },
                        {
                            data: 'Date_Updated',
                            render: function(data) {
                                var date = new Date(data);
                                var month = ["January", "February", "March", "April", "May", "June",
                                    "July", "August", "September", "October", "November", "December"
                                ];

                                return month[date.getMonth()] + " " + date.getDate() + ", " + date
                                    .getFullYear();
                            }
                        },
                    ]
                });

                $('#myTable_filter input[type="search"]').prop('id', 'search1');

                table.buttons().container().insertBefore('#myTable_filter');

                $('#date').change(function() {
                    table.draw();
                });

                //complaints
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
                        url: "{{ route('Reports.Operation_Reports') }}",
                        data: function(d) {
                            d.num = 2,
                                d.date2 = $('#date2').val(),
                                d.search2 = $('#search2').val()
                        }
                    },
                    columns: [{
                            data: 'concern'
                        },
                        {
                            data: 'concern_text'
                        },
                        {
                            data: 'created_at',
                            render: function(data) {
                                var date = new Date(data);
                                var month = ["January", "February", "March", "April", "May", "June",
                                    "July", "August", "September", "October", "November", "December"
                                ];

                                return month[date.getMonth()] + " " + date.getDate() + ", " + date
                                    .getFullYear();
                            }
                        },
                    ]
                });

                $('#myTable2_filter input[type="search"]').prop('id', 'search2');

                table2.buttons().container().insertBefore('#myTable2_filter');

                $('#date2').change(function() {
                    table2.draw();
                });


            });
        </script>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
