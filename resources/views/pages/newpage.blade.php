@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class="col">
               <div class="card">
                <div class="row">
                    <div class="card-header transparent">
                        <h3 class="mb-0">Hotel Reservation Form</h3>
                    </div>
                    <div class="card-body">
                <h1>testing</h1>
                <h1>testing</h1>
                <h1>testing</h1>
                <h1>testing</h1>
                <h1>testing</h1>
                <h1>testing</h1>
                <h1>testing</h1>
            </div>
            </div>
            </div>



            </div>

            </div>
            @include('layouts.footers.auth')
        </div>
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
