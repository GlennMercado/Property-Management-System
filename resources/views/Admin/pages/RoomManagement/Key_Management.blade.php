@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    

    <div class="container-fluid mt--7">
        <!--Room Management-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 title">Key Management</h3>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="card-body">
                        <!--Table-->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:18px;">Key ID</th>
                                        <th scope="col" style="font-size:18px;">Room No</th>
                                        <th scope="col" style="font-size:18px;">Issued To</th>
                                        <th scope="col" style="font-size:18px;">Issued Time</th>
                                        <th scope="col" style="font-size:18px;">Due Time</th>
                                        <th scope="col" style="font-size:18px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($list as $lists)
                                    @php 

                                    $duedate = date('F j, Y', strtotime($lists->Due_Time));
                                    $duetime = date('h:i:s A', strtotime($lists->Due_Time));

                                    $issueddate = date('F j, Y', strtotime($lists->Issued_Time));
                                    $issued_time = date('h:i:s A', strtotime($lists->Issued_Time));                           
                                    @endphp
                                    <tr>
                                        <td style="font-size:16px;">{{$lists->Key_ID}}</td>
                                        <td style="font-size:16px;">{{$lists->Room_No}}</td>
                                        <td style="font-size:16px;">{{$lists->Attendant}}</td>
                                        <td style="font-size:16px;">{{$issueddate}} <br> {{$issued_time}}</td>
                                        
                                        <td style="font-size:16px;">{{$duedate}} <br> {{$duetime}}</td>
                                        
                                        @if($lists->Status == "Issued")
                                        <td style="font-size:16px;" class="text-success">{{$lists->Status}}</td>
                                        @elseif($lists->Status == "Not Returned")
                                        <td style="font-size:16px;" class="text-danger">{{$lists->Status}}</td>
                                        @endif

                                    </tr>
                                    @endforeach              
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
    </div>

<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $('#myTable').DataTable();
    });
    
    $('.prevent_submit').on('submit', function() {
        $('.prevent_submit').attr('disabled', 'true');
    });
</script>
<style>
    .title {
        text-transform: uppercase;
        font-size: 20px;
        letter-spacing: 2px;
    }

    p {
        letter-spacing: 1px;
        font-weight: lighter;
        font-family: sans-serif;
        color: #909090;
    }

    h5 {
        font-family: sans-serif;
    }

    .hover:hover {
        background-color: bg-danger;
    }
</style>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
