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
                                <h3 class="mb-0 title">Operation Rooms</h3>
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
                                        <th scope="col" style="font-size:18px;">Action</th>
                                        <th scope="col" style="font-size:18px;">Room No.</th>
                                        <th scope="col" style="font-size:18px;">Room Size</th>
                                        <th scope="col" style="font-size:18px;">No. of Beds</th>
                                        <th scope="col" style="font-size:18px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $lists)
                                        <tr>
                                            <td>
                                                <!--View Button-->
                                                <button class="btn btn-sm btn-primary btn-lg" data-toggle="modal"
                                                    data-target="#view{{ $lists->Room_No }}"> <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                            <td style="font-size:16px;">{{ $lists->Room_No }}</td>
                                            <td style="font-size:16px;">{{ $lists->Room_Size }}</td>
                                            <td style="font-size:16px;">{{ $lists->No_of_Beds }}</td>
                                            <td style="font-size:16px;">
                                                @if($lists->Status == "Vacant for Accommodation" || $lists->Status == "Reserved")
                                                <span class="badge badge-pill badge-success badge-lg">{{ $lists->Status }}</span>
                                                @elseif($lists->Status == "Occupied" || $lists->Status == "Vacant for Cleaning")
                                                <span class="badge badge-pill badge-warning badge-lg">{{ $lists->Status }}</span>
                                                @elseif($lists->Status == "Out of Order")
                                                <span class="badge badge-pill badge-danger badge-lg">{{ $lists->Status }}</span>
                                                @endif
                                            </td>

                                        </tr>

                                        <!-- View Modal -->
                                        <div class="modal fade" id="view{{ $lists->Room_No }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4"
                                                            id="exampleModalLabel">Room {{ $lists->Room_No }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="card-body bg-white" style="border-radius: 18px">
                                                                <p class="text-left">Room No. </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Room_No }}" readonly>
                                                                <br>
                                                                <!-- Image in Blob -->
                                                                <!-- <img src="{{ url($lists->Hotel_Image) }}" class="card-img-top" /> -->
                                                                <!-- Image in path-->
                                                                <img src="{{ $lists->Hotel_Image }}"
                                                                    class="card-img-top" />
                                                                <br><br>
                                                                <p class="text-left">Rate per Night </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Rate_per_Night }}" readonly>
                                                                <br>
                                                                <p class="text-left">Extra Bed </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Extra_Bed }}" readonly>
                                                                <br>
                                                                <p class="text-left">No. of Pax per Room </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->No_Pax_Per_Room }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-danger"
                                                            data-dismiss="modal">Close</button>
                                                        <!--replace a tag to button tag-->
                                                        <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
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
