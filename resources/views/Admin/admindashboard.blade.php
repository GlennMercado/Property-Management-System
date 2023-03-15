@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">

        <div class="row">
            {{-- -xl-4 mb-5 mb-xl-0 --}}
            <div class="col">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                {{-- <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6> --}}
                                <p class="text-black font-weight-bold mb-0 display-4"><i
                                        class="bi bi-graph-up mr-2"></i>Dashboard</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3" style="width: 100%;">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body shadow bg-gradient-blue" class="height: 250px">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="card-title text-uppercase text-muted mb-0 text-white">Guest
                                                    Reservation</h3>
                                                <span class="h2 font-weight-bold mb-0 text-white display-3">{{ $reserved_guests }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-dark text-white rounded-circle shadow">
                                                    <i class="bi bi-person-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0">
                                            <span class="text-nowrap text-white">Click to view</span>
                                        </p>
                                    </div>
                                </div>
                            </div>                
                        </div>
                        <div class="container-fluid">
                            <p class="font-weight-bold pt-6"><i class="bi bi-bar-chart-line mr-2"></i>Insights</p>
                            <div class="row">
                                <div class="col">
                                    <h2 class="mx-auto d-flex justify-content-center pt-4">Guest Reservation</h2>
                                    <div class="row mx-auto d-flex justify-content-center">
                                        <div class="col-md">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h2 class="mx-auto d-flex justify-content-center pt-4">Guest Complaints</h2>
                                    <div class="row mx-auto d-flex justify-content-center">
                                        <div class="col-md">
                                            <canvas id="myChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h2 class="mx-auto d-flex justify-content-center pt-4">Guest Request</h2>
                                    <div class="row mx-auto d-flex justify-content-center">
                                        <div class="col-md">
                                            <canvas id="myChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: '',
                    data: [0, 0, 0, 5, 2, 3],
                    backgroundColor: [
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948'
                    ],
                    borderColor: [
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948'
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
        // second graph
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: '',
                    data: [0, 0, 0, 5, 2, 3],
                    backgroundColor: [
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948'
                    ],
                    borderColor: [
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948'
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
        // third graph
        var ctx3 = document.getElementById('myChart3').getContext('2d');
        var myChart3 = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: '',
                    data: [0, 0, 0, 5, 2, 3],
                    backgroundColor: [
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948'
                    ],
                    borderColor: [
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948',
                        '#55b948'
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
