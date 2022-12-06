@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <style>
        .hcolor {
            color: #8898aa;
        }
    </style>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Hotel Reservation</h3>
                            </div>
                            <div class="col text-right">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#reserve">
                                    <i class="bi bi-file-plus"></i> Add Guest
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="reserve" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-left display-4" id="exampleModalLabel">Hotel
                                                Reservation
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('HotelReservationForm') }}" method="POST">

                                            {{ csrf_field() }}

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">

                                                        <p class="text-left">Check in Date/Time: </p>
                                                        <input class="form-control" name="checkIn" type="datetime-local"
                                                            value="<?php echo date('Y-m-d'); ?>" id="example-datetime-local-input"
                                                            required>

                                                        <p class="text-left">Check out Date/Time: </p>
                                                        <input class="form-control" name="checkOut" type="datetime-local"
                                                            value="<?php echo date('Y-m-d'); ?>" id="example-datetime-local-input"
                                                            required>

                                                        <p class="text-left">Guest Name: </p>
                                                        <input class="form-control" type="text" name="gName" required>

                                                        <p class="text-left">Address: </p>
                                                        <input class="form-control" type="text" name="address" required>

                                                        <p class="text-left">Mobile No.: </p>
                                                        <input class="form-control" type="number" name="mobile" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                <input type="submit" class="btn btn-success" value="Submit" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Check-in Date</th>
                                    <th scope="col">Check-out Date</th>
                                    <th scope="col">Guest Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $lists)
                                    <tr>
                                        <td>{{ $lists->id }}</td>
                                        <td>{{ $lists->check_in_date }}</td>
                                        <td>{{ $lists->check_out_date }}</td>
                                        <td>{{ $lists->guest_name }}</td>
                                        <td>{{ $lists->address }}</td>
                                        <td>{{ $lists->mobile_num }}</td>
                                        <td>
                                            <i class="bi bi-person"></i>
                                            <i class="bi bi-check-lg"></i>
                                            <i class="bi bi-chevron-right"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
