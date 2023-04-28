@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    {{-- calendar --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Dashboard</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- data toggle --}}
        <div class="row">
            <div class="col-md-6 card shadow">
                <h2 class="mt-2">Hotel Reservation Calendar</h2>
                <div class="row align-items-center">
                    <div class="col text-right">
                        <div class="nav-wrapper">
                            <div id="calendar"></div>
                            @foreach ($calendar as $lists)
                                <!-- Modal -->
                                <div class="modal fade" id="booking{{ $lists->Booking_No }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">Booking Information</h2>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            {{-- Booking Information Modal --}}
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3 class="text-left">Booking Number: </h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="font-weight:normal;">{{ $lists->Booking_No }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3 class="text-left">Room Number:</h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="font-weight:normal;">{{ $lists->Room_No }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3 class="text-left">Guest Name:</h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="font-weight:normal;">{{ $lists->Guest_Name }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3 class="text-left">Mobile Number:</h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="font-weight:normal;">{{ $lists->Mobile_Num }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3 class="text-left">Mobile Number:</h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="font-weight:normal;">{{ $lists->Mobile_Num }}</span>
                                                    </div>
                                                </div>
                                                @if ($lists->Booking_Status == 'Reserved')
                                                    <h3 class="text-left">Booking Status: <span
                                                            style="font-weight:normal; color: #5bc0de; margin-left:230px;"
                                                            class="str">{{ $lists->Booking_Status }}</span> </h3>
                                                @elseif($lists->Booking_Status == 'Checked-In')
                                                    <h3 class="text-left">Booking Status: <span
                                                            style="font-weight:normal; color: #5cb85c; margin-left:230px;"
                                                            class="str">{{ $lists->Booking_Status }}</span> </h3>
                                                @elseif($lists->Booking_Status == 'Checked-Out')
                                                    <h3 class="text-left">Booking Status: <span
                                                            style="font-weight:normal; color: #f0ad4e; margin-left:230px;"
                                                            class="str">{{ $lists->Booking_Status }}</span> </h3>
                                                @elseif($lists->Booking_Status == 'Cancelled')
                                                    <h3 class="text-left">Booking Status: <span
                                                            style="font-weight:normal; color: #d9534f; margin-left:230px;"
                                                            class="str">{{ $lists->Booking_Status }}</span> </h3>
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3 class="text-left">Checked-In Date: </h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span
                                                            style="font-weight:normal;">{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3 class="text-left">Checked-Out Date: </h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span
                                                            style="font-weight:normal;">{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- right side --}}
            <div class="col-md-6">
                <div class="row">
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Arriving Guests Today</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $arriving }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                                <i class="bi bi-box-arrow-in-up-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Departing Guests Today
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $checked_out_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-red text-white rounded-circle shadow">
                                                <i class="bi bi-box-arrow-down-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $pending_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Reservations</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $reserved_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                                <i class="bi bi-book"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Checked In Guests</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $checked_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="bi bi-door-open"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container d-flex justify-content-center">
                <div class="col-md-6 card shadow">
                    <h2><i class="bi bi-book-fill"></i> Hotel Booking</h2>
                    <canvas class="p-3" id="doughnutChart"></canvas>
                </div>
                <div class="col-md-6 card shadow">
                    <h2>Finance</h2>
                    <canvas class="p-3" id="myChart"></canvas>
                </div>
            </div>
        </div>
        {{-- <div class="container-fluid">
            <div class="header-body">
                <div class="row">
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Arriving Guests Today</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $checked_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                                <i class="bi bi-box-arrow-in-up-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Departing Guests Today
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $checked_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-red text-white rounded-circle shadow">
                                                <i class="bi bi-box-arrow-down-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $pending_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Reservations</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $reserved_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                                <i class="bi bi-book"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Checked In Guests</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $checked_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="bi bi-door-open"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">

                        <div class="card shadow card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Cancelled</h5>
                                            <span class="h2 font-weight-bold mb-0">5</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-red text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Click to view</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-center">
                    <div class="row mt-6" style="justify-content:center">
                        <div class="col-xl-8">
                            <h2><i class="bi bi-book-fill"></i> Hotel Booking</h2>
                            <canvas class="p-3" id="doughnutChart"></canvas>
                        </div>
                        <div class="col-md-8">
                            <h2>Finance</h2>
                            <canvas class="p-3" id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <input type="hidden" id="pending" value="{{ $pending_guests }}">
        <input type="hidden" id="reserve" value="{{ $reserved_guests }}">
        <input type="hidden" id="checked" value="{{ $checked_guests }}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <script>
            //doughnut
            var pending = document.getElementById("pending").value;
            var reserve = document.getElementById("reserve").value;
            var checked = document.getElementById("checked").value;

            var ctxD = document.getElementById("doughnutChart").getContext('2d');
            var myLineChart = new Chart(ctxD, {
                type: 'doughnut',
                data: {
                    labels: ["Pending Reservations", "Reservations", "Checked In"],
                    datasets: [{
                        data: [pending, reserve, checked, ],
                        backgroundColor: ["#e6d437", "#50ba67", "#428df5"],
                        hoverBackgroundColor: ["#a89b28", "#378247", "#2c61ab"]
                    }]
                },
                options: {
                    responsive: true
                }
            });


            <?php
            // Sample data for sales by daily
            $salesData = [$basketball_sum, $unearned_sum, $otherincome_sum, $parking_sum, $managementfee_sum, $event_sum, $hotel_sum, $commercialspace_sum];
            // Convert the data to a JSON-encoded string
            $dataString = json_encode($salesData);
            ?>

            var data = <?php echo $dataString; ?>;


            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Basketball', 'Unearned Income', 'Other Income(Stall, Venue, Other Charges)',
                        'Parking Rent/Parking Ticket', 'Management Fee', 'Function Room/Convention Center/Event',
                        'Hotel', 'Commercial Space'
                    ],
                    datasets: [{
                        label: 'Total Payments',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
        <script>
            var selecteddate = null;
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var booking = @json($events);

                $('#calendar').fullCalendar({
                    // editable: true,
                    header: {
                        left: 'prev,next, today',
                        center: 'title',
                        //right: 'month, agendaWeek, agendaDay'
                        right: 'month'
                    },
                    events: booking,
                    eventTextColor: 'white',
                    eventDisplay: 'block',
                    contentHeight: 450,
                    eventRender: function(events, element) {
                        if (events.status == "Reserved") {
                            element.css('background-color', '#5bc0de');
                        } else if (events.status == "Checked-In") {
                            element.css('background-color', '#5cb85c');
                        } else if (events.status == "Checked-Out") {
                            element.css('background-color', '#f0ad4e');
                        } else if (events.status == "Cancelled") {
                            element.css('background-color', '#d9534f');
                        }
                    },
                    //When Booking Clicked
                    eventClick: function(events) {
                        showEventModal(events.id);
                    }

                });

            });

            //Call Info Modal
            function showEventModal(bookingno) {
                $('#booking' + bookingno).modal('show');
            }

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
            .title {
                text-transform: uppercase;
                font-size: 25px;
                letter-spacing: 2px;
            }

            .fc-event {
                cursor: pointer;
            }

            .myCalendar {
                cursor: pointer;
            }

            @media (max-width: 600px) {
                .str {
                    position: relative;
                    right: 110px;
                }
            }
        </style>
    @endsection

    @push('js')
        <script src="../../assets/js/plugins/chartjs.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
