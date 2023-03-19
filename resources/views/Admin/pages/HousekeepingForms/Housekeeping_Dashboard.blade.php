@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Housekeeping Dashboard</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Housekeeping</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Housekeeping Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <!-- Count Box -->
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body rounded" style="background-color:#2AD587;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">
                                            @foreach ($arrival as $count)
                                                {{ $count->cnt }}
                                            @endforeach
                                        </h1>
                                        <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">
                                            Arrival
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body rounded" style="background-color:#34C99D;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">
                                            @foreach ($supply as $count)
                                                {{ $count->cnt }}
                                            @endforeach
                                        </h1>
                                        <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">
                                            Supply Request
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body rounded"
                                        style="background-color:
                                    #39C3A8;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">
                                            @foreach ($linen as $count)
                                                {{ $count->cnt }}
                                            @endforeach
                                        </h1>
                                        <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">
                                            Linen Request
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body rounded" style="background-color:#43B7BE;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">
                                            @foreach ($maintenance as $count)
                                                {{ $count->cnt }}
                                            @endforeach
                                        </h1>
                                        <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">
                                            Maintenance
                                        </h2>
                                    </div>
                                </div>
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
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Arrival / Departure</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"> Task Assignment </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                            href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                            aria-selected="false"> Supply Request</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab"
                                            href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4"
                                            aria-selected="false"> Archives</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div style="padding:8px;">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                {{-- Arrival / Departure --}}
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Action</th>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Housekeeping Status</th>
                                                <th scope="col" style="font-size:18px;">Check In Date</th>
                                                <th scope="col" style="font-size:18px;">Check Out Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $datenow = date('Y-m-d'); @endphp

                                            @foreach ($list as $lists)
                                                @if ($lists->IsArchived == false && $lists->Check_In_Date == $datenow && $lists->Front_Desk_Status == 'Reserved')
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                                data-target="#view1{{ $lists->ID }}"> <i
                                                                    class="bi bi-eye"></i>
                                                            </button>

                                                            @if ($lists->Attendant == 'Unassigned' && $lists->Housekeeping_Status == 'Cleaned')
                                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                                    data-target="#assign{{ $lists->ID }}">
                                                                    <i class="bi bi-person-fill"></i> </button>
                                                            @endif

                                                            @if ($lists->Housekeeping_Status == 'Inspect')
                                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                                    data-target="#update{{ $lists->ID }}">
                                                                    <i class="bi bi-arrow-repeat"></i>
                                                            @endif
                                                        </td>

                                                        <td>{{ $lists->Room_No }}</td>
                                                        <td>{{ $lists->Facility_Type }}</td>
                                                        <td>{{ $lists->Housekeeping_Status }}</td>
                                                        <td>{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</td>
                                                        <td>{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</td>

                                                    </tr>

                                                    <!--View-->
                                                    <div class="modal fade" id="view1{{ $lists->ID }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">View Information</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="card-body bg-white"
                                                                            style="border-radius: 18px">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $lists->ID }}" />

                                                                            <p class="text-left">Room Status : </p>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $lists->Facility_Status }}"
                                                                                readonly>

                                                                            <p class="text-left">Front Desk Status: </p>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $lists->Front_Desk_Status }}"
                                                                                readonly>

                                                                            <p class="text-left">Attendant: </p>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $lists->Attendant }}" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Assign Attendant-->
                                                    <div class="modal fade" id="assign{{ $lists->ID }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">View Information</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST" class="prevent_submit"
                                                                    action="{{ url('/assign_housekeepers') }}"
                                                                    enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="card-body bg-white"
                                                                                style="border-radius: 18px">
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $lists->ID }}" />

                                                                                <input type="hidden" name="check"
                                                                                    value="arrival" />

                                                                                <p class="text-left">Attendants: </p>
                                                                                <select name="housekeeper"
                                                                                    class="form-control" required>
                                                                                    <option selected="true"
                                                                                        disabled="disabled">
                                                                                        Select</option>
                                                                                        @foreach($housekeeper as $housekeepers)
                                                                                        <option value="{{$housekeepers->Housekeepers_Name}}">
                                                                                            {{$housekeepers->Housekeepers_Name}}
                                                                                        </option>
                                                                                    @endforeach  
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</a>
                                                                        <input type="submit"
                                                                            class="btn btn-success prevent_submit"
                                                                            value="Assign" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Update Housekeeping Status Modal-->
                                                    <div class="modal fade" id="update{{ $lists->ID }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">Setting Status</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="card-body bg-white"
                                                                            style="border-radius: 18px">

                                                                            @if ($lists->Request_ID == null)
                                                                                @php $lists->Request_ID = "null"; @endphp
                                                                            @endif
                                                                            <h4 class="text-center">Is the Room
                                                                                {{ $lists->Room_No }} <span
                                                                                    class="text-success">

                                                                                    CLEANED</span>?</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</a>
                                                                    <a href="{{ url('/update_housekeeping_stats', ['hk' => $lists->Attendant, 'id' => $lists->ID, 'status' => 'Arrival', 'req' => $lists->Request_ID]) }}"
                                                                        class="btn btn-success">Yes</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($lists->IsArchived == false && $lists->Check_Out_Date == $datenow && $lists->Front_Desk_Status == 'Checked-In')
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                                data-target="#view2{{ $lists->ID }}"> <i
                                                                    class="bi bi-eye"></i>
                                                            </button>
                                                        </td>

                                                        <td>{{ $lists->Room_No }}</td>
                                                        <td>{{ $lists->Facility_Type }}</td>
                                                        <td>{{ $lists->Housekeeping_Status }}</td>
                                                        <td>{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</td>
                                                        <td>{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</td>

                                                    </tr>

                                                    <!--View-->
                                                    <div class="modal fade" id="view2{{ $lists->ID }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">View Information</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="card-body bg-white"
                                                                            style="border-radius: 18px">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $lists->ID }}" />

                                                                            <p class="text-left">Room Status : </p>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $lists->Facility_Status }}"
                                                                                readonly>

                                                                            <p class="text-left">Front Desk Status: </p>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $lists->Front_Desk_Status }}"
                                                                                readonly>

                                                                            <p class="text-left">Attendant: </p>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $lists->Attendant }}" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Task Assignment --}}
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Action</th>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;">Booking Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $lists)
                                                @if ($lists->Front_Desk_Status != 'Reserved')
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                                data-target="#view3{{ $lists->ID }}"
                                                                title="View Information"> <i class="bi bi-eye"></i>
                                                            </button>

                                                            @if ($lists->Attendant == 'Unassigned')
                                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                                    data-target="#assign{{ $lists->ID }}"
                                                                    title="Assign Attendant">
                                                                    <i class="bi bi-person-fill"></i> </button>
                                                            @endif

                                                            @if ($lists->Housekeeping_Status == 'Out of Service' && $lists->Attendant != 'Unassigned' && $lists->Front_Desk_Status == "Checked-Out")
                                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                                    data-target="#update{{ $lists->ID }}"
                                                                    title="Update Housekeeping Status">
                                                                    <i class="bi bi-arrow-repeat"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                                    data-target="#outoforder{{ $lists->ID }}"
                                                                    title="Update Room to Out of Order">
                                                                    <i class="bi bi-tools"></i> </button>
                                                            @endif

                                                            @if ($lists->Housekeeping_Status == 'Inspect' && $lists->Attendant != 'Unassigned')
                                                                <button class="btn btn-sm"
                                                                    style="background: #9FA6B2;  color:white;"
                                                                    data-toggle="modal"
                                                                    data-target="#check_supply{{ $lists->ID }}"
                                                                    title="Checking Room Supplies">
                                                                    <i class="bi bi-list-check"></i>
                                                                </button>
                                                            @endif

                                                            @if ($lists->Housekeeping_Status == 'Inspect(After Checking)' && $lists->Attendant != 'Unassigned')
                                                                <button class="btn btn-sm"
                                                                    style="background: #9FA6B2;  color:white;"
                                                                    data-toggle="modal"
                                                                    data-target="#check_linen{{ $lists->ID }}"
                                                                    title="Checking Room Linen">
                                                                    <i class="bi bi-check2-square"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                        <td>{{ $lists->Room_No }}</td>
                                                        <td>{{ $lists->Facility_Type }}</td>
                                                        <td>{{ $lists->Facility_Status }}</td>
                                                        <td>{{ $lists->Front_Desk_Status }}</td>
                                                    </tr>

                                                    <!--View-->
                                                    <div class="modal fade" id="view3{{ $lists->ID }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">View Information</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="card-body bg-white"
                                                                            style="border-radius: 18px">
                                                                            @if ($lists->Request_ID != null)
                                                                                @foreach ($list2 as $lists2)
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $lists2->ID }}" />

                                                                                    <p class="text-left">Room No: </p>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{ $lists2->Room_No }}"
                                                                                        readonly>

                                                                                    <p class="text-left">Guest Name: </p>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{ $lists2->Guest_Name }}"
                                                                                        readonly>

                                                                                    <p class="text-left">Date_Requested:
                                                                                    </p>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{ date('F j, Y', strtotime($lists2->Date_Requested)) }}"
                                                                                        readonly>
                                                                                @endforeach
                                                                            @endif
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $lists->ID }}" />

                                                                            <p class="text-left">Housekeeping Status: </p>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $lists->Housekeeping_Status }}"
                                                                                readonly>

                                                                            <p class="text-left">Attendant: </p>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $lists->Attendant }}" readonly>

                                                                            <p class="text-left">Checked In Date: </p>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}"
                                                                                readonly>

                                                                            <p class="text-left">Checked Out Date: </p>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Assign Attendant-->
                                                    <div class="modal fade" id="assign{{ $lists->ID }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">View Information</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST" class="prevent_submit"
                                                                    action="{{ url('/assign_housekeepers') }}"
                                                                    enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="card-body bg-white"
                                                                                style="border-radius: 18px">
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $lists->ID }}" />

                                                                                <input type="hidden" name="room_no"
                                                                                    value="{{ $lists->Room_No }}" />

                                                                                <input type="hidden" name="check"
                                                                                    value="checkin" />

                                                                                <p class="text-left">Attendants: </p>
                                                                                <select name="housekeeper"
                                                                                    class="form-control" required>
                                                                                    <option selected="true"
                                                                                        disabled="disabled">
                                                                                        Select</option>
                                                                                    @foreach($housekeeper as $housekeepers)
                                                                                        <option value="{{$housekeepers->Housekeepers_Name}}">
                                                                                            {{$housekeepers->Housekeepers_Name}}
                                                                                        </option>
                                                                                    @endforeach      
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</a>
                                                                        <input type="submit"
                                                                            class="btn btn-success prevent_submit"
                                                                            value="Assign" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Out of Order Rooms Modal-->
                                                    <div class="modal fade" id="outoforder{{ $lists->ID }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">Maintenance</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ url('/add_out_of_orders') }}"
                                                                        class="prevent_submit" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <!-- Room Number and Facility Type -->
                                                                                <p class="text-left">Room No</p>
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $lists->ID }}" />
                                                                                <input type="hidden" name="room_no"
                                                                                    value="{{ $lists->Room_No }}" />
                                                                                <input type="hidden" name="book_no"
                                                                                    value="{{ $lists->Booking_No }}" />
                                                                                <input class="form-control"
                                                                                    value="{{ $lists->Room_No }}"
                                                                                    readonly />

                                                                                <input type="hidden" name="facility_type"
                                                                                    value="Hotel Room" />

                                                                                <input type="hidden" name="discoveredby"
                                                                                    value="{{ $lists->Attendant }}" />

                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="text-left">Priority Level</p>
                                                                                <select name="priority"
                                                                                    class="form-control" required>
                                                                                    <option selected="true"
                                                                                        disabled="disabled">
                                                                                        Select</option>
                                                                                    <option value="Low">Low</option>
                                                                                    <option value="Moderate">Moderate
                                                                                    </option>
                                                                                    <option value="High">High</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <p class="text-left">Description</p>
                                                                                <input type="text" class="form-control"
                                                                                    name="description" required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <p class="text-left">Due Date</p>
                                                                                <input type="date" class="form-control"
                                                                                    name="due_date" required />
                                                                            </div>
                                                                        </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</a>
                                                                    <input type="submit" name="outofordersubmit"
                                                                        class="btn btn-primary" />
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Update Housekeeping Status Modal-->
                                                    <div class="modal fade" id="update{{ $lists->ID }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">Setting Status</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="card-body bg-white"
                                                                            style="border-radius: 18px">

                                                                            @if ($lists->Request_ID == null)
                                                                                @php $lists->Request_ID = "null"; @endphp
                                                                            @endif
                                                                            <h4 class="text-center">Is the Room
                                                                                {{ $lists->Room_No }} <span
                                                                                    class="text-success">

                                                                                    CLEANED</span>?</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</a>
                                                                    <a href="{{ url('/update_housekeeping_stats', ['hk' => $lists->Attendant, 'id' => $lists->ID, 'status' => 'Cleaned', 'req' => $lists->Request_ID]) }}"
                                                                        class="btn btn-success">Yes</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Supply Checking --}}
                                                    <div id="check_supply{{ $lists->ID }}" class="modal hide fade"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">Room
                                                                        {{ $lists->Room_No }} Supply
                                                                        Checking
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ url('/deduct_supplies') }}"
                                                                    class="prevent_submit" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <p class="text-left">Item Name</p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="text-left">Quantity</p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="text-left">Deduction</p>
                                                                            </div>
                                                                        </div>
                                                                        @foreach ($list4 as $lists2)
                                                                            @if ($lists2->Room_No == $lists->Room_No)
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <input type="hidden"
                                                                                            name="room_no"
                                                                                            value="{{ $lists2->Room_No }}" />
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="{{ $lists2->name }}"
                                                                                            readonly>
                                                                                        <input type="hidden"
                                                                                            name="name[]"
                                                                                            value="{{ $lists2->name }}">
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="{{ $lists2->Quantity }}"
                                                                                            readonly>
                                                                                        <input type="hidden"
                                                                                            name="quantity[]"
                                                                                            value="{{ $lists2->Quantity }}" />
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="deduction[]"
                                                                                            value="0" />
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a data-dismiss="modal" class="btn">Close</a>
                                                                        <input type="submit" value="Submit"
                                                                            name="submit" class="btn btn-primary">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Check Linen --}}
                                                    <div id="check_linen{{ $lists->ID }}" class="modal hide fade"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">Room
                                                                        {{ $lists->Room_No }} Linen
                                                                        Checking
                                                                    </h5>

                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ url('/check_linens') }}"
                                                                    class="prevent_submit" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <p class="text-left">Item Name</p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="text-left">Quantity</p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="text-left">Discrepancy</p>
                                                                            </div>
                                                                        </div>
                                                                        @foreach ($list5 as $lists2)
                                                                            @if ($lists2->Room_No == $lists->Room_No)
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <input type="hidden"
                                                                                            name="room_no"
                                                                                            value="{{ $lists2->Room_No }}" />
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="{{ $lists2->name }}"
                                                                                            readonly>
                                                                                        <input type="hidden"
                                                                                            name="name[]"
                                                                                            value="{{ $lists2->name }}">

                                                                                            <input type="hidden" name="booking_no" value ={{$lists->Booking_No}}>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="{{ $lists2->Quantity }}"
                                                                                            readonly>
                                                                                        <input type="hidden"
                                                                                            name="quantity[]"
                                                                                            value="{{ $lists2->Quantity }}" />
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <input type="hidden"
                                                                                            name="current_discrepancy[]"
                                                                                            value="{{ $lists2->Discrepancy }}" />
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="discrepancy[]"
                                                                                            value="0" />
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a data-dismiss="modal" class="btn">Close</a>
                                                                        <input type="submit" value="Submit"
                                                                            name="submit" class="btn btn-primary">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Supply Request --}}
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-3-tab">
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Room No</th>
                                                <th scope="col" style="font-size:18px;">Attendant</th>
                                                <th scope="col" style="font-size:18px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list3 as $lists)
                                                <tr>
                                                    <td>{{ $lists->Room_No }}</td>
                                                    <td>{{ $lists->Attendant }}</td>
                                                    <td>
                                                        @php
                                                            $check;
                                                            $roomno = $lists->Room_No;
                                                            $sql = \DB::select("SELECT CASE WHEN diff_rows > 0 THEN 'Different' ELSE 'Same' END AS Result FROM ( SELECT SUM(CASE WHEN Status = 'Requested' THEN 0 ELSE 1 END) AS diff_rows FROM hotel_room_supplies WHERE Room_No = '$roomno') AS derived");
                                                            foreach ($sql as $supply) {
                                                                $check = $supply->Result;
                                                            }
                                                        @endphp
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#view_supply{{ $lists->Room_No }}"
                                                            title="View Information">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                        @if ($lists->rstats != 'Occupied' && $lists->Attendant != 'Unassigned')
                                                            @if ($check == 'Different')
                                                                <button type="button" class="btn btn-sm btn-success"
                                                                    data-toggle="modal"
                                                                    data-target="#request_supply{{ $lists->Room_No }}"
                                                                    title="Request Supply">
                                                                    <i class="bi bi-box-arrow-in-down-left"></i>
                                                                </button>
                                                            @endif
                                                        @endif
                                                        @if ($lists->Attendant == 'Unassigned')
                                                            <button class="btn btn-sm btn-success" data-toggle="modal"
                                                                data-target="#assign3{{ $lists->id }}"
                                                                title="Assign Attendant">
                                                                <i class="bi bi-person-fill"></i> </button>
                                                        @endif
                                                    </td>

                                                    <!--Assign Attendant-->
                                                    <div class="modal fade" id="assign3{{ $lists->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">View Information</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST" class="prevent_submit"
                                                                    action="{{ url('/assign_housekeepers_supplies') }}"
                                                                    enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="card-body bg-white"
                                                                                style="border-radius: 18px">
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $lists->id }}" />

                                                                                <input type="hidden" name="room_no"
                                                                                    value="{{ $lists->Room_No }}" />

                                                                                <p class="text-left">Attendants: </p>
                                                                                <select name="housekeeper"
                                                                                    class="form-control" required>
                                                                                    <option selected="true"
                                                                                        disabled="disabled">
                                                                                        Select</option>
                                                                                        @foreach($housekeeper as $housekeepers)
                                                                                        <option value="{{$housekeepers->Housekeepers_Name}}">
                                                                                            {{$housekeepers->Housekeepers_Name}}
                                                                                        </option>
                                                                                    @endforeach  
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</a>
                                                                        <input type="submit"
                                                                            class="btn btn-success prevent_submit"
                                                                            value="Assign" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>

                                    @foreach ($array as $arrays)
                                        {{-- View Supply --}}
                                        <div id="view_supply{{ $arrays['Room_No'] }}" class="modal hide fade"
                                            tabindex="-1">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4"
                                                            id="exampleModalLabel">Room {{ $arrays['Room_No'] }} Supplies
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table align-items-center table-flush"
                                                            id="myTable2">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Item
                                                                        Name</th>
                                                                    <th scope="col">
                                                                        Quantity</th>
                                                                    <th scope="col">
                                                                        Quantity <br> Requested</th>
                                                                    <th scope="col">
                                                                        Date <br> Requested</th>
                                                                    <th scope="col">
                                                                        Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($list4 as $lists)
                                                                    @if ($lists->Room_No == $arrays['Room_No'])
                                                                        <tr>
                                                                            <td>{{ $lists->name }}</td>
                                                                            <td>{{ $lists->Quantity }}</td>
                                                                            <td>{{ $lists->Quantity_Requested }}</td>
                                                                            @if ($lists->Date_Requested != null)
                                                                                <td>{{ date('M j Y', strtotime($lists->Date_Requested)) }}
                                                                                    <br>
                                                                                    {{ date('H:i:s A', strtotime($lists->Date_Requested)) }}
                                                                                </td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                            <td>{{ $lists->Status }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Request Supply --}}
                                        <div id="request_supply{{ $arrays['Room_No'] }}" class="modal hide fade"
                                            tabindex="-1">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4"
                                                            id="exampleModalLabel">Room {{ $arrays['Room_No'] }} Request
                                                            Supplies
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ url('/supply_requests') }}" class="prevent_submit"
                                                        method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-left">Item Name</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="text-left">Quantity</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="text-left">Requested Quantity</p>
                                                                </div>
                                                            </div>
                                                            @foreach ($list4 as $lists)
                                                                @if ($lists->Room_No == $arrays['Room_No'] && $lists->Status != 'Requested')
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <input type="hidden" name="room_no"
                                                                                value="{{ $lists->Room_No }}" />
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $lists->name }}" readonly>
                                                                            <input type="hidden" name="name[]"
                                                                                value="{{ $lists->name }}">
                                                                            <input type="hidden" name="stats[]"
                                                                                value="{{ $lists->Status }}">
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $lists->Quantity }}" readonly>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="number" class="form-control"
                                                                                value="0"
                                                                                name="requested_quantity[]" />
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a data-dismiss="modal" class="btn">Close</a>
                                                            <input type="submit" value="Submit" name="submit"
                                                                class="btn btn-primary">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Archives --}}
                                <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-4-tab">

                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable4">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Housekeeping <br> Status</th>
                                                <th scope="col" style="font-size:18px;">Check In Date</th>
                                                <th scope="col" style="font-size:18px;">Check Out Date</th>
                                                <th scope="col" style="font-size:18px;"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($archived as $lists)
                                                <tr>
                                                    <td>{{ $lists->Room_No }}</td>
                                                    <td>{{ $lists->Facility_Type }}</td>
                                                    <td>{{ $lists->Housekeeping_Status }}</td>
                                                    <td>{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</td>
                                                    <td>{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#view4{{ $lists->ID }}"> <i
                                                                class="bi bi-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!--View-->
                                                <div class="modal fade" id="view4{{ $lists->ID }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-left display-4"
                                                                    id="exampleModalLabel">View Information</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="card-body bg-white"
                                                                        style="border-radius: 18px">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $lists->ID }}" />

                                                                        <p class="text-left">Booking No.: </p>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $lists->Booking_No }}" readonly>

                                                                        <p class="text-left">Guest Name: </p>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $lists->Guest_Name }}" readonly>

                                                                        <p class="text-left">Facility Status: </p>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $lists->Facility_Status }}"
                                                                            readonly>

                                                                        <p class="text-left">Front Desk Status: </p>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $lists->Front_Desk_Status }}"
                                                                            readonly>

                                                                        <p class="text-left">Attendant: </p>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $lists->Attendant }}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</a>
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
                $('#myTable3').DataTable();
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

            #row:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>

    </div>

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
