@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <script src="{{ asset('Javascript') }}/walk_in.js"></script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">FrontDesk</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Front Desk</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0 title">Hotel Booking</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="nav-wrapper">
                            <form action="{{ route('HotelReservationForm') }}" class="prevent_submit" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-6 pt-4">
                                        <p class="text-left label">Name </p>
                                        <input class="form-control" id="name1" type="text" name="gName"
                                            placeholder="Name"
                                            title="Name should only contain uppercase and lowercase letters." maxlength="32"
                                            required>
                                    </div>
                                    <div class="col pt-4">
                                        <p class="text-left label">Mobile No. </p>
                                        <input type="number" class="form-control" id="mobile" type="tel"
                                            minlength="11" onKeyPress="if(this.value.length==11) return false;"
                                            maxlength="11" name="mobile" placeholder="09XXXXXXXXX" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pt-4">
                                        <p class="text-left label">Room No</p>
                                        <select name="room_no" class="form-control" id="list_rooms" required>
                                            <option selected disabled value="">Select</option>
                                            @foreach ($room as $rooms)
                                                @if ($rooms->Status == 'Vacant for Accommodation')
                                                    <option value="{{ $rooms->Room_No }}">{{ $rooms->Room_No }} -
                                                        {{ $rooms->No_of_Beds }} - {{ $rooms->Extra_Bed }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        
                                        <input type="hidden" id="rpn">

                                    </div>
                                    <div class="col-6 pt-4">
                                        <p class="text-left label">Number of Pax </p>
                                        <select name="pax" class="form-control" id="pax_num" required>
                                            <option selected disabled value="">Select</option>
                                            @for ($count = 1; $count <= 4; $count++)
                                                <option value="{{ $count }}">{{ $count }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-left label pt-4">Check in Date </p> <!-- Check in Date/Time-->
                                        <input class="form-control chck" name="checkIn" type="date"
                                            onkeydown="return false" id="date1" required>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-left label pt-4">Check out Date </p> <!-- Check in Date/Time-->
                                        <input class="form-control chck" name="checkOut" type="date"
                                            onkeydown="return false" id="date2" required>
                                    </div>
                                </div>
                                <br><br>
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row">
                                    <div class="col-md-12 d-flex justify-content-center pt-4">
                                        <button type="button" id="submit_button" class="btn btn-success prevent_submit"
                                            onclick="price_count()" data-toggle="modal" style="width:50%;"
                                            data-target="#btnpreview">
                                            Submit
                                        </button>
                                    </div>
                                </ul>
                                <input type="hidden" id="room_price" name="payment">
                        </div>
                    </div>
                    {{-- MODAL --}}
                    <div class="modal fade" id="btnpreview" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Billing Information</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="shadow row p-3 mt-2">
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Name:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2" id="name2">
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Mobile no:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2" id="mobile2">
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Check in date/time:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2" id="date_pass1">
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Check out date/time:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2" id="date_pass2">
                                            </div>
                                        </div>
                                        <div class="row shadow p-3 mt-2">
                                            <div class="col-md-12 text-sm font-weight-bold">
                                                <h3>Payment method: Cash</h3>
                                            </div>
                                            <div class="col-md-12 text-sm font-weight-bold">
                                                <h4 class="text-muted mt-2">Room price(2 pax): <span class="text-muted"
                                                        id="sub1"></span> </h4>
                                                <h4 class="text-muted">Per-pax subtotal: <span class="text-muted"
                                                        id="subtotal"></span> </h4>
                                                <h3>Total Payment:</h3>
                                                <h2 class="display-2 mt--3 text-green currency" id="dp">
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit"
                                        class="mx-auto d-flex justify-content-center btn btn-success prevent_submit mt--4 btn_submit"
                                        value="Submit" style="width:50%;" />
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    {{-- MODAL --}}
                </div>
            </div>
        </div>

        <br>





        <script>
            $('.prevent_submit').on('submit', function() {
                $('.prevent_submit').attr('disabled', 'true');
            });

            $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
                var dateToday = new Date();
                var month = dateToday.getMonth() + 1;
                var day = dateToday.getDate();
                var year = dateToday.getFullYear();

                if (month < 10)
                    month = '0' + month.toString();
                if (day < 10)
                    day = '0' + day.toString();

                var maxDate = year + '-' + month + '-' + day;

                $('.chck').attr('min', maxDate);
            });

            $(document).ready(function() {
                $('#list_rooms').on('change', function() { 
                    var id = $(this).val();
                    $.ajax({
                        url: '{{ route("get.data", ":id") }}'.replace(':id', id),
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#rpn').val(data.Rate_per_Night);
                            alert(data.Rate_per_Night);
                        },
                        error: function(xhr, status, error) {
                        // Handle any errors
                        }
                    });
                });
            });
        </script>
        <style>
            /* disable arrows input type number */
            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            input[type="number"] {
                -moz-appearance: textfield;
            }

            .title {
                text-transform: uppercase;
                font-size: 25px;
                letter-spacing: 2px;
            }

            .label {
                font-size: 18px;
                font-family: sans-serif;
            }

            .line {
                border: 2px solid black;
                width: 35%;
                display: inline-block;
                align-items: right;
                margin-top: 10px;
            }

            @media (max-width: 800px) {
                .line {
                    width: 100%;
                }
            }

            .currency::before {
                content: '₱';
            }
        </style>

    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
