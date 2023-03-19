@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active text-dark" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card card-stats">
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
                        <div class="card card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Departing Guests Today</h5>
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
                        <div class="card card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pending Reservations</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $pending_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
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
                        <div class="card card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Reservations</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $reserved_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
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
                        <div class="card card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Checked In Guests</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $checked_guests }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
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

                        <div class="card card-stats">
                            <a href="{{ route('HotelReservationForm') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Cancelled</h5>
                                            <span class="h2 font-weight-bold mb-0">5</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
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
                <div class="row mt-5">
                    <div class="col-xl-6">
                        <h2><i class="bi bi-book-fill"></i> Hotel Booking</h2>
                        <canvas id="doughnutChart"></canvas>
                    </div>
                    <div class="col-xl-6">
                        <h2>Finance</h2>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="pending" value="{{ $pending_guests }}">
        <input type="hidden" id="reserve" value="{{ $reserved_guests }}">
        <input type="hidden" id="checked" value="{{ $checked_guests }}">
        <input type="hidden" id="cancelled" value="{{ $reserved_guests }}">

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

            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
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
