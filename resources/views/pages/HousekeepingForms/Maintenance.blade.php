@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">  
        <div class="row">
            <div class="col">
                <div class="card" style="border: 2px solid black; margin-top:10px;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Sample</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="border: 2px solid black; margin-top:10px;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Sample</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="border: 2px solid black; margin-top:10px;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Sample</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
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