@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">

        <div class="row">
            {{-- -xl-4 mb-5 mb-xl-0 --}}
            <div class="col">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                {{-- <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6> --}}
                                <p class="text-black text-lg mb-0"><i class="bi bi-graph-up mr-2"></i>Operation Management
                                    Dashboard</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body-md rounded" style="background-color:#156C45;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">100</h1>
                                        <h5 class="text-secondary mx-auto d-flex justify-content-center text">Guest
                                            Request</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body-md rounded" style="background-color:#23B271;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">200</h1>
                                        <h5 class="text-secondary mx-auto d-flex justify-content-center text">Guest
                                            Reservation
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body-sm rounded" style="background-color:#38474D;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">20</h1>
                                        <h5 class="text-secondary mx-auto d-flex justify-content-center text">Guest
                                            Reviews
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body-sm rounded" style="background-color:#38474D;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">10</h1>
                                        <h5 class="text-secondary mx-auto d-flex justify-content-center text">Vacant
                                            Rooms
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body-sm rounded" style="background-color:#38474D;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">10</h1>
                                        <h5 class="text-secondary mx-auto d-flex justify-content-center text">Occupied
                                            Rooms
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body-sm rounded" style="background-color:#38474D;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">10</h1>
                                        <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">Room for
                                            Cleaning
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <p class="text-lg pt-6">List of Due-out Guests</p>
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
                                                        <th scope="col" style="font-size:18px;">ID</th>
                                                        <th scope="col" style="font-size:18px;">Guest Name</th>
                                                        <th scope="col" style="font-size:18px;">Arrival/Departure</th>
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
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
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
                    url: "{{ route('Housekeeping_Reports.reports') }}",
                    data: function(d) {
                        d.num = 1,
                            d.date = $('#date').val(),
                            d.search = $('#search1').val()
                    }
                },
                columns: [{
                        data: 'ID'
                    },
                    {
                        data: 'Guest_Name'
                    },
                        data: 'Check_In_Date',
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
                        data: 'Check_Out_Date',
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
        });
    </script>
@endsection

@push('js')
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
