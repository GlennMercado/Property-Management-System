@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin')

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

    <div class="container mt-8">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url('rooms') }}">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 22rem;">
                        <img class="card-img-top container" src="{{ asset('nvdcpics') }}/suites.png" alt="Card image cap">
                        <div class="card-body ">
                            <h5 class="card-title">Suites</h5>
                            <p class="card-text text-dark">A suite is a luxurious accommodation found in hotels, offering a
                                large
                                living area, bedroom, and often a kitchenette or dining area.</p>
                            <button class="btn btn-success">Book Now</button>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4" style="margin: 0; padding: 0">
                <a href="{{ url('convention_center') }}">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 22rem;">
                        <img class="card-img-top container" src="{{ asset('nvdcpics') }}/convention3.png" alt="Card image cap" style="width: 18rem">
                        <div class="card-body ">
                            <h5 class="card-title">Convention Center</h5>
                            <p class="card-text text-dark">A convention center is a large facility specifically designed to
                                host
                                conventions, trade shows, and other events.</p>
                            <button class="btn btn-success">Book Now</button>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4" style="margin: 0; padding: 0">
                <a href="{{ url('commercial_spaces') }}">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 22rem;">
                        <img class="card-img-top container" src="{{ asset('nvdcpics') }}/nv9.png" alt="Card image cap">
                        <div class="card-body ">
                            <h5 class="card-title">Commercial Space</h5>
                            <p class="card-text text-dark">Commercial space refers to any type of property used for business
                                or
                                commercial purposes. This can include retail stores.</p>
                            <button class="btn btn-success">Apply Now</button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <style>
        /* .img1 img {
                                        filter: blur(1px) brightness(49%);
                                        -webkit-filter: blur(1px) brightness(49%);
                                        -moz-filter: blur(1px) brightness(49%);
                                    } */
    </style>
@endsection
