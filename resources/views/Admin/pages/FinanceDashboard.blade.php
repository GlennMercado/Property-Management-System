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
                                    <h2 class="mx-auto d-flex justify-content-center pt-4">Finance Monthly</h2>
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
    // Sample data for sales by month
    <?php
// Sample data for sales by month
$salesData = [];

foreach ($list as $lists) {
    array_push($salesData, $lists->bank, $lists->cash);
}

// Convert the data to a JSON-encoded string
$dataString = json_encode($salesData);
?>@foreach ($list as $lists)
    <?php
        // Sample data for sales by month
        $salesData = [ $lists->bank, 2, 1.5, 3, 2, 3.5 ];
        // Convert the data to a JSON-encoded string
        $dataString = json_encode($salesData);
    ?>
@endforeach

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
         var data = <?php echo $dataString; ?>;
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Cash/GCash', 'Unearned Income', 'Bank Transfer/Direct to Bank', 'Cheque', 'Basketball', 'Unearned Income'],
                datasets: [{
                    label: '',
                    data: data,
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
