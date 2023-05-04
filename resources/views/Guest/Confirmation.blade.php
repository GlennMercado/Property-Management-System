@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <div class="container mt-6" style="min-height: 65vh">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 card shadow p-4" style="min-height: 70vh">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('nvdcpics') }}/thumb.png" class="mt-5" style="width: 150px; height: 150px;">
                </div>
                <h1 class="text-center mt-3">
                    Hello {{ Auth::user()->name }}
                </h1>
                <h1 class="text-center">
                    Thank you for your reservation!
                </h1>
                <p class="display-5 text-center font-weight-bold">
                    We're looking forward to providing you with the best hotel experience, however, at the moment, your
                    <strong>booking status</strong> is still <strong>pending.</strong>
                </p>
                <div class="d-flex justify-content-end flex-column">
                    <a href="{{ url('/welcome') }}">
                        <button type="button" class="btn btn-success form-control">Go to homepage</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
