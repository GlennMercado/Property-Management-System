@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin')
    <div class="container mt-7">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    @foreach ($list as $lists)
                        @if ($lists->Booking_Status != 'Checked-Out' && $lists->IsArchived != 1)
                            <div class="col-md-4">
                                <img class="img-fluid" src="{{ asset('nvdcpics') }}/hotel1.jpg">
                            </div>
                            <div class="col-md-4">
                                <h1>Room {{ $lists->Room_No }}</h1>
                                <h4>
                                    <i class="bi bi-book-fill"></i>
                                    Booking No. {{ $lists->Booking_No }}
                                </h4>
                                <h4><i class="bi bi-person-badge-fill"></i> Gcash account:
                                    {{ $lists->gcash_account_name }}
                                </h4>
                                <h4><i class="bi bi-people-fill"></i> Number of pax:
                                    {{ $lists->No_of_Pax }}
                                </h4>
                                <h4>
                                    <i class="bi bi-calendar-range-fill"></i>
                                    Arrival/Departure {{ $lists->Check_In_Date }} -
                                    {{ $lists->Check_Out_Date }}
                                </h4>
                            </div>
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <div class="display-4 text-green">PHP {{ $lists->Payment }}
                                    <br>
                                    <div class="badge badge-primary">
                                        STATUS {{ $lists->Payment_Status }}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <h4 class="text-muted text-center mt-3">Click to view</h4>
                            </div> --}}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        {{-- <div class="card shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="mb-0">{{ __('My Bookings') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div>
                        <table class="table align-items-center">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="budget">Room No.</th>
                                    <th scope="col" class="sort" data-sort="status">No. of Pax</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col" class="sort" data-sort="completion">Booking Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($list as $lists)
                                    @if ($lists->Booking_Status != 'Checked-Out' && $lists->IsArchived != 1)
                                        <tr>
                                            <td>{{ $lists->Room_No }}</td>
                                            <td>{{ $lists->No_of_Pax }}</td>
                                            <td>{{ $lists->Payment_Status }}</td>
                                            <td><button type="button" class="btn btn-sm btn-outline-primary"
                                                    data-toggle="modal" data-target="#ViewPayment">
                                                    View Payment
                                                </button>
                                            </td>
                                            <td>
                                                @if ($lists->Payment_Status == 'Paid')
                                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                        data-target="#view_qr{{ $lists->Booking_No }}">
                                                        View QR
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($lists->Payment_Status == 'Paid')
                                                    <button type="button" class="btn btn-sm btn-outline-danger d-none"
                                                        data-toggle="modal" data-target="#CancelBooking">Cancel</button>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        data-toggle="modal" data-target="#CancelBooking">Cancel</button>
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="view_qr{{ $lists->Booking_No }}" tabindex="-1"
                                            role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p class="modal-title text-left display-4" id="exampleModalLabel">
                                                            Hotel Reservation QR CODE
                                                        </p>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body d-flex justify-content-center">
                                                        {!! QrCode::size(200)->generate($lists->Booking_No) !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- Proof of Payment Modal --}}
        <div class="modal fade" id="ViewPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Send Proof of Payment</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="file" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Cancel Booking Modal --}}
        <div class="modal fade" id="CancelBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Are you sure you want to cancel?</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        You won't be able to revert a booking cancellation once you confirm it.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Finished Booking -->
        <div class="card bg-secondary shadow mt-2">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="mb-0">{{ __('Finished Bookings') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead>
                            <tr>
                                <th scope="col" class="sort" data-sort="budget">Room No.</th>
                                <th scope="col" class="sort" data-sort="status">No. of Pax</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col" class="sort" data-sort="completion">Booking Status
                                </th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($list as $lists)
                                @if ($lists->Booking_Status == 'Checked-Out' && $lists->IsArchived == 1)
                                    <tr>
                                        <td>{{ $lists->Room_No }}</td>
                                        <td>{{ $lists->No_of_Pax }}</td>
                                        <td>{{ $lists->Payment_Status }}</td>
                                        <td>{{ $lists->Booking_Status }}</td>
                                        <td>
                                            @if ($lists->Payment_Status == 'Paid')
                                                <!--View QR Button-->
                                                <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                    data-target="#view_qr{{ $lists->Booking_No }}">
                                                    View QR
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    <!--View QR-->
                                    <div class="modal fade" id="view_qr{{ $lists->Booking_No }}" tabindex="-1"
                                        role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="modal-title text-left display-4" id="exampleModalLabel">
                                                        Hotel Reservation QR CODE
                                                    </p>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center">
                                                    {!! QrCode::size(200)->generate($lists->Booking_No) !!}
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card bg-white shadow mt-2">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="mb-0">{{ __('Convention Center Application') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead>
                            <tr>
                                <th>CONTROL NO.</th>
                                <th>APPLICATION STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1231231231
                                </td>
                                <td>
                                    <a href="#" class="badge-md badge-pill badge-primary">Approved</a> (Please check
                                    your email)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card bg-white shadow mt-2">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="mb-0">{{ __('Commercial Spaces Application') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead>
                            <tr>
                                <th>APPLICATION NO.</th>
                                <th>APPLICATION STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1231231231
                                </td>
                                <td>
                                    <a href="#" class="badge-md badge-pill badge-primary">Approved</a> (Please check
                                    your email)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('layouts.footers.guest')
    @endsection
