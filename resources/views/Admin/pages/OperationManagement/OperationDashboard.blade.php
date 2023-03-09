@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.css"/>
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.js"></script>


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
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">
                                            @foreach($request_count as $count)
                                                {{$count->cnt}}
                                            @endforeach
                                        </h1>
                                        <h5 class="text-secondary mx-auto d-flex justify-content-center text">
                                            Guest Request
                                        </h5>
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
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">
                                            @foreach($room1 as $count)
                                                {{$count->cnt}}
                                            @endforeach
                                        </h1>
                                        <h5 class="text-secondary mx-auto d-flex justify-content-center text">Vacant
                                            Rooms
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body-sm rounded" style="background-color:#38474D;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">
                                            @foreach($room2 as $count)
                                                {{$count->cnt}}
                                            @endforeach
                                        </h1>
                                        <h5 class="text-secondary mx-auto d-flex justify-content-center text">Occupied
                                            Rooms
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body-sm rounded" style="background-color:#38474D;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">
                                            @foreach($room3 as $count)
                                                {{$count->cnt}}
                                            @endforeach
                                        </h1>
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
                buttons: [ 
                        'pageLength',
                        {
                            extend: 'pdfHtml5',
                            orientation: 'portrait',
                            pageSize: 'LEGAL'
                        },
                        'excel', 'colvis', 'print' 
                    ]
            });
        });
    </script>
@endsection

@push('js')
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
