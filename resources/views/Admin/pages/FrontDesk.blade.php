@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <br>
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
                                <h3 class="title-color text-light">Guest Information</h3>
                                <div class="row">
                                    <div class="col-6 pt-4">
                                        <p class="text-left label">Name </p>
                                        <input class="form-control" type="text" name="gName" placeholder="Name"
                                            pattern="[A-Za-z]+"
                                            title="Name should only contain uppercase and lowercase letters." maxlength="32"
                                            required>
                                    </div>
                                    <div class="col pt-4">
                                        <p class="text-left label">Mobile No. </p>
                                        <input type="number" class="form-control" type="tel" minlength="11"
                                        onKeyPress="if(this.value.length==11) return false;"
                                            maxlength="11" name="mobile" placeholder="09XXXXXXXXX" required>
                                    </div>
                                </div>
                                <h3 class="title-color pt-4 text-light">Reservation</h3>
                                <div class="row">
                                    <div class="col-6 pt-4">
                                        <p class="text-left label">Room No - Beds </p>
                                        <select name="room_no" class="form-control" required>
                                            <option selected disabled value="">Select</option>
                                            @foreach ($room as $rooms)
                                                @if ($rooms->Status == 'Vacant for Accommodation')
                                                    <option value="{{ $rooms->Room_No }}">{{ $rooms->Room_No }} -
                                                        {{ $rooms->No_of_Beds }} - {{ $rooms->Extra_Bed }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 pt-4">
                                        <p class="text-left label">Number of Pax </p>
                                        <select name="pax" class="form-control" required>
                                            <option selected disabled value="">Select</option>
                                            @for ($count = 1; $count <= 4; $count++)
                                                <option value="{{ $count }}">{{ $count }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-left label pt-4">Check in Date </p> <!-- Check in Date/Time-->
                                        <input class="form-control chck" name="checkIn" type="date"
                                            onkeydown="return false" id="example-datetime-local-input" required>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-left label pt-4">Check out Date </p> <!-- Check in Date/Time-->
                                        <input class="form-control chck" name="checkOut" type="date"
                                            onkeydown="return false" id="example-datetime-local-input" required>
                                    </div>
                                </div>
                                <br><br>
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row">
                                    <li class="nav-item">
                                        <input type="submit" class="btn btn-success prevent_submit" value="Submit"
                                            style="width:50%;" />
                                    </li>
                                </ul>
                            </form>
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
        </style>
        @include('layouts.footers.auth')

    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
