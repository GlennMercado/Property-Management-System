@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>


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
                                            aria-selected="false"> Guest Request</a>
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
                                                <th scope="col" style="font-size:18px;"> </th>
                                                <th scope="col" style="font-size:18px;">Booking No.</th>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility<br>Type</th>
                                                <th scope="col" style="font-size:18px;">Housekeeping<br>Status</th>
                                                <th scope="col" style="font-size:18px;">Attendant</th>
                                                <th scope="col" style="font-size:18px;">Guest Name</th>
                                                <th scope="col" style="font-size:18px;">Check-In<br>Date</th>
                                                <th scope="col" style="font-size:18px;">Check-Out<br>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $lists)
                                                @php
                                                    $count = 1;
                                                @endphp
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
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;">Booking Status</th>
                                                <th scope="col" style="font-size:18px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>supply
                                    </table>
                                </div>

                                {{-- Maintenance --}}
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-3-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;"> </th>
                                                <th scope="col" style="font-size:18px;">Booking No.</th>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility<br>Type</th>
                                                <th scope="col" style="font-size:18px;">Description</th>
                                                <th scope="col" style="font-size:18px;">Discovered By</th>
                                                <th scope="col" style="font-size:18px;">Priority Level</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;">Due<br>Date</th>
                                                <th scope="col" style="font-size:18px;">Date<br>Resolved</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list2 as $lists)
                                                @php
                                                    $datenow = date('Y-m-d');
                                                    $count = 1;
                                                @endphp
                                                @if ($lists->Date_Resolved == $datenow)
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
                                                @endif
                                                @php $count++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Guest Request --}}
                                <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-4-tab">
                                    <p class="description">Raw denim you probably haven't heard of them jean shorts Austin.
                                        Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor,
                                        williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh
                                        dreamcatcher
                                        synth.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>




        <script>
            $('.prevent_submit').on('submit', function() {
                $('.prevent_submit').attr('disabled', 'true');
            });
            $.noConflict();
            jQuery(document).ready(function($) {
                $('#myTable').DataTable();
                $('#myTable2').DataTable();
                $('#myTable4').DataTable();
            });
            // $(document).ready(function() {
            //     $("#optionselect").change(function() {
            //         var selected = $("option:selected", this).val();
            //         if (selected == 'Cleaned') {
            //             $('#cleaned, #cleaned2').show();
            //             $('#outofservice, #outofservice2').hide();
            //         } else if (selected == 'Out of Service') {
            //             $('#outofservice, #outofservice2').show();
            //             $('#cleaned, #cleaned2').hide();
            //         }
            //     });
            // });
        </script>
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
