@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

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
                <div class="card shadow rounded">
                    <h1 class="p-4">
                        CALENDAR
                    </h1>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow rounded">
                    <div class="d-flex flex-row">
                        <h2 class="p-4"><i class="bi bi-circle-fill text-green"></i> Ongoing Event</h2>
                        <h2 class="p-4 ml-auto"><i class="bi bi-clock-fill text-success"></i> 7:00AM</h2>
                        <h2 class="p-4 ml-auto"><i class="bi bi-calendar-check-fill text-success"></i> 12/12/12</h2>
                    </div>
                    <div class="bg-green">
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
                    </div>
                    <div class="d-flex justify-content-center">
                        <h2 class="p-2">~ Upcomming events ~</h2>
                    </div>
                    <div style="overflow-y: scroll; height:180px;">
                        <div class="shadow mt--3">
                            <div class="d-flex flex-row">
                                <h3 class="p-4">
                                    Basketball practice
                                </h3>
                                <h3 class="p-4">
                                    Sunday - 7:00AM
                                </h3>
                            </div>
                        </div>
                        <div class="shadow mt--3">
                            <div class="d-flex flex-row">
                                <h3 class="p-4">
                                    Basketball practice
                                </h3>
                                <h3 class="p-4">
                                    Sunday - 7:00AM
                                </h3>
                            </div>
                        </div>
                        <div class="shadow mt--3">
                            <div class="d-flex flex-row">
                                <h3 class="p-4">
                                    Basketball practice
                                </h3>
                                <h3 class="p-4">
                                    Sunday - 7:00AM
                                </h3>
                            </div>
                        </div>
                    </div>
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
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Events</a>
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
                                    <h1 class="p-3">Event Inquiries</h1>
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
                                    <table class="table align-items-center table-flush" id="myTable">
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
                                                            Contact Person:</span>
                                                        {{ $lists->contact_person }}
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
                                                            Venue:</span>
                                                        {{ $lists->venue }}
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
                                                        @if ($lists->inquiry_status == 'Event Approved')
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
                                    <h1 class="p-3">Event List</h1>
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
                                    <table class="table align-items-center table-flush" id="myTable">
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
                                            @foreach ($list1 as $lists)
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
                                                            Contact Person:</span>
                                                        {{ $lists->contact_person }}
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
                                                            Venue:</span>
                                                        {{ $lists->venue }}
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
                                                        @if ($lists->inquiry_status == 'Event Approved')
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
                                                            </form>
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
    </div>


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
    </div>
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
