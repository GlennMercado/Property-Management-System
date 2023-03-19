@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Finance Dashboard</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Finance</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Finance Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <h2 class="mx-auto d-flex justify-content-center pt-4">Finance Daily</h2>
                                    <div class="row mx-auto d-flex justify-content-center">
                                        <div class="col-md">
                                            <canvas id="myChart"></canvas>
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
        <?php
        // Sample data for sales by daily
        $salesData = [$basketball_sum, $unearned_sum, $otherincome_sum, $parking_sum, $managementfee_sum, $event_sum, $hotel_sum, $commercialspace_sum];
        // Convert the data to a JSON-encoded string
        $dataString = json_encode($salesData);
        ?>

        var data = <?php echo $dataString; ?>;
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Basketball', 'Unearned Income', 'Other Income(Stall, Venue, Other Charges)',
                    'Parking Rent/Parking Ticket', 'Management Fee', 'Function Room/Convention Center/Event',
                    'Hotel', 'Commercial Space'
                ],
                datasets: [{
                    label: '',
                    data: data,
                    backgroundColor: [
                        '#55b948',
                        '#55b948',
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
