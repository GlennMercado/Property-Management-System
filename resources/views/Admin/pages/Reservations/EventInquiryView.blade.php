@extends('layouts.printpage')

@section('content')
    @foreach ($list as $list)
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 mt-5">
                addadasss

            </div>
        </div>
    @endforeach
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
