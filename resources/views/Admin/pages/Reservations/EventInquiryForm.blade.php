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
    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class=" col ">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h2 class="mb-0 title">Event Inquiry List</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush" id="myTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:16px;">Action</th>
                                            <th scope="col" style="font-size:17px;">ID</th>
                                            <th scope="col" style="font-size:17px;">Client Name</th>
                                            <th scope="col" style="font-size:17px;">Contact No.</th>
                                            <th scope="col" style="font-size:17px;">Contact Person</th>
                                            <th scope="col" style="font-size:17px;">Contact Person No.</th>
                                            <th scope="col" style="font-size:17px;">Billing Address</th>
                                            <th scope="col" style="font-size:17px;">Email Address</th>
                                            <th scope="col" style="font-size:17px;">Event Name</th>
                                            <th scope="col" style="font-size:17px;">Event Type</th>
                                            <th scope="col" style="font-size:17px;">Event Date</th>
                                            <th scope="col" style="font-size:17px;">No. of Guest</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $lists)
                                            <tr>
                                                <td class="row">
                                                    <div class="col-md-2">
                                                        <form action="{{ route('EventInquiryView') }}" target="_blank">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success" title="View">
                                                                <i class="bi bi-eye"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary" title="Edit">
                                                            <i class="bi bi-pencil-square"></i></button>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="ni ni-fat-remove"></i></button>
                                                    </div>
                                                </td>
                                                <td>{{ $lists->id }}</td>
                                                <td>{{ $lists->client_name }}</td>
                                                <td>{{ $lists->contact_no }}</td>
                                                <td>{{ $lists->contact_person }}</td>
                                                <td>{{ $lists->contact_person_no }}</td>
                                                <td>{{ $lists->billing_address }}</td>
                                                <td>{{ $lists->email_address }}</td>
                                                <td>{{ $lists->event_name }}</td>
                                                <td>{{ $lists->event_type }}</td>
                                                <td>{{ $lists->event_date }}</td>
                                                <td>{{ $lists->no_of_guest }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <style>
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
