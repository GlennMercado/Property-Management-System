@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Housekeeping Dashboard</h6>
                @if (Auth::user()->User_Type == 'Admin')
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">Housekeeping</li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Housekeeping Dashboard</li>
                        </ol>
                    </nav>
                @elseif(Auth::user()->User_Type == 'Housekeeping Supervisor')
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('Housekeeping_Dashboard') }}"><i
                                        class="fas fa-home"></i></a></li>
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
                    <div class="card-header border-0">
                        <!-- Count Box -->
                        {{-- <div class="row mt-3">
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
                        </div> --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card bg-c-yellow order-card">
                                    <div class="card-block">
                                        <h4 class="m-b-20 text-white">Arrival</h4>
                                        <h2 class="text-right text-white">
                                            <i class="bi bi-box-arrow-in-up-left f-left"></i><span>
                                                @foreach ($arrival as $count)
                                                    {{ $count->cnt }}
                                                @endforeach
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h4 class="m-b-20 text-white">Supply Request</h4>
                                        <h2 class="text-right text-white">
                                            <i class="bi bi-box f-left"></i><span>
                                                @foreach ($supply as $count)
                                                    {{ $count->cnt }}
                                                @endforeach
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-primary order-card">
                                    <div class="card-block">
                                        <h4 class="m-b-20 text-white">Linen Request</h4>
                                        <h2 class="text-right text-white">
                                            <i class="bi bi-basket f-left"></i><span>
                                                @foreach ($linen as $count)
                                                    {{ $count->cnt }}
                                                @endforeach
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-orange order-card">
                                    <div class="card-block">
                                        <h4 class="m-b-20 text-white">Maintenance</h4>
                                        <h2 class="text-right text-white">
                                            <i class="bi bi-gear-fill f-left"></i><span>
                                                @foreach ($maintenance as $count)
                                                    {{ $count->cnt }}
                                                @endforeach
                                            </span>
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
                                    {{-- <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                            data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Arrival / Departure</a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-2-tab" data-toggle="tab"
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
                                {{-- <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
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
                                                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                                    data-target="#update{{ $lists->ID }}">
                                                                    <i class="bi bi-pencil-square"></i>
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
                                                                            @if ($lists->Facility_Status == 'Reserved')
                                                                                <h3 class="text-left">Room Status: <span
                                                                                        style="font-weight:normal; color: #5bc0de;">{{ $lists->Facility_Status }}</span>
                                                                                </h3>
                                                                            @elseif($lists->Facility_Status == 'Occupied')
                                                                                <h3 class="text-left">Room Status: <span
                                                                                        style="font-weight:normal; color: #d9534f;">{{ $lists->Facility_Status }}</span>
                                                                                </h3>
                                                                            @endif

                                                                            @if ($lists->Front_Desk_Status == 'Reserved')
                                                                                <h3 class="text-left">Front Desk Status:
                                                                                    <span
                                                                                        style="font-weight:normal; color: #5bc0de;">{{ $lists->Front_Desk_Status }}</span>
                                                                                </h3>
                                                                            @elseif($lists->Front_Desk_Status == 'Checked-In')
                                                                                <h3 class="text-left">Front Desk Status:
                                                                                    <span
                                                                                        style="font-weight:normal; color: #5cb85c;">{{ $lists->Front_Desk_Status }}</span>
                                                                                </h3>
                                                                            @elseif($lists->Front_Desk_Status == 'Checked-Out')
                                                                                <h3 class="text-left">Front Desk Status:
                                                                                    <span
                                                                                        style="font-weight:normal; color: #d9534f;">{{ $lists->Front_Desk_Status }}</span>
                                                                                </h3>
                                                                            @endif
                                                                            <h3 class="text-left">Booking Number: <span
                                                                                    style="font-weight:normal;">{{ $lists->Booking_No }}</span>
                                                                            </h3>
                                                                            <h3 class="text-left">Attendant: <span
                                                                                    style="font-weight:normal;">{{ $lists->Attendant }}</span>
                                                                            </h3>
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
                                                                                    @foreach ($housekeeper as $housekeepers)
                                                                                        <option
                                                                                            value="{{ $housekeepers->Housekeepers_Name }}">
                                                                                            {{ $housekeepers->Housekeepers_Name }}
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
                                                                    <a href="{{ url('/update_housekeeping_stats', ['hk' => $lists->Attendant, 'id' => $lists->ID, 'status' => 'Arrival', 'req' => $lists->Request_ID, 'rn' => $lists->Room_No]) }}"
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
                                </div> --}}

                                {{-- Task Assignment --}}
                                <div class="tab-pane fade show active" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Action</th>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Room Status</th>
                                                <th scope="col" style="font-size:18px;">Housekeeping Status</th>
                                                <th scope="col" style="font-size:18px;">Booking Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $index => $lists)
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

                                                            @if (
                                                                $lists->Housekeeping_Status == 'Out of Service' &&
                                                                    $lists->Attendant != 'Unassigned' &&
                                                                    $lists->Front_Desk_Status == 'Checked-Out')
                                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                                    data-target="#update{{ $lists->ID }}"
                                                                    title="Update Housekeeping Status">
                                                                    <i class="bi bi-arrow-repeat"></i>
                                                                </button>
                                                            @endif
                                                            @if ($lists->Housekeeping_Status == 'Checking for Maintenance')
                                                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                                    data-target="#outoforder{{ $lists->ID }}"
                                                                    title="Update Room to Out of Order">
                                                                    <i class="bi bi-tools"></i> </button>
                                                            @endif

                                                            @if ($lists->Housekeeping_Status == 'Inspect' && $lists->Attendant != 'Unassigned')
                                                                <button class="btn btn-sm"
                                                                    style="background: #9FA6B2;  color:white;"
                                                                    data-toggle="modal"
                                                                    data-target="#room_check{{ $lists->ID }}"
                                                                    title="Checking Room">
                                                                    <i class="bi bi-list-check"></i>
                                                                </button>
                                                            @endif

                                                            {{-- @if ($lists->Housekeeping_Status == 'Inspect(After Checking)' && $lists->Attendant != 'Unassigned')
                                                                <button class="btn btn-sm"
                                                                    style="background: #9FA6B2;  color:white;"
                                                                    data-toggle="modal"
                                                                    data-target="#check_linen{{ $lists->ID }}"
                                                                    title="Checking Room Linen">
                                                                    <i class="bi bi-check2-square"></i>
                                                                </button>
                                                            @endif --}}
                                                        </td>
                                                        <td>{{ $lists->Room_No }}</td>
                                                        <td>{{ $lists->Facility_Type }}</td>
                                                        <td>{{ $lists->Facility_Status }}</td>
                                                        <td>{{ $lists->Housekeeping_Status }}</td>
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
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $lists->ID }}" />
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <h3 class="text-left">Booking Number:
                                                                                    </h3>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <span
                                                                                        style="font-weight:normal;">{{ $lists->Booking_No }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <h3 class="text-left">Guest Name: </h3>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <span
                                                                                        style="font-weight:normal;">{{ $lists->Guest_Name }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <h3 class="text-left">Housekeeping
                                                                                        Status:</h3>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <span
                                                                                        style="font-weight:normal;">{{ $lists->Housekeeping_Status }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <h3 class="text-left">Attendant:</h3>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <span
                                                                                        style="font-weight:normal;">{{ $lists->Attendant }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <h3 class="text-left">Checked-In Date:
                                                                                    </h3>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <span
                                                                                        style="font-weight:normal; color: #5cb85c;">{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <h3 class="text-left">Check-Out Date:
                                                                                    </h3>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <span
                                                                                        style="font-weight:normal; color: #d9534f;">{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</span>
                                                                                </div>
                                                                            </div>


                                                                            <br>
                                                                            @if ($lists->Request_ID != null)
                                                                                @foreach ($list2 as $lists2)
                                                                                    <input type="hidden" name="guest_id"
                                                                                        value="{{ $lists2->Request_ID }}" />
                                                                                    <h3 class="text-left">Guest Request
                                                                                    </h3>

                                                                                    <h3 class="text-left">Request: <span
                                                                                            style="font-weight:normal;">{{ $lists2->Request }}</span>
                                                                                    </h3>
                                                                                    <h3 class="text-left">Date Requested:
                                                                                        <span
                                                                                            style="font-weight:normal;">{{ date('F j, Y', strtotime($lists2->Date_Requested)) }}</span>
                                                                                    </h3>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-danger"
                                                                        data-dismiss="modal">Close</button>
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
                                                                                    @foreach ($housekeeper as $housekeepers)
                                                                                        <option
                                                                                            value="{{ $housekeepers->Housekeepers_Name }}">
                                                                                            {{ $housekeepers->Housekeepers_Name }}
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

                                                                        <h3 class="text-left">Maintenance Status <br> (is
                                                                            it under maintenance?)</h3>
                                                                        <select name="maintenance_stats" id="main_stats"
                                                                            class="form-control"
                                                                            data-list-index="{{ $index }}"
                                                                            required>
                                                                            <option value="" selected="selected"
                                                                                disabled="disabled">Select</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                        <div id="cont_{{ $index }}"
                                                                            style="display:none;">
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

                                                                                    <input type="hidden"
                                                                                        name="facility_type"
                                                                                        value="Hotel Room" />

                                                                                    <input type="hidden"
                                                                                        name="discoveredby"
                                                                                        value="{{ $lists->Attendant }}" />

                                                                                </div>
                                                                                <div class="col">
                                                                                    <p class="text-left">Priority Level</p>
                                                                                    <select name="priority"
                                                                                        class="form-control"
                                                                                        id="prio_{{ $index }}">
                                                                                        <option selected="true"
                                                                                            disabled="disabled">
                                                                                            Select</option>
                                                                                        <option value="Low">Low</option>
                                                                                        <option value="Moderate">Moderate
                                                                                        </option>
                                                                                        <option value="High">High
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <p class="text-left">Description</p>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="description"
                                                                                        id="desc_{{ $index }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <p class="text-left">Cost</p>
                                                                                    <input type="number" name="cost"
                                                                                        class="form-control"
                                                                                        id="cost_{{ $index }}">
                                                                                </div>
                                                                                <div class="col">
                                                                                    <p class="text-left">Due Date</p>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        name="due_date"
                                                                                        id="due_{{ $index }}" />
                                                                                </div>
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
                                                                    <a href="{{ url('/update_housekeeping_stats', ['hk' => $lists->Attendant, 'id' => $lists->ID, 'status' => 'Cleaned', 'req' => $lists->Request_ID, 'rn' => $lists->Room_No]) }}"
                                                                        class="btn btn-success">Yes</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @foreach ($list as $lists)
                                        @if ($lists->Front_Desk_Status != 'Reserved')
                                            {{-- Room Checking --}}
                                            <div id="room_check{{ $lists->ID }}" class="modal hide fade"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">Room
                                                                {{ $lists->Room_No }}
                                                                Checking
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ url('/room_checked') }}" class="prevent_submit"
                                                            method="POST" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <h3 class="text-left">Supplies</h3>
                                                                <table class="table align-items-center table-flush"
                                                                    id="myTable_roomchecking">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th>Item Name</th>
                                                                            <th>Quantity</th>
                                                                            <th>Deduction</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($list4 as $lists2)
                                                                            @if ($lists2->Room_No == $lists->Room_No)
                                                                                <tr>
                                                                                    <input type="hidden" name="room_no"
                                                                                        value="{{ $lists2->Room_No }}" />
                                                                                    <input type="hidden"
                                                                                        name="supply_name[]"
                                                                                        value="{{ $lists2->name }}">
                                                                                    <input type="hidden"
                                                                                        name="supply_price[]"
                                                                                        value="{{ $lists2->Price }}">
                                                                                    <input type="hidden"
                                                                                        name="supply_prodid[]"
                                                                                        value="{{ $lists2->productid }}">
                                                                                    <input type="hidden" name="book_num"
                                                                                        value="{{ $lists->Booking_No }}">
                                                                                    <input type="hidden"
                                                                                        name="supply_quantity[]"
                                                                                        value="{{ $lists2->Quantity }}" />
                                                                                    <td>{{ $lists2->name }}</td>
                                                                                    <td>{{ $lists2->Quantity }}</td>
                                                                                    <td><input type="number"
                                                                                            class="form-control"
                                                                                            name="supply_deduction[]"
                                                                                            value="0"
                                                                                            style="width:50%;" /></td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <br><br>
                                                                <h3 class="text-left">Linen</h3>
                                                                <table class="table align-items-center table-flush"
                                                                    id="myTable_roomchecking">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th>Item Name</th>
                                                                            <th>Quantity</th>
                                                                            <th>Discrepancy</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($list5 as $lists2)
                                                                            @if ($lists2->Room_No == $lists->Room_No)
                                                                                <tr>

                                                                                    <input type="hidden"
                                                                                        name="linen_prodid[]"
                                                                                        value="{{ $lists2->productid }}">

                                                                                    <input type="hidden"
                                                                                        name="linen_name[]"
                                                                                        value="{{ $lists2->name }}">

                                                                                    <input type="hidden"
                                                                                        name="linen_quantity[]"
                                                                                        value="{{ $lists2->Quantity }}" />
                                                                                    <input type="hidden"
                                                                                        name="linen_current_discrepancy[]"
                                                                                        value="{{ $lists2->Discrepancy }}" />

                                                                                    <td>{{ $lists2->name }}</td>
                                                                                    <td>{{ $lists2->Quantity }}</td>
                                                                                    <td> <input type="number"
                                                                                            class="form-control"
                                                                                            name="linen_discrepancy[]"
                                                                                            value="0"
                                                                                            style="width:50%;" /></td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
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
                                        @endif
                                    @endforeach
                                </div>

                                {{-- Supply Request --}}
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-3-tab">
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;"></th>
                                                <th scope="col" style="font-size:18px;">Room No</th>
                                                <th scope="col" style="font-size:18px;">Attendant</th>
                                                <th scope="col" style="font-size:18px;">Room Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list3 as $lists)
                                                <tr>
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
                                                    <td>{{ $lists->Room_No }}</td>
                                                    <td>{{ $lists->Attendant }}</td>
                                                    @if ($lists->rstats == 'Occupied')
                                                        <td class="text-danger">{{ $lists->rstats }}</td>
                                                    @else
                                                        <td class="text-success">{{ $lists->rstats }}</td>
                                                    @endif

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
                                                                                    @foreach ($housekeeper as $housekeepers)
                                                                                        <option
                                                                                            value="{{ $housekeepers->Housekeepers_Name }}">
                                                                                            {{ $housekeepers->Housekeepers_Name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a class="btn btn-outline-danger"
                                                                            data-dismiss="modal">Close</a>
                                                                        <input type="submit"
                                                                            class="btn btn-success prevent_submit"
                                                                            value="Assign" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @endforeach
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
                                                            <button data-dismiss="modal"
                                                                class="btn btn-outline-danger">Close</button>
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
                                                <th scope="col" style="font-size:18px;"> </th>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Housekeeping <br> Status</th>
                                                <th scope="col" style="font-size:18px;">Check In Date</th>
                                                <th scope="col" style="font-size:18px;">Check Out Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($archived as $lists)
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#view4{{ $lists->ID }}"> <i
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
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h3 class="text-left">Booking Number:</h3>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <span
                                                                                    style="font-weight:normal;">{{ $lists->Booking_No }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h3 class="text-left">Guest Name:</h3>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <span
                                                                                    style="font-weight:normal;">{{ $lists->Guest_Name }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h3 class="text-left">Room Status:</h3>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <span
                                                                                    style="font-weight:normal;">{{ $lists->Facility_Status }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h3 class="text-left">Front Desk Status:
                                                                                </h3>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <span
                                                                                    style="font-weight:normal;">{{ $lists->Front_Desk_Status }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h3 class="text-left">Attendant:</h3>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <span
                                                                                    style="font-weight:normal;">{{ $lists->Attendant }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-outline-danger"
                                                                    data-dismiss="modal">Close</button>
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
            $(document).ready(function() {
                $('select[name="maintenance_stats"]').change(function() {
                    var selected = $("option:selected", this).val();
                    var listIndex = $(this).data('list-index');

                    if (selected == "Yes") {
                        $('#cont_' + listIndex).css({
                            'display': 'block'
                        });

                        $('#prio_' + listIndex).prop('required', true);
                        $('#desc_' + listIndex).prop('required', true);
                        $('#cost_' + listIndex).prop('required', true);
                        $('#due_' + listIndex).prop('required', true);
                    } else {
                        $('#cont_' + listIndex).css({
                            'display': 'none'
                        });

                        $('#prio_' + listIndex).prop('required', false);
                        $('#desc_' + listIndex).prop('required', false);
                        $('#cost_' + listIndex).prop('required', false);
                        $('#due_' + listIndex).prop('required', false);

                        $('#prio_' + listIndex).prop('selected', true);
                        $('#desc_' + listIndex).val('');
                        $('#cost_' + listIndex).val('');
                        $('#due_' + listIndex).val('');
                    }
                });
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

            .bg-c-blue {
                background: linear-gradient(45deg, #3593ff, #61abff);
            }

            .bg-c-green {
                background: linear-gradient(45deg, #2bcaaa, #4dd7bc);
            }

            .bg-c-yellow {
                background: linear-gradient(45deg, #f7aa3e, #f8b960);
            }

            .bg-c-pink {
                background: linear-gradient(45deg, #ff4564, #fe7189);
            }


            .card {
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
                box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
                border: none;
                margin-bottom: 30px;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            .card .card-block {
                padding: 25px;
            }

            .order-card i {
                font-size: 26px;
            }

            .f-left {
                float: left;
            }

            .f-right {
                float: right;
            }
        </style>

    </div>

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
