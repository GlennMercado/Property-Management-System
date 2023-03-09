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
                        <div class="row align-items-center">
                            <div class="col text-right">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                            data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                            aria-controls="tabs-icons-text-1" aria-selected="true">Service Request</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab"
                                            data-toggle="tab" href="#tabs-icons-text-2" role="tab"
                                            aria-controls="tabs-icons-text-2" aria-selected="true">Item Request</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab"
                                            data-toggle="tab" href="#tabs-icons-text-3" role="tab"
                                            aria-controls="tabs-icons-text-3" aria-selected="true">Archives</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                {{-- Service Request --}}
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
                                                <th scope="col" style="font-size:18px;">Type of Request</th>
                                                <th scope="col" style="font-size:18px;">Request</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($list as $lists)
                                            @if($lists->Type_of_Request == "Service Request")
                                            <tr>
                                                <td style="font-size:15px;">{{$lists->Request_ID}}</td>
                                                <td style="font-size:15px;">{{$lists->Room_No}}</td>
                                                <td style="font-size:15px;">{{$lists->Guest_Name}}</td>
                                                <td style="font-size:15px;">{{date('M d, Y', strtotime($lists->Date_Requested))}}</td>
                                                <td style="font-size:15px;">{{$lists->Type_of_Request}}</td>
                                                <td style="font-size:15px;">{{$lists->Request}}</td>
                                                <td style="font-size:15px;">{{$lists->Status}}</td>
                                                <td>
                                                    @if($lists->Status == "Ongoing")
                                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                                        data-target="#update_stats{{ $lists->Request_ID }}" title="Request Room Linens">
                                                        <i class="bi bi-box-arrow-in-down-left"></i>
                                                    </button>  
                                                    @endif
                                                </td>
                                            </tr>

                                            <!--Update Status-->
                                            <div class="modal fade" id="update_stats{{ $lists->Request_ID }}"
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
                                                        <form method="POST" class="prevent_submit"
                                                            action="{{url('/set_stats')}}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}

                                                        <div class="modal-body">
                                                            <input type="hidden" name="request_id" value="{{$lists->Request_ID}}" />

                                                            <select name="status" class="form-control" required>
                                                                <option value="" selected="true" disabled="disabled">Select</option>
                                                                <option value="Approved">Approved</option>
                                                                <option value="Denied">Denied</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-secondary"
                                                                data-dismiss="modal">Close</a>
                                                            <input type="submit" value="Submit" class="btn btn-success">
                                                        </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- item Request --}}
                                <div class="tab-pane fade show" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Request ID.</th>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Guest Name</th>
                                                <th scope="col" style="font-size:18px;">Date Requested</th>
                                                <th scope="col" style="font-size:18px;">Type of Request</th>
                                                <th scope="col" style="font-size:18px;">Request</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                                <th scope="col" style="font-size:18px;"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($list as $lists)
                                            @if($lists->Type_of_Request == "Item Request")
                                            <tr>
                                                <td style="font-size:15px;">{{$lists->Request_ID}}</td>
                                                <td style="font-size:15px;">{{$lists->Room_No}}</td>
                                                <td style="font-size:15px;">{{$lists->Guest_Name}}</td>
                                                <td style="font-size:15px;">{{date('M d, Y', strtotime($lists->Date_Requested))}}</td>
                                                <td style="font-size:15px;">{{$lists->Type_of_Request}}</td>
                                                <td style="font-size:15px;">{{$lists->Request}}</td>
                                                <td style="font-size:15px;">{{$lists->Status}}</td>
                                                <td>
                                                    @if($lists->Status == "Ongoing")
                                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                                        data-target="#update_stats2{{ $lists->Request_ID }}" title="Request Room Linens">
                                                        <i class="bi bi-box-arrow-in-down-left"></i>
                                                    </button>  
                                                    @endif
                                                </td>
                                            </tr>

                                            <!--Update Status-->
                                            <div class="modal fade" id="update_stats2{{ $lists->Request_ID }}"
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
                                                        <form method="POST" class="prevent_submit"
                                                            action="{{url('/set_stats')}}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}

                                                        <div class="modal-body">
                                                            <input type="hidden" name="request_id" value="{{$lists->Request_ID}}" />

                                                            <select name="status" class="form-control" required>
                                                                <option value="" selected="true" disabled="disabled">Select</option>
                                                                <option value="Approved">Approved</option>
                                                                <option value="Denied">Denied</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-secondary"
                                                                data-dismiss="modal">Close</a>
                                                            <input type="submit" value="Submit" class="btn btn-success">
                                                        </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Archives --}}
                                <div class="tab-pane fade show" id="tabs-icons-text-3" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-3-tab">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush" id="myTable3">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Request ID.</th>
                                                <th scope="col" style="font-size:18px;">Room No.</th>
                                                <th scope="col" style="font-size:18px;">Guest Name</th>
                                                <th scope="col" style="font-size:18px;">Date Requested</th>
                                                <th scope="col" style="font-size:18px;">Type of Request</th>
                                                <th scope="col" style="font-size:18px;">Request</th>
                                                <th scope="col" style="font-size:18px;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($archive as $lists)
                                            <tr>
                                                <td style="font-size:15px;">{{$lists->Request_ID}}</td>
                                                <td style="font-size:15px;">{{$lists->Room_No}}</td>
                                                <td style="font-size:15px;">{{$lists->Guest_Name}}</td>
                                                <td style="font-size:15px;">{{date('M d, Y', strtotime($lists->Date_Requested))}}</td>
                                                <td style="font-size:15px;">{{$lists->Type_of_Request}}</td>
                                                <td style="font-size:15px;">{{$lists->Request}}</td>
                                                <td style="font-size:15px;">{{$lists->Status}}</td>
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
        $('#myTable3').DataTable();
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
