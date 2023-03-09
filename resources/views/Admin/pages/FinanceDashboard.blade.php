@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">

        <div class="row">
            {{-- -xl-4 mb-5 mb-xl-0 --}}
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
@foreach ($list as $lists)
    <?php
    // Sample data for sales by daily
    $salesData = [$lists->cash, $lists->unearned, $lists->otherincome, $lists->parking, $lists->managementfee, $lists->event, $lists->hotel, $lists->commercialspace];
    // Convert the data to a JSON-encoded string
    $dataString = json_encode($salesData);
    ?>
@endforeach
    var data = <?php echo $dataString; ?>;
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Basketball', 'Unearned Income', 'Other Income(Stall, Venue, Other Charges)', 'Parking Rent/Parking Ticket', 'Management Fee', 'Function Room/Convention Center/Event', 'Hotel', 'Commercial Space'],
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
