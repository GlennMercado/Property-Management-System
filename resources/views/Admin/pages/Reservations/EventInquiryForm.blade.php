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
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"> Archive </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary mt-4" data-toggle="modal"
                            data-target="#AddEvent" style="float:right">
                            Add Event
                        </button>      
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                {{-- Events --}}
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">

                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:16px;">Action</th>
                                                <th scope="col" style="font-size:16px;">Event Name</th>
                                                <th scope="col" style="font-size:16px;">Event Type</th>
                                                <th scope="col" style="font-size:16px;">Contact Person</th>
                                                <th scope="col" style="font-size:16px;">Contact Number</th>
                                                <th scope="col" style="font-size:16px;">Event Date</th>
                                                <th scope="col" style="font-size:16px;">Booking Status</th>
                                            </tr>
                                        </thead>
                                        @foreach ($list as $lists)
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="{{ url('/event_view', ['id' => $lists->id]) }}" target="blank"
                                                        class="btn btn-sm btn-success" style="cursor:pointer;"
                                                        data-toggle="tooltip" data-placement="top" title="View">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a data-toggle="modal"
                                                    data-target="#Modalstatus{{ $lists->id }}"
                                                        class="btn btn-sm btn-success" style="cursor:pointer;"
                                                        data-toggle="tooltip" data-placement="top" title="Status">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                </td>
                                                <td><span class="font-weight-bold">Event Name: </span> {{ $lists->event_name }}</td>
                                                <td><span class="font-weight-bold">Event Type:</span> {{ $lists->event_type }}</td>
                                                <td><span class="font-weight-bold">Contact Person: </span>{{ $lists->contact_person }}</td>
                                                <td><span class="font-weight-bold">Contact Number: </span> {{ $lists->contact_person_no }}</td>
                                                <td><span class="font-weight-bold">Event Date: </span>
                                                    {{ $lists->event_date }}
                                                    <br>
                                                    <span class="font-weight-bold">No. of Guest:
                                                    </span>{{ $lists->no_of_guest }}
                                                    <br>
                                                    <span class="font-weight-bold">Caterer: </span> {{ $lists->caterer }}
                                                    <br>
                                                    <span class="font-weight-bold">Audio/Visual: </span>
                                                    {{ $lists->audio_visual }}
                                                    <br>
                                                    <span class="font-weight-bold">Events and Concep Styling: </span>
                                                    {{ $lists->concept }}
                                                </td>
                                                <td>Status: {{ $lists->inquiry_status }}</td>
                                                
                                                
                                            </tr>
                                        </tbody>
                                        <div class="modal fade text-left" id="Modalstatus{{ $lists->id }}"
                                            tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">{{ __('Add Details') }}</h2>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                                                                <input class="form-control" type="text" name="id"
                                                    value="{{ $lists->id }}" hidden>
                                                                        <p>Inquiry Status</p>
                                                                            <select name="event_status" class="form-control" required>
                                                                                <option selected disabled value="">Select</option>
                                                                                <option value="Approved">Approved</option>
                                                                                <option value="Declined">Declined</option>
                                                                            </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer pt-4">
                                                                <button class="btn btn-outline-danger"
                                                                    data-dismiss="modal">Close</button>
                                                                <input type="submit" name="update" value="Add"
                                                                    class="btn btn-success" />
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </table>
                                </div>

                                {{-- Archive --}}
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:16px;">Action</th>
                                                <th scope="col" style="font-size:16px;">Event Name</th>
                                                <th scope="col" style="font-size:16px;">Event Type</th>
                                                <th scope="col" style="font-size:16px;">Contact Person</th>
                                                <th scope="col" style="font-size:16px;">Contact Number</th>
                                                <th scope="col" style="font-size:16px;">Event Date</th>
                                                <th scope="col" style="font-size:16px;">Event Time</th>
                                                <th scope="col" style="font-size:16px;">Booking Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $lists)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('/event_view', ['id' => $lists->id]) }}" target="blank"
                                                        class="btn btn-sm btn-success" style="cursor:pointer;"
                                                        data-toggle="tooltip" data-placement="top" title="View">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </td>
                                                <td><span class="font-weight-bold">Event Name: </span> {{ $lists->event_name }}</td>
                                                <td><span class="font-weight-bold">Event Type:</span> {{ $lists->event_type }}</td>
                                                <td><span class="font-weight-bold">Name: </span>{{ $lists->contact_person }}</td>
                                                <td><span class="font-weight-bold">Contact Number: </span> {{ $lists->contact_person_no }}</td>
                                                <td><span class="font-weight-bold">Event Date: </span>
                                                    {{ $lists->event_date }}
                                                    <br>
                                                    <span class="font-weight-bold">No. of Guest:
                                                    </span>{{ $lists->no_of_guest }}
                                                    <br>
                                                    <span class="font-weight-bold">Caterer: </span> {{ $lists->caterer }}
                                                    <br>
                                                    <span class="font-weight-bold">Audio/Visual: </span>
                                                    {{ $lists->audio_visual }}
                                                    <br>
                                                    <span class="font-weight-bold">Events and Concep Styling: </span>
                                                    {{ $lists->concept }}
                                                </td>

                                                <td>CN: {{ $lists->id }}<br>Date: {{ $lists->created_at }}</td>
                                                
                                                <td><span class="font-weight-bold">Name: </span>{{ $lists->contact_person }} </td>
                                            </tr>
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
                            <input type="text" class = "form-control" required>
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
                            <input type="text" class = "form-control" required>
                        </div>
                        <div class="col-md-6">
                            <p>Contact Person</p>
                            <input type="number" class = "form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Contact Person</p>
                            <input type="number" class = "form-control" required>
                        </div>
                        <div class="col-md-6">
                            <p>Contact Date</p>
                            <input type="number" class = "form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <p>Event Time</p>
                            <input type="number" class = "form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <!-- <a class="btn btn-secondary" data-dismiss="modal">Close</a> -->
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
