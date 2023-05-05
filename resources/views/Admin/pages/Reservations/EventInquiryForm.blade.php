@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    {{-- calendar --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Event Management</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Sales & Marketing</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Event Inquiry
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow rounded" style="padding:15px;">
                    <h1 class="p-4">
                        EVENT CALENDAR
                    </h1>
                    <div id="calendar"></div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow rounded">
                    @foreach ($list4 as $lists)
                        <div class="d-flex flex-row">
                            <h3 class="p-4"><i class="bi bi-circle-fill text-green"></i> Ongoing Event</h3>
                        </div>
                        <div class="col-md-12 card-tal">
                            <div class="container-fluid card-tal-con">
                                <div class="row">
                                    <div class="col-6">
                                        <hr style="background-color: white;border-top: 2px solid rgb(255 255 255);">
                                    </div>
                                    <div class="col-6">
                                        <h2 class="text-white">Event name: {{ $lists->event_name }}</h2>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{ asset('nvdcpics') }}/convention3.png" class="img-fluid"
                                            style="width:100%">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pt-2 pt-md-1">
                                            <h3 class="text-white">Event type: {{ $lists->event_type }}</h3>
                                            <p>
                                                <i class="bi bi-building"></i>
                                                Facility: {{ $lists->facility }}
                                            </p>
                                            <p>
                                                <i class="bi bi-people-fill"></i>
                                                Expected guests: {{ $lists->num_of_guest }}
                                            </p>
                                            <p>
                                                <i class="bi bi-clock-fill"></i>
                                                {{ date('g:i A', strtotime($lists->start_time)) }} -
                                                {{ date('g:i A', strtotime($lists->end_time)) }}
                                            </p>
                                            <p>
                                                <i class="bi bi-calendar-check-fill text-white"></i>
                                                {{ \Carbon\Carbon::parse($lists->start_date)->format('l, F jS, Y') }} -
                                                {{ \Carbon\Carbon::parse($lists->end_date)->format('l, F jS, Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-6"></div>
                                    <div class="col-10 col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div style="background: linear-gradient(45deg, #2bcaaa, #3ec5aa);">
                            <div class="d-flex justify-content-center">
                                <h3 class="m-2 text-white">
                                    <i class="bi bi-calendar-check-fill text-white"></i>
                                    {{ \Carbon\Carbon::parse($lists->start_date)->format('l, F jS, Y') }} -
                                    {{ \Carbon\Carbon::parse($lists->end_date)->format('l, F jS, Y') }}
                                </h3>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h3 class="m-2 text-white"><i class="bi bi-clock-fill"></i>
                                    {{ date('g:i A', strtotime($lists->start_time)) }} -
                                    {{ date('g:i A', strtotime($lists->end_time)) }}
                                </h3>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h1 class="text-white mt-2">
                                    Event name: ML TOURNA
                                </h1>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <p class="font-weight-bold text-white">
                                    Event type: bday
                                    <br>
                                    Number of guest: 25
                                </p>
                            </div>
                        </div> --}}
                        <div class="d-flex justify-content-center">
                            <h2 class="p-2">~ Upcomming events ~</h2>
                        </div>
                        <div style="overflow-y: scroll; max-height: 170px">
                            @foreach ($list3 as $lists3)
                                <div class="shadow mt--3">
                                    <div class="d-flex flex-row">
                                        <h3 class="p-4">
                                            {{ $lists3->event_name }}
                                        </h3>
                                        <p class="p-4">
                                            <i class="bi bi-calendar-check-fill"></i>
                                            {{ \Carbon\Carbon::parse($lists3->start_date)->format('l, F jS, Y') }} -
                                            {{ \Carbon\Carbon::parse($lists3->end_date)->format('l, F jS, Y') }}
                                            <br>
                                            <i class="bi bi-clock-fill"></i>
                                            {{ date('g:i A', strtotime($lists3->start_time)) }} -
                                            {{ date('g:i A', strtotime($lists3->end_time)) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            @if (!$list3)
                                <img src="{{ asset('nvdcpics') }}/complaints1.svg" class="img-fluid"
                                    style="width: 100%; max-height: 140px">
                                <p class="font-weight-bold text-center">There are no upcomming events yet</p>
                            @endif
                        </div>
                    @endforeach
                    @if (!$list4)
                        <img src="{{ asset('nvdcpics') }}/complaints1.svg" class="img-fluid"
                            style="width: 100%; height: 300px">
                        <p class="text-center display-5">There are no events yet</p>
                    @endif
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card shadow rounded">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col text-right">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                            data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Event Inquiries</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"> Event list </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    <h1>Event Inquiries</h1>
                                    <form action="{{ url('/inquiry_reports') }}" target="blank" method="get">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="p-2">
                                                <label for="start_date">Start Date:</label>
                                                <input type="date" class="form-control" id="start_date"
                                                    name="start_date" required>
                                            </div>
                                            <div class="p-2">
                                                <label for="end_date">End Date:</label>
                                                <input type="date" class="form-control" id="start_date"
                                                    name="end_date" required>
                                            </div>
                                            <div class="p-2">
                                                <label>Generate report:</label>
                                                <button type="submit" class="btn btn-success w-75 h-50">Print
                                                    <i class="bi bi-printer-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:16px;">Action</th>
                                                <th scope="col" style="font-size:16px;">Created At</th>
                                                <th scope="col" style="font-size:16px;">Client Information</th>
                                                <th scope="col" style="font-size:16px;">Event Details</th>
                                                <th scope="col" style="font-size:16px;">Inquiry Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $lists)
                                                <tr>
                                                    <td>
                                                        <a href="{{ url('/event_view', ['id' => $lists->id]) }}"
                                                            target="blank" class="btn btn-sm btn-success"
                                                            style="cursor:pointer;" data-toggle="tooltip"
                                                            data-placement="top" title="View">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                        @if ($lists->inquiry_status != 'Declined')
                                                            <button data-toggle="modal"
                                                                data-target="#Modalstatus{{ $lists->id }}"
                                                                class="btn btn-sm btn-primary" style="cursor:pointer;"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Status">
                                                                <i class="bi bi-pencil"></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $lists->created_at }}
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">
                                                            Client Name: </span>
                                                        {{ $lists->client_name }}
                                                        <br>
                                                        <span class="font-weight-bold">
                                                            Contact No.:</span>
                                                        {{ $lists->contact_no }}
                                                        <br>
                                                        <span class="font-weight-bold">
                                                            Billing Address:</span>
                                                        {{ $lists->billing_address }}
                                                        <br>
                                                        <span class="font-weight-bold">
                                                            Email Address:</span>
                                                        {{ $lists->email_address }}
                                                        <br>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">
                                                            Event Name:</span>
                                                        {{ $lists->event_name }}
                                                        <br>
                                                        <span class="font-weight-bold">
                                                            Facility:</span>
                                                        {{ $lists->facility }}
                                                        <br>
                                                        <span class="font-weight-bold">
                                                            Event Type:</span>
                                                        {{ $lists->event_type }}
                                                        <br>
                                                        <span class="font-weight-bold">
                                                            Event Date:</span>
                                                        {{ $lists->event_date }}
                                                        <br>
                                                        <span class="font-weight-bold">
                                                            No of Guest:</span>
                                                        {{ $lists->no_of_guest }}
                                                        <br>
                                                        <span class="font-weight-bold">
                                                            Caterer:</span>
                                                        {{ $lists->caterer }}
                                                        <br>
                                                        <span class="font-weight-bold">
                                                            Audio/Visual:</span>
                                                        {{ $lists->audio_visual }}
                                                        <br>
                                                        <span class="font-weight-bold">
                                                            Concept and Styling:</span>
                                                        {{ $lists->concept }}
                                                        <br>
                                                    </td>
                                                    <td>
                                                        @if ($lists->inquiry_status == 'Approved')
                                                            <span class="badge-lg rounded badge-success font-weight-bold">
                                                                {{ $lists->inquiry_status }}
                                                            </span>
                                                        @endif
                                                        @if ($lists->inquiry_status == 'Declined')
                                                            <span class="badge-lg rounded badge-danger font-weight-bold">
                                                                {{ $lists->inquiry_status }}
                                                            </span>
                                                        @endif
                                                        @if ($lists->inquiry_status == 'For Approval')
                                                            <span class="badge-lg rounded badge-info font-weight-bold">
                                                                {{ $lists->inquiry_status }}
                                                            </span>
                                                        @endif
                                                        @if ($lists->inquiry_status == 'For Interview')
                                                            <span class="badge-lg rounded badge-success font-weight-bold">
                                                                {{ $lists->inquiry_status }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <div class="modal fade text-left" id="Modalstatus{{ $lists->id }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title">{{ __('Add Details') }}</h2>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" action="{{ url('/event_approval') }}"
                                                                enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div class="container">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <input class="form-control" type="text"
                                                                                    name="id"
                                                                                    value="{{ $lists->id }}" hidden>
                                                                                <p>Inquiry Status</p>
                                                                                <select name="event_status"
                                                                                    class="form-control" required>
                                                                                    <option selected disabled
                                                                                        value="">
                                                                                        Select</option>
                                                                                    <option value="For Interview">Event
                                                                                        Approved
                                                                                    </option>
                                                                                    <option value="Approved">Approved
                                                                                    </option>
                                                                                    <option value="Declined">Declined
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer pt-4">
                                                                            <button class="btn btn-outline-danger"
                                                                                data-dismiss="modal">Close</button>
                                                                            <input type="submit" name="update"
                                                                                value="Add" class="btn btn-success" />
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <div class="d-flex flex-row">
                                        <h1>Event List</h1>
                                        <div class="col text-right">
                                            <a class="btn bg-green text-white" data-toggle="modal" data-target="#event">
                                                Add Event
                                            </a>
                                        </div>
                                    </div>
                                    <form action="{{ url('/event_reports') }}" target="blank" method="get">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="p-2">
                                                <label for="start_date">Start Date:</label>
                                                <input type="date" class="form-control" id="start_date"
                                                    name="start_date" required>
                                            </div>
                                            <div class="p-2">
                                                <label for="end_date">End Date:</label>
                                                <input type="date" class="form-control" id="start_date"
                                                    name="end_date" required>
                                            </div>
                                            <div class="p-2">
                                                <label>Generate report:</label>
                                                <button type="submit" class="btn btn-success w-75 h-50">Print
                                                    <i class="bi bi-printer-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:16px;">ACTION</th>
                                                <th scope="col" style="font-size:16px;">ID</th>
                                                <th scope="col" style="font-size:16px;">EVENT NAME</th>
                                                <th scope="col" style="font-size:16px;">TIME</th>
                                                <th scope="col" style="font-size:16px;">START DATE</th>
                                                <th scope="col" style="font-size:16px;">END DATE</th>
                                                <th scope="col" style="font-size:16px;">EVENT TYPE</th>
                                                <th scope="col" style="font-size:16px;">FACILITY</th>
                                                <th scope="col" style="font-size:16px;">CLIENT NAME</th>
                                                <th scope="col" style="font-size:16px;">CONTACT NUMBER</th>
                                                <th scope="col" style="font-size:16px;">NO. OF GUEST</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list5 as $lists)
                                                <tr>
                                                    <td>
                                                        <button data-toggle="modal"
                                                            data-target="#Modalstatus{{ $lists->id }}"
                                                            class="btn btn-sm btn-primary" style="cursor:pointer;"
                                                            data-toggle="tooltip" data-placement="top" title="Status">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                    </td>
                                                    <td>{{ $lists->id }}</td>
                                                    <td>{{ $lists->event_name }}</td>
                                                    <td>{{ date('h:i:s A', strtotime($lists->start_time)) . ' - ' . date('h:i:s A', strtotime($lists->end_time)) }}
                                                    </td>
                                                    <td>{{ date('F j, Y', strtotime($lists->start_date)) }}</td>
                                                    <td>{{ date('F j, Y', strtotime($lists->end_date)) }}</td>
                                                    <td>{{ $lists->event_type }}</td>
                                                    <td>{{ $lists->facility }}</td>
                                                    <td>{{ $lists->client_name }}</td>
                                                    <td>{{ $lists->contact_number }}</td>
                                                    <td>{{ $lists->num_of_guest }}</td>
                                                </tr>
                                                <div class="modal fade text-left" id="Modalstatus{{ $lists->id }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title">{{ __('Add Event') }}</h2>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" action="{{ url('/event_approval') }}"
                                                                enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div class="container">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <input class="form-control" type="text"
                                                                                    name="id"
                                                                                    value="{{ $lists->id }}" hidden>
                                                                                <p>Inquiry Status</p>
                                                                                <select name="event_status"
                                                                                    class="form-control" required>
                                                                                    <option selected disabled
                                                                                        value="">
                                                                                        Select</option>
                                                                                    <option value="Event Approved">Event
                                                                                        Approved
                                                                                    </option>
                                                                                    <option value="Approved">Approved
                                                                                    </option>
                                                                                    <option value="Declined">Declined
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer pt-4">
                                                                            <button class="btn btn-outline-danger"
                                                                                data-dismiss="modal">Close</button>
                                                                            <input type="submit" name="update"
                                                                                value="Add" class="btn btn-success" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- modal --}}
                                    <div class="modal fade" id="event" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                                        Add Event
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('/add_event') }}" class="prevent_submit"
                                                    method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="card-body bg-white" style="border-radius: 18px">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h3 class="mt-2">Event Name</h3>
                                                                        <input type="text"
                                                                            placeholder="Enter event name"
                                                                            class="form-control" name="event_name">
                                                                        <h3 class="mt-2">Facility</h3>
                                                                        <select id="mySelect" name="facility"
                                                                            class="form-control" required>
                                                                            <option value="">Select an option
                                                                            </option>
                                                                            <option value="Convention Center">
                                                                                Convention
                                                                                Center
                                                                                (150,000/8hrs)
                                                                            </option>
                                                                            <option value="Up to lower box bleachers only">
                                                                                Up to lower box
                                                                                bleachers only
                                                                                (130,000/8hrs)</option>
                                                                            <option value="Courtside">Courtside
                                                                                (80,000/8hrs)
                                                                            </option>
                                                                            <option
                                                                                value="Basketball practice games (non-aircon)">
                                                                                Basketball practice
                                                                                games
                                                                                (non-aircon) (1,200/1hr)</option>
                                                                            <option
                                                                                value="Basketball practice games (aircon)">
                                                                                Basketball practice
                                                                                games
                                                                                (aircon) (2,000/1hr)</option>
                                                                            <option value="Function Room A">Function Room A
                                                                                (13,500/4hrs)
                                                                            </option>
                                                                            <option value="Function Room B">Function Room B
                                                                                (14,500/4hrs)
                                                                            </option>
                                                                            <option value="Function Room C">Function Room C
                                                                                (14,500/4hrs)
                                                                            </option>
                                                                            <option value="Function Room D">Function Room D
                                                                                (13,500/4hrs)
                                                                            </option>
                                                                            <option value="Function Room E">Function Room E
                                                                                (10,000/4hrs)
                                                                            </option>
                                                                            <option value="Function Room F">Function Room F
                                                                                (25,000/4hrs)
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h3 class="mt-2">Start date</h3>
                                                                        <input type="date" name="start_date"
                                                                            id="myStartDateInput"
                                                                            class="form-control chck" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h3 class="mt-2">End date</h3>
                                                                        <input type="date" name="end_date"
                                                                            id="myEndDateInput" class="form-control chck"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h3 class="mt-2">Start time</h3>
                                                                        <input type="time" name="start_time"
                                                                            id="myStartTimeInput" class="form-control"
                                                                            required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h3 class="mt-2">End Time</h3>
                                                                        <input type="time" name="end_time"
                                                                            id="myEndTimeInput" class="form-control"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h3 class="mt-2">Event type</h3>
                                                                        <select name="event_type" class="form-control"
                                                                            required>
                                                                            <option value="Entertainment Events">
                                                                                Entertainment
                                                                                Events</option>
                                                                            <option value="Social/Lifecycle Events">
                                                                                Social/Lifecycle Events</option>
                                                                            <option value="Corporate Events">Corporate
                                                                                Events
                                                                            </option>
                                                                            <option value="Sports Event">Sports Event
                                                                            </option>
                                                                            <option value="Religious Events">Religious
                                                                                Events
                                                                            </option>
                                                                            <option value="Educational Events">Educational
                                                                                Events
                                                                            </option>
                                                                            <option value="Political Event">Political Event
                                                                            </option>
                                                                            <option value="Charitable/Func Raising Events">
                                                                                Charitable/Func Raising Events
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h3 class="mt-2">Client name</h3>
                                                                        <input type="text" name="client_name"
                                                                            placeholder="Enter name of client"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h3 class="mt-2">Client contact no.</h3>
                                                                        <input type="number" name="contact"
                                                                            placeholder="Enter phone number of client"
                                                                            id="myPhoneNumberInput" class="form-control"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h3 class="mt-2">No. of guest</h3>
                                                                        <input type="number" name="guest_num"
                                                                            placeholder="Enter number of expected guest"
                                                                            maxlength="3" id="myNumberInput"
                                                                            class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="payment" id="totalCosts">
                                                                <h3 class="mt-4">Total Payment</h3>
                                                                <h1 class="text-green ml-auto" id="totalCost"></h1>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-outline-danger"
                                                                data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-success prevent_submit"
                                                                value="Add" name="submit">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 
    <div class="modal fade" id="AddEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Hotel Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Event Name</p>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <p>Event Type</p>
                            <select name="no_of_beds" class="form-control" required>
                                <option selected disabled value="">Select</option>
                                <option value="">Event 1</option>
                                <option value="">Event 2</option>
                                <option value="">Event 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Facility</p>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <p>Contact Person</p>
                            <input type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Contact Person</p>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <p>Contact Date</p>
                            <input type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <p>Event Time</p>
                            <input type="number" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                </div>
            </div>
        </div>
    </div> --}}
    <script>
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var theEvent = @json($events);

            $('#calendar').fullCalendar({
                // editable: true,
                header: {
                    left: 'prev,next, today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                defaultView: 'month',
                timeFormat: 'h:mm',
                events: theEvent,
                eventTextColor: 'white',
                eventDisplay: 'block',
                contentHeight: 450,
            });

        });



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

        .fc-event {
            cursor: pointer;
        }

        .myCalendar {
            cursor: pointer;
        }

        /* remove up and down button inside form */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

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

        #totalCost::before {
            content: '₱ ';
        }

        .card-tal .card-tal-con {
            background-color: #339c79cb;
            height: 100%;
            color: white;
            padding-top: 20px;
            padding-bottom: 10px;
        }
    </style>
    <script>
        const maxLength = 4; // set maximum length here
        const myNumberInput = $('#myNumberInput');

        myNumberInput.on('input', function() {
            if (this.value.length > maxLength) {
                this.value = this.value.slice(0, maxLength);
            }
        });

        const maxLength1 = 11; // set maximum length here
        const myNumberInput1 = $('#myPhoneNumberInput');

        myNumberInput1.on('input', function() {
            if (this.value.length > maxLength1) {
                this.value = this.value.slice(0, maxLength1);
            }
        });
    </script>
    <script>
        $('#mySelect, #myStartDateInput, #myStartTimeInput, #myEndDateInput, #myEndTimeInput').on('input', function() {
            const selectValue = $('#mySelect').val();
            const startDateValue = $('#myStartDateInput').val();
            const startTimeValue = $('#myStartTimeInput').val();
            const endDateValue = $('#myEndDateInput').val();
            const endTimeValue = $('#myEndTimeInput').val();

            // Calculate duration in hours
            const startDateTime = new Date(`${startDateValue}T${startTimeValue}:00`);
            const endDateTime = new Date(`${endDateValue}T${endTimeValue}:00`);
            const durationInHours = (endDateTime - startDateTime) / (60 * 60 * 1000);

            let totalCost = 0;

            let totals = document.getElementById('totalCost');
            // Calculate total cost based on selected option
            switch (selectValue) {
                case 'Convention Center':
                    totalCost = 150000 * durationInHours / 8;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                case 'Up to lower box bleachers only':
                    totalCost = 130000 * durationInHours / 8;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                case 'Courtside':
                    totalCost = 80000 * durationInHours / 8;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                case 'Basketball practice games (non-aircon)':
                    totalCost = 1200 * durationInHours;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                case 'Basketball practice games (aircon)':
                    totalCost = 2000 * durationInHours;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                case 'Function Room A':
                    totalCost = 13500 * durationInHours / 4;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                case 'Function Room B':
                    totalCost = 14500 * durationInHours / 4;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                case 'Function Room C':
                    totalCost = 14500 * durationInHours / 4;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                case 'Function Room D':
                    totalCost = 13500 * durationInHours / 4;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                case 'Function Room E':
                    totalCost = 10000 * durationInHours / 4;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                case 'Function Room F':
                    totalCost = 25000 * durationInHours / 4;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
                    break;
                default:
                    totalCost = 0;
                    totals.innerHTML = totalCost.toLocaleString('en-US');
                    $('#totalCosts').val(totalCost);
            }
        });

        $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
            var dateToday = new Date();
            var month = dateToday.getMonth() + 1;
            var day = dateToday.getDate();
            var year = dateToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('.chck').attr('min', maxDate);
        });
    </script>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
