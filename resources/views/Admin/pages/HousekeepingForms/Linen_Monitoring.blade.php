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
                                <h2 class="mb-0 title">Linen Monitoring</h3>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:18px;">Room <br> No.</th>
                                        <th scope="col" style="font-size:18px;">Total <br> Linen</th>
                                        <th scope="col" style="font-size:18px;">Total <br> Discrepancy</th>
                                        <th scope="col" style="font-size:18px;">Attendant</th>
                                        <th scope="col" style="font-size:18px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $lists)
                                        <tr>
                                            <td>{{ $lists->Room_No }}</td>
                                            <td>{{ $lists->total }}</td>
                                            <td>{{ $lists->ds }}</td>
                                            <td>{{ $lists->Attendant }}</td>
                                            <td>
                                                @php 
                                                    $check;
                                                    $roomno = $lists->Room_No;
                                                    $sql = \DB::select("SELECT CASE WHEN diff_rows > 0 THEN 'Different' ELSE 'Same' END AS Result FROM ( SELECT SUM(CASE WHEN Status = 'Requested' THEN 0 ELSE 1 END) AS diff_rows FROM hotel_room_linens WHERE Room_No = '$roomno') AS derived");
                                                    foreach($sql as $supply)
                                                    {
                                                        $check = $supply->Result;
                                                    }
                                                @endphp
                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#view_supply{{ $lists->Room_No }}" title="View Room Linens">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                @if ($lists->rstats != 'Occupied')
                                                    @if($check == "Different")
                                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                                            data-target="#request{{ $lists->Room_No }}" title="Request Room Linens">
                                                            <i class="bi bi-box-arrow-in-down-left"></i>
                                                        </button>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @foreach ($array as $arrays)
                                {{-- View Supply --}}
                                <div id="view_supply{{ $arrays['Room_No'] }}" class="modal hide fade" tabindex="-1">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Room
                                                    {{ $arrays['Room_No'] }} Supplies
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table align-items-center table-flush" id="myTable2">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Item
                                                                Name</th>
                                                            <th scope="col">
                                                                Quantity</th>
                                                                <th scope="col">Quantity <br> Requested
                                                                </th>
                                                                <th scope="col">
                                                                    Discrepancy</th>
                                                            <th scope="col"> Status </th>
                                                            <th scope="col"> Date <br> Received </th>  
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($list2 as $lists)
                                                            @if ($lists->Room_No == $arrays['Room_No'])
                                                                <tr>
                                                                    <td>{{ $lists->name }}</td>
                                                                    <td>{{ $lists->Quantity }}</td>
                                                                    <td>{{ $lists->Quantity_Requested }}</td>
                                                                    <td>{{ $lists->Discrepancy }}</td>
                                                                    <td style="white-space: pre-wrap;">{{ $lists->Status}}</td>
                                                                    @if($lists->Date_Received != null)
                                                                    <td>{{ date('M d Y', strtotime($lists->Date_Received))}}
                                                                        <br> 
                                                                        {{ date('h:i:s A', strtotime($lists->Date_Received))}}
                                                                    </td>
                                                                    @else
                                                                    <td></td>
                                                                    @endif
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Request Supply --}}
                                <div id="request{{ $arrays['Room_No'] }}" class="modal hide fade" tabindex="-1">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4"
                                                    id="exampleModalLabel">Room {{ $arrays['Room_No'] }} Request
                                                    Linens
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ url('/linen_request') }}" class="prevent_submit"
                                                method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Item Name</p>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Quantity</p>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Requested Quantity</p>
                                                        </div>
                                                        
                                                    </div>
                                                    @foreach ($list2 as $lists)
                                                        @if ($lists->Room_No == $arrays['Room_No'] && $lists->Status != "Requested")
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="hidden" name="room_no"
                                                                        value="{{ $lists->Room_No }}" />
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->name }}" readonly>
                                                                    <input type="hidden" name="name[]"
                                                                        value="{{ $lists->name }}">
                                                                </div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Quantity }}" readonly>
                                                                </div>
                                                                <div class="col">
                                                                    <input type="number" class="form-control"
                                                                        value="0"
                                                                        name="requested_quantity[]" />
                                                                </div>
                                                                
                                                            </div>
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                    <a data-dismiss="modal" class="btn">Close</a>
                                                    <input type="submit" value="Submit" name="submit"
                                                        class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
