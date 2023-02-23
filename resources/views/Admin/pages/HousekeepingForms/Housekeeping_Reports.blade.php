@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    

    <div class="container-fluid mt--7">
        <br>
        
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0 title">Reports</h3>
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
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Arrival</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"> Supply Request </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                            href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                            aria-selected="false"> Room Management</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab"
                                            href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4"
                                            aria-selected="false"> Guest Call Register</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-5-tab" data-toggle="tab"
                                            href="#tabs-icons-text-5" role="tab" aria-controls="tabs-icons-text-5"
                                            aria-selected="false"> Maintenance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-6-tab" data-toggle="tab"
                                            href="#tabs-icons-text-6" role="tab" aria-controls="tabs-icons-text-6"
                                            aria-selected="false"> Key Management</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                {{-- Arrival / Departure --}}
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Housekeeping Status</th>
                                                <th scope="col" style="font-size:18px;">Check In Date</th>
                                                <th scope="col" style="font-size:18px;">Check Out Date</th>
                                                <th scope="col" style="font-size:18px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           arrival
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Supply Request --}}
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;">Booking Status</th>
                                                <th scope="col" style="font-size:18px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>supply
                                    </table>
                                </div>

                                {{-- Room Management --}}
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-3-tab">
                                    <p class="description">Raw denim you probably haven't heard of them jean shorts Austin.
                                        Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor,
                                        williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                                        synth.</p>
                                </div>

                                {{-- Guest Call Register--}}
                                <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-4-tab">

                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable4">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Facility Type</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;">Check In Date</th>
                                                <th scope="col" style="font-size:18px;">Check Out Date</th>
                                                <th scope="col" style="font-size:18px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            guest
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Maintenance--}}
                                <div class="tab-pane fade" id="tabs-icons-text-5" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-5-tab">

                                    maintenance
                                    </table>
                                </div>

                                {{-- Key Management--}}
                                <div class="tab-pane fade" id="tabs-icons-text-6" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-6-tab">

                                    Key Management
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
</style>

</div>

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
