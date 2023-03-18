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
                <div class="row mb-2">
                    <div class="col-xl-6">
                        <div id="donutchart" style="height: 500px;"></div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card" style="height: 500px;">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Social traffic</h3>
                                    </div>
                                    <div class="col text-right">
                                        <a href="#!" class="btn btn-sm btn-primary">See all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Referral</th>
                                            <th scope="col">Visitors</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                Facebook
                                            </th>
                                            <td>
                                                1,480
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2">60%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 60%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Facebook
                                            </th>
                                            <td>
                                                5,480
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2">70%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success" role="progressbar"
                                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 70%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Google
                                            </th>
                                            <td>
                                                4,807
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2">80%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-primary" role="progressbar"
                                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 80%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Instagram
                                            </th>
                                            <td>
                                                3,678
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2">75%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-info" role="progressbar"
                                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 75%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                twitter
                                            </th>
                                            <td>
                                                2,645
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2">30%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-warning" role="progressbar"
                                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 30%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                                        <span class="h2 font-weight-bold mb-0">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                        <span class="h2 font-weight-bold mb-0">2,356</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                        <span class="h2 font-weight-bold mb-0">924</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                        <span class="h2 font-weight-bold mb-0">49,65%</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                                        <span class="h2 font-weight-bold mb-0">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                        <span class="h2 font-weight-bold mb-0">2,356</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                        <span class="h2 font-weight-bold mb-0">924</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                        <span class="h2 font-weight-bold mb-0">49,65%</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                                        <span class="h2 font-weight-bold mb-0">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                        <span class="h2 font-weight-bold mb-0">2,356</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                        <span class="h2 font-weight-bold mb-0">924</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                        <span class="h2 font-weight-bold mb-0">49,65%</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
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
                    </div> --}}



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
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Work', 11],
                    ['Eat', 2],
                    ['Commute', 2],
                    ['Watch TV', 2],
                    ['Sleep', 7]
                ]);

                var options = {
                    title: 'My Daily Activities',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
        </script>
        {{-- <script>
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
        </script> --}}
    @endsection

    @push('js')
        <script src="../../assets/js/plugins/chartjs.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
