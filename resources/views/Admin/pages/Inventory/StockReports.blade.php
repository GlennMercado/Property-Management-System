@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>


    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Stock Reports</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Inventory</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Stock Reports
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
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Linen Request</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"> Supply Request </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                {{-- Linen Request --}}
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead>
                                        <tr>
                                    <th scope="col" style="font-size:16px;">Room Number</th>
                                    <th scope="col" style="font-size:16px;">Item Name</th>
                                    <th scope="col" style="font-size:16px;">Discrepancy</th>
                                    <th scope="col" style="font-size:16px;">Quantity Requested</th>
                                    <th scope="col" style="font-size:16px;">Status</th>
                                     </tr>
                                    </thead>
                                        <tbody>
                                        @foreach ($list as $lists)
                                            <tr>
                                                <td>{{ $lists->Room_No }}</td>
                                                <td>{{ $lists->name }}</td>
                                                <td>{{ $lists->Discrepancy }}</td>
                                                <td>{{ $lists->Quantity_Requested }}</td>
                                                <td>{{ $lists->Status }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                        </table>
                                    </div>

                                {{-- Supply Request --}}
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead>
                                            <tr>
                                            <th scope="col" style="font-size:16px;">Room No.</th>
                                            <th scope="col" style="font-size:16px;">Item Name</th>
                                            <th scope="col" style="font-size:16px;">Quantity</th>
                                            <th scope="col" style="font-size:16px;">Attendant</th>
                                            <th scope="col" style="font-size:16px;">Status</th>
                                            <th scope="col" style="font-size:16px;">RequestedQuantity</th>
                                            <th scope="col" style="font-size:16px;">DateRequested</th>
                                            <th scope="col" style="font-size:16px;">DateReceived</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list2 as $lists2)
                                            <tr>
                                                <td style="font-size:14px;">{{ $lists2->Room_No }}</td>
                                                <td style="font-size:14px;">{{ $lists2->name }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Quantity }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Attendant }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Status }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Quantity_Requested }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Date_Requested }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Date_Received }}</td>
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
