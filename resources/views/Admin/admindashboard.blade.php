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
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="col text-right">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                    href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                    aria-selected="true">Event Inquiries</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                    href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                    aria-selected="false"> Application </a>
                            </li>
                        </ul>
                        <div style="padding:8px;">
                            <div class="table-responsive">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-1-tab">
                                        <div class="container-fluid mt-4">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-2-tab">
                                        <div class="container-fluid mt-4">
                                            <div id="calendar2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                <div class="row mt-4">
                    <div class="col-md-12">
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
            </div>
        </div>
        <div class="row">
            <div class="container d-flex justify-content-center">
                <div class="row mt-6" style="justify-content:center">
                    <div class="col-xl-8">
                        <h2><i class="bi bi-book-fill"></i> Hotel Booking</h2>
                        <canvas class="p-3" id="doughnutChart"></canvas>
                    </div>
                    <div class="col-xl-8">
                        <h2>Finance</h2>
                        <canvas class="p-3" id="myChart"></canvas>
                    </div>
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
        <input type="hidden" id="cancelled" value="{{ $reserved_guests }}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <script>
            // Event Inquiry calendar
            $(document).ready(function() {
                // Define options and events for FullCalendar
                var calendarOptions = {
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: '2023-04-23',
                    navLinks: true,
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [{
                            title: 'Event 1',
                            start: '2023-04-23T10:00:00',
                            end: '2023-04-23T12:00:00'
                        },
                        {
                            title: 'Event 2',
                            start: '2023-04-25T14:00:00',
                            end: '2023-04-25T16:00:00'
                        },
                        // more events here
                    ]
                };

                // Initialize FullCalendar on both elements
                $('#calendar').fullCalendar(calendarOptions);
                $('#calendar2').fullCalendar(calendarOptions);
            });
            // Application Calendar
            $(document).ready(function() {
                $('#calendar2').fullCalendar({
                    // Set options and callbacks
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: '2023-04-23',
                    navLinks: true,
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [{
                            title: 'Event 1',
                            start: '2023-04-23T10:00:00',
                            end: '2023-04-23T12:00:00'
                        },
                        {
                            title: 'Event 2',
                            start: '2023-04-25T14:00:00',
                            end: '2023-04-25T16:00:00'
                        },
                        // more events here
                    ]
                });
            });
            //doughnut
            var pending = document.getElementById("pending").value;
            var reserve = document.getElementById("reserve").value;
            var checked = document.getElementById("checked").value;

            var ctxD = document.getElementById("doughnutChart").getContext('2d');
            var myLineChart = new Chart(ctxD, {
                type: 'doughnut',
                data: {
                    labels: ["Pending Reservations", "Reservations", "Checked In", "Cancelled", ],
                    datasets: [{
                        data: [reserve, reserve, checked, 1],
                        backgroundColor: ["#e6d437", "#50ba67", "#428df5", "#ba5062"],
                        hoverBackgroundColor: ["#a89b28", "#378247", "#2c61ab", "#7a333f"]
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
    @endsection

    @push('js')
        <script src="../../assets/js/plugins/chartjs.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
