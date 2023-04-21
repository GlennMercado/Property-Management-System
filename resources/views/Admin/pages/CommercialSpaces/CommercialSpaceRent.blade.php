@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
            $('#myTable2').DataTable();
            $('#myTable3').DataTable();
        });
        // Code that uses other library's $ can follow here.
    </script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Commercial Spaces</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Sales & Marketing</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Commercial Spaces</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                        aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>List of Tenants</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                        aria-selected="false">
                                        <i class="ni ni-fat-remove mr-2"></i>For Renewal/Ending Contracts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                        href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                        aria-selected="false">
                                        <i class="ni ni-fat-remove mr-2"></i>Archive</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    {{-- Tenants List --}}
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-1-tab">
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush" id="myTable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="font-size:17px;">Action</th>
                                                        <th scope="col" style="font-size:17px;">Business Info</th>
                                                        <th scope="col" style="font-size:17px;">Owner Info</th>
                                                        <th scope="col" style="font-size:17px;">Space/Unit</th>
                                                        <th scope="col" style="font-size:17px;">Start Date <br> of
                                                            Contract</th>
                                                        <th scope="col" style="font-size:17px;">End Date <br> of Contract
                                                        </th>
                                                        <th scope="col" style="font-size:17px;">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- For Renewal/Ending of Contracts --}}
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-2-tab">
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush" id="myTable2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="font-size:17px;">Action</th>
                                                        <th scope="col" style="font-size:17px;">Business Info</th>
                                                        <th scope="col" style="font-size:17px;">Owner Info</th>
                                                        <th scope="col" style="font-size:17px;">Space/Unit</th>
                                                        <th scope="col" style="font-size:17px;">Start Date <br> of
                                                            Contract</th>
                                                        <th scope="col" style="font-size:17px;">End Date <br> of
                                                            Contract
                                                        </th>
                                                        <th scope="col" style="font-size:17px;">Status</th>
                                                    </tr>
                                                </thead>
                                               
                                            </table>
                                        </div>
                                    </div>

                                    {{-- Archives --}}
                                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-3-tab">
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush" id="myTable3">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="font-size:17px;">Action</th>
                                                        <th scope="col" style="font-size:17px;">Business Info</th>
                                                        <th scope="col" style="font-size:17px;">Owner Info</th>
                                                        <th scope="col" style="font-size:17px;">Status</th>
                                                        <th scope="col" style="font-size:17px;">Remarks</th>
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
    <style>
        .tbltxt {
            font-size: 18px;
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
