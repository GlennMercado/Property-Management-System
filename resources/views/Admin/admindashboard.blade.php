@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <div class="row">
            {{-- -xl-4 mb-5 mb-xl-0 --}}
            <div class="col">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header">
                        {{-- <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6> --}}
                        <p class="text-black font-weight-bold mb-0 display-4"><i class="bi bi-graph-up "></i>Dashboard</p>
                    </div>
                    <div class="row">
                        <div class="card-body container">
                            <div class="row d-flex justify-content-center">
                                <h3 class="text-muted col-md-12">Room Management</h3>
                                <canvas class="col-md-7" id="doughnutChart"></canvas>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ url('Hotel_Room_Management') }}">
                                        <div class="card card-stats shadow rm1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="display-4 font-weight-bold" id="vacant">
                                                            {{ $vacant }}</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                                            <i class="bi bi-house-door"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4 mb-0 text-sm">
                                                    <span class=" font-weight-bold">Vacant Room</span>
                                                    <br>
                                                    <span class="text-nowrap">Click to view</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ url('Hotel_Room_Management') }}">
                                        <div class="card card-stats shadow rm1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="display-4 font-weight-bold" id="occupied">
                                                            {{ $occupied }}</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                                            <i class="bi bi-house-door-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4 mb-0 text-sm">
                                                    <span class=" font-weight-bold">Occupied</span>
                                                    <br>
                                                    <span class="text-nowrap">Click to view</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('Hotel_Room_Management') }}">
                                        <div class="card card-stats shadow rm1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="display-4 font-weight-bold" id="reserved">
                                                            {{ $reserved }}</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                                            <i class="bi bi-calendar2-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4 mb-0 text-sm">
                                                    <span class=" font-weight-bold">Reserved</span>
                                                    <br>
                                                    <span class="text-nowrap">Click to view</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('Hotel_Room_Management') }}">
                                        <div class="card card-stats shadow rm1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="display-4 font-weight-bold" id="vacant_cleaning">
                                                            {{ $vacant_cleaning }}</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                                            <i class="bi bi-calendar2-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4 mb-0 text-sm">
                                                    <span class=" font-weight-bold">Vacant for cleaning</span>
                                                    <br>
                                                    <span class="text-nowrap">Click to view</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-5">
                                <h3 class="text-muted col-md-12">Front Desk</h3>
                                <canvas id="horizontalBar"></canvas>
                                <div class="col-md-6">
                                    <a href="{{ url('HotelReservationForm') }}">
                                        <div class="card card-stats shadow rm1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="display-4 font-weight-bold" id="reserved_guests">
                                                            {{ $reserved_guests }}</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                                            <i class="bi bi-house-door"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4 mb-0 text-sm">
                                                    <span class=" font-weight-bold">Reserved Guest</span>
                                                    <br>
                                                    <span class="text-nowrap">Click to view</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('HotelReservationForm') }}">
                                        <div class="card card-stats shadow rm1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="display-4 font-weight-bold" id="pending">
                                                            {{ $pending_guests }}
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                                            <i class="bi bi-house-door-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4 mb-0 text-sm">
                                                    <span class=" font-weight-bold">Pending reservations</span>
                                                    <br>
                                                    <span class="text-nowrap">Click to view</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('HotelReservationForm') }}">
                                        <div class="card card-stats shadow rm1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="display-4 font-weight-bold" id="check_in">
                                                            {{ $checked_guests }}
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                                            <i class="bi bi-calendar2-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4 mb-0 text-sm">
                                                    <span class=" font-weight-bold">Checked in</span>
                                                    <br>
                                                    <span class="text-nowrap">Click to view</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('HotelReservationForm') }}">
                                        <div class="card card-stats shadow rm1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="display-4 font-weight-bold" id="check_out">
                                                            {{ $checked_out_guests }}
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                                            <i class="bi bi-calendar2-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4 mb-0 text-sm">
                                                    <span class=" font-weight-bold">Checked out</span>
                                                    <br>
                                                    <span class="text-nowrap">Click to view</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('EventInquiryForm') }}">
                                        <div class="card card-stats shadow rm1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="display-4 font-weight-bold" id="check_out">
                                                            {{ $inquiries }}
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                                            <i class="bi bi-calendar2-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4 mb-0 text-sm">
                                                    <span class=" font-weight-bold">Event Inquiries</span>
                                                    <br>
                                                    <span class="text-nowrap">Click to view</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('CommercialSpaceForm') }}">
                                        <div class="card card-stats shadow rm1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="display-4 font-weight-bold" id="check_out">
                                                            {{ $comm_applications }}
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                                            <i class="bi bi-calendar2-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-4 mb-0 text-sm">
                                                    <span class=" font-weight-bold">Commercial Spaces applications</span>
                                                    <br>
                                                    <span class="text-nowrap">Click to view</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .rm1 {
                    height: 170px;
                }

                .rm1:hover {
                    border: 1px solid grey;
                    cursor: pointer;
                }
            </style>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
            <script>
                //doughnut
                var vacant = document.getElementById("vacant").innerHTML;
                var occupied = document.getElementById("occupied").innerHTML;
                var reserved = document.getElementById("reserved").innerHTML;
                var ctxD = document.getElementById("doughnutChart").getContext('2d');
                var vacant_cleaning = document.getElementById("vacant_cleaning").innerHTML;
                var myLineChart = new Chart(ctxD, {
                    type: 'doughnut',
                    data: {
                        labels: ["Vacant Room", "Occupied", "Reserved", "Vacant for cleaning"],
                        datasets: [{
                            data: [vacant, occupied, reserved, vacant_cleaning],
                            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1"],
                            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5"]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
                //doughnut1
                var reserved_guests = document.getElementById("reserved_guests").innerHTML;
                var pending = document.getElementById("pending").innerHTML;
                var check_in = document.getElementById("check_in").innerHTML;
                var check_out = document.getElementById("check_out").innerHTML;

                new Chart(document.getElementById("horizontalBar"), {
                    "type": "horizontalBar",
                    "data": {
                        "labels": ["Reserved Guests", "Pending Reservations", "Checked-in", "Checked-out"],
                        "datasets": [{ 
                            "label": "My First Dataset",
                            "data": [reserved_guests, pending, check_in, check_out],
                            "fill": false,
                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
                                "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)"
                            ],
                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
                                "rgb(75, 192, 192)"
                            ],
                            "borderWidth": 1
                        }]
                    },
                    "options": {
                        "scales": {
                            "xAxes": [{
                                "ticks": {
                                    "beginAtZero": true
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
