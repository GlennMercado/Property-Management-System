@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin', [
        'title' => __('Hello') . ' ' . auth()->user()->name,
    ])
    <div class="col-lg-12">
        <img class="card-img-top img-fluid" src="{{ asset('nvdcpics') }}/nvdcpic4.png" alt="Card image cap">
    </div>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('nvdcpics') }}/user.png" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light"></span>
                                <div class="visible-print text-center">
                                    {!! QrCode::size(200)->generate(auth()->user()->email) !!}
                                    <p>Show this code to the receptionist</p>
                                </div>
                            </h3>

                        </div>
                    </div>
                </div>
            </div>
            <!--Active Booking-->
            <div class="col-xl-8 order-xl-1 mt-10">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Active Booking') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                <table class="table align-items-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="budget">Room No.</th>
                                            <th scope="col" class="sort" data-sort="status">No. of Pax</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col" class="sort" data-sort="completion">Booking Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($list as $lists)
                                        @if($lists->Booking_Status != "Checked-Out" && $lists->IsArchived != 1)
                                        <tr>
                                            <td>{{$lists->Room_No}}</td>
                                            <td>{{$lists->No_of_Pax}}</td>
                                            <td>{{$lists->Payment_Status}}</td>
                                            <td>{{$lists->Booking_Status}}</td>
                                            <td>
                                                @if($lists->Payment_Status == "Paid")
                                                    <!--View Button-->
                                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                                data-target="#view_qr{{ $lists->Booking_No }}"> 
                                                        View QR
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                            <!--View-->
                                            <div class="modal fade" id="view_qr{{ $lists->Booking_No }}" tabindex="-1"
                                                role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                                                Hotel Reservation QR CODE
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
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
                </div>
            </div>

            <!-- Finished Booking -->
            <div class="col-xl-8 order-xl-1 mt-10">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Finished Bookings') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                <table class="table align-items-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="budget">Room No.</th>
                                            <th scope="col" class="sort" data-sort="status">No. of Pax</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col" class="sort" data-sort="completion">Booking Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($list as $lists)
                                            @if($lists->Booking_Status == "Checked-Out" && $lists->IsArchived == 1)
                                                <tr>
                                                    <td>{{$lists->Room_No}}</td>
                                                    <td>{{$lists->No_of_Pax}}</td>
                                                    <td>{{$lists->Payment_Status}}</td>
                                                    <td>{{$lists->Booking_Status}}</td>
                                                    <td>
                                                        @if($lists->Payment_Status == "Paid")
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
                                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                                                    Hotel Reservation QR CODE
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
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
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
