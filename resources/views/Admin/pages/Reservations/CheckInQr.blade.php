@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <div class="row align-items-center ml-2 mt--7">
        <div class="col-lg-12 col-12">
            <h6 class="h2 text-dark d-inline-block mb-0">Qr Scanner</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item">Sales & Marketing</li>
                    <li class="breadcrumb-item active text-dark" aria-current="page">Qr Scanner</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container d-flex flex-column align-items-center">
        <div class="card card-profile shadow p-4 mt-5" style="width: 100%">
            <div class="card-body pb-4">
                <div class="text-center">
                    <form method="POST" class="prevent_submit" action="{{ url('/complaints_status') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @foreach ($list as $list)
                            <h1>
                                {{ $list->Guest_Name }}<span class="font-weight-light"></span>
                            </h1>
                            <h3 style="border-bottom: 1px solid rgb(60, 60, 60)">
                                {{ $list->Email }}
                            </h3>
                            <input type="hidden" name="booking" value="{{ $list->Booking_No }}">
                            <p class="display-4">
                                Booking number: {{ $list->Booking_No }}
                                <br>
                                Room number: {{ $list->Room_No }}
                            </p>
                            <p class="font-weight-bold">
                                Pax: {{ $list->No_of_Pax }}
                                <br>
                                Check in date: {{ $list->Check_In_Date }}
                                <br>
                                Check out date: {{ $list->Check_Out_Date }}
                            </p>
                            <button class="form-control bg-green">
                                <h3 class="text-white">Check In</h3>
                            </button>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
@endpush
