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
                                <h2 class="mb-0 title">Guest Request</h3>
                            </div>
                        </div>
                        <br>
                        <!-- <div class="row align-items-center">
                            <div class="col text-right">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                            data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Guest Request</a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                {{-- Guest Request --}}
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Request ID.</th>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Guest Name</th>
                                                <th scope="col" style="font-size:18px;">Date Requested</th>
                                                <th scope="col" style="font-size:18px;">Request</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($list as $lists)
                                            <tr>
                                                <td style="font-size:15px;">{{$lists->Request_ID}}</td>
                                                <td style="font-size:15px;">{{$lists->Room_No}}</td>
                                                <td style="font-size:15px;">{{$lists->Guest_Name}}</td>
                                                <td style="font-size:15px;">{{$lists->Date_Requested = date('M d, Y')}}</td>
                                                <td style="font-size:15px;">{{$lists->Request}}</td>
                                                <td style="font-size:15px;">{{$lists->Status}}</td>
                                                <td>
                                                    @if($lists->Status == "Approved" && $lists->Type_of_Request == "Service Request")
                                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                                            data-target="#service_request_id{{ $lists->Request_ID }}">
                                                            <i class="bi bi-box-arrow-in-down-left"></i>
                                                        </button>  
                                                    @endif
                                                </td>
                                            </tr>
                                             <!--Update Service Request-->
                                                <div class="modal fade" id="service_request_id{{ $lists->Request_ID }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-left display-4"
                                                                    id="exampleModalLabel">Update Request</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3 class="text-center">Update Service Request?</h3>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</a>
                                                                <a href="{{ url('/update_service_request', ['id' => $lists->Request_ID, 'bs' => $lists->Booking_Status])}}" class="btn btn-success">Yes</a>
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
