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
                                <p class="text-black text-lg mb-0">Dashboard</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body rounded" style="background-color:#156C45;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">100</h1>
                                        <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">Guest
                                            Request</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body rounded" style="background-color:#23B271;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">200</h1>
                                        <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">Guest
                                            Reservation
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body rounded" style="background-color:#38474D;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">20</h1>
                                        <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">Guest
                                            Complaints
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body rounded" style="background-color:#38474D;">
                                        <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">10</h1>
                                        <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">Report
                                            Count
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <p class="text-lg pt-6"><i class="bi bi-bar-chart-line mr-2"></i>Insights</p>
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
