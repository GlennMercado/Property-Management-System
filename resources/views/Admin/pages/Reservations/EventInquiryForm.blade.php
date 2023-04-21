@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
        });
        // Code that uses other library's $ can follow here.
    </script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Event Inquiry</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Sales & Marketing</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Event Inquiry</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class=" col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive t1">
                                <table class="table align-items-center table-flush" id="myTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:15px;">Action</th>
                                            <th scope="col" style="font-size:15px;">Control Number</th>
                                            <th scope="col" style="font-size:15px;">Status</th>
                                            <th scope="col" style="font-size:15px;">Client Info</th>
                                            <th scope="col" style="font-size:15px;">Contact Person Info.</th>
                                            <th scope="col" style="font-size:15px;">Event Information</th>
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
                                                    <button type="submit" data-toggle="modal" data-target="#exampleModal"
                                                        title="Update Status" class="btn btn-sm btn-primary">
                                                        <i class="bi bi-pencil-square"></i></button>
                                                </td>
                                                <td>CN: {{ $lists->id }}<br>Date: {{ $lists->created_at }}</td>
                                                <td><span
                                                        class="badge badge-pill badge-lg badge-success">{{ $lists->inquiry_status }}</span>
                                                </td>
                                                <td>
                                                    <span class="font-weight-bold">Name: </span>{{ $lists->client_name }}
                                                    <br><span class="font-weight-bold">Contact Number: </span>
                                                    {{ $lists->contact_no }}
                                                    <br>
                                                    <span class="font-weight-bold">Billing Address: </span>
                                                    {{ $lists->billing_address }}
                                                    <br>
                                                    <span class="font-weight-bold">Email: </span>
                                                    {{ $lists->email_address }}
                                                </td>
                                                <td><span class="font-weight-bold">Name: </span>{{ $lists->contact_person }}
                                                    <br>
                                                    <span class="font-weight-bold">Contact Number: </span>
                                                    {{ $lists->contact_person_no }}
                                                </td>
                                                <td><span class="font-weight-bold">Event Name: </span>
                                                    {{ $lists->event_name }}
                                                    <br>
                                                    <span class="font-weight-bold">Event Type:</span>
                                                    {{ $lists->event_type }}
                                                    <br>
                                                    <span class="font-weight-bold">Event Date: </span>
                                                    {{ $lists->event_date }}
                                                    <br>
                                                    <span class="font-weight-bold">No. of Guest:
                                                    </span>{{ $lists->no_of_guest }}
                                                    <br>
                                                    <span class="font-weight-bold">Venue: </span>{{ $lists->venue }}
                                                    <br>
                                                    <span class="font-weight-bold">Caterer: </span> {{ $lists->caterer }}
                                                    <br>
                                                    <span class="font-weight-bold">Audio/Visual: </span>
                                                    {{ $lists->audio_visual }}
                                                    <br>
                                                    <span class="font-weight-bold">Events and Concep Styling: </span>
                                                    {{ $lists->concept }}
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" class="prevent_submit"
                                                            action="{{ url('/update_status') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <p>ID</p>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $lists->id }}" readonly>

                                                                <input type="hidden" name="eventid"
                                                                    value="{{ $lists->id }}" />

                                                                <p>Name</p>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $lists->client_name }}" readonly>

                                                                <select name="update_status" class="form-control" required>
                                                                    <option selected="true" disabled="disabled"
                                                                        value="">
                                                                        {{ $lists->inquiry_status }}</option>
                                                                    <option value="Approved">Approved</option>
                                                                    <option value="Disapproved">Disapproved</option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</a>
                                                                <button type="submit"
                                                                    class="btn btn-secondary">Save</button>
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
    <style>
        .t1 td {
            text-emphasis: wrap;
        }

        .title {
            text-transform: uppercase;
            font-size: 25px;
            letter-spacing: 2px;
        }

        .line {
            border: 2px solid black;
            width: 35%;
            display: inline-block;
            align-items: right;
            margin-top: 10px;
        }

        .title-color {
            color: #484848;
            font-size: 20px;
        }

        .text-color {
            font-size: 18px;
            color: #6C6C6C;
        }

        @media (max-width: 800px) {
            .line {
                width: 100%;
            }
        }
    </style>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
