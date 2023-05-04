@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>


    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Maintenance</h6>
                @if(Auth::user()->User_Type == "Admin")
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">Housekeeping</li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Maintenance</li>
                        </ol>
                    </nav>
                @elseif(Auth::user()->User_Type == "Housekeeping Supervisor")
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('Housekeeping_Dashboard') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">Housekeeping</li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Housekeeping Dashboard</li>
                        </ol>
                    </nav>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="row align-items-center">
                        <div class="col text-right">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                        aria-selected="true">Out of Order Rooms</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                        aria-selected="false"> Archives </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="tab-content" id="myTabContent">
                            {{-- Out of Order Rooms --}}
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                aria-labelledby="tabs-icons-text-1-tab">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:18px;">Room No.</th>
                                            <th scope="col" style="font-size:18px;">Facility Type</th>
                                            <th scope="col" style="font-size:18px;">Description</th>
                                            <th scope="col" style="font-size:18px;">Discovered By</th>
                                            <th scope="col" style="font-size:18px;">Priority Level</th>
                                            <th scope="col" style="font-size:18px;">Status</th>
                                            <th scope="col" style="font-size:18px;">Due Date</th>
                                            <th scope="col" style="font-size:18px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $lists)
                                            <tr>
                                                <td>{{ $lists->Room_No }}</td>
                                                <td>{{ $lists->Facility_Type }}</td>
                                                <td>{{ $lists->Description }}</td>
                                                <td>{{ $lists->Discovered_By }}</td>
                                                @if ($lists->Priority_Level == 'Low')
                                                    <td style="color:#20c997;">{{ $lists->Priority_Level }}</td>
                                                @elseif($lists->Priority_Level == 'Moderate')
                                                    <td style="color:#ffc107;">{{ $lists->Priority_Level }}</td>
                                                @elseif($lists->Priority_Level == 'High')
                                                    <td style="color:#dc3545;">{{ $lists->Priority_Level }}</td>
                                                @endif
                                                <td>{{ $lists->Status }}</td>
                                                <td>{{ date('F j, Y', strtotime($lists->Due_Date)) }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                        data-target="#view{{ $lists->id }}"> <i class="bi bi-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#update{{ $lists->id }}"> <i
                                                            class="bi bi-pencil-square"></i> </button>
                                                </td>
                                            </tr>

                                            <!--View-->
                                            <div class="modal fade" id="view{{ $lists->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">Booking Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="card-body bg-white" style="border-radius: 18px">
                                                                    <p class="text-left">Booking No.</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Booking_No }}" readonly />

                                                                    <p class="text-left">Room No.</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Room_No }}" readonly />

                                                                    <p class="text-left">Guest Name</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Guest_Name }}" readonly />

                                                                    <p class="text-left">Mobile Number</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Mobile_Num }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Update -->
                                            <div class="modal fade" id="update{{ $lists->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">Update Maintenance Status</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="card-body bg-white"
                                                                    style="border-radius: 18px">
                                                                    <p class="text-center">Is the problem resolved?</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                            <a href="{{ url('/update_maintenance_stats', ['id' => $lists->id, 'rno' => $lists->Room_No, 'bno' => $lists->Booking_No, 'due' => $lists->Due_Date]) }}"
                                                                class="btn btn-success">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Archives --}}
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:18px;">Room No.</th>
                                            <th scope="col" style="font-size:18px;">Facility Type</th>
                                            <th scope="col" style="font-size:18px;">Description</th>
                                            <th scope="col" style="font-size:18px;">Discovered By</th>
                                            <th scope="col" style="font-size:18px;">Priority Level</th>
                                            <th scope="col" style="font-size:18px;">Status</th>
                                            <th scope="col" style="font-size:18px;">Due Date</th>
                                            <th scope="col" style="font-size:18px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list2 as $lists)
                                            <tr>
                                                <td>{{ $lists->Room_No }}</td>
                                                <td>{{ $lists->Facility_Type }}</td>
                                                <td>{{ $lists->Description }}</td>
                                                <td>{{ $lists->Discovered_By }}</td>
                                                @if ($lists->Priority_Level == 'Low')
                                                    <td style="color:#20c997;">{{ $lists->Priority_Level }}</td>
                                                @elseif($lists->Priority_Level == 'Moderate')
                                                    <td style="color:#ffc107;">{{ $lists->Priority_Level }}</td>
                                                @elseif($lists->Priority_Level == 'High')
                                                    <td style="color:#dc3545;">{{ $lists->Priority_Level }}</td>
                                                @endif
                                                <td>{{ $lists->Status }}</td>
                                                <td>{{ date('F j, Y', strtotime($lists->Due_Date)) }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                        data-target="#view{{ $lists->id }}"> <i class="bi bi-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!--View-->
                                            <div class="modal fade" id="view{{ $lists->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">Booking Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="card-body bg-white"
                                                                    style="border-radius: 18px">
                                                                    <p class="text-left">Booking No.</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Booking_No }}" readonly />

                                                                    <p class="text-left">Room No.</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Room_No }}" readonly />

                                                                    <p class="text-left">Guest Name</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Guest_Name }}" readonly />

                                                                    <p class="text-left">Mobile Number</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Mobile_Num }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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




    <script>
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
            $('#myTable2').DataTable();
        });
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
