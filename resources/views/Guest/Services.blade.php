@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin')

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <div class="container" style="min-height: 100vh">
        <div class="row mt-8">
            <div class="col-md-6">
                <div class="card text-white text-center mb-4">
                    <img src="{{ asset('nvdcpics') }}/hotel7.png" alt="Travel1" class="card-img img1">
                    <div class="card-img-overlay">
                        <h2 class="card-title text-white">Journey to Paradise</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur sequi
                            quis repellendus?</p>
                        <p class="card-text">Rerum consectetur autem repellat quo amet obcaecati quasi perspiciatis
                            perferendis quisquam debitis!</p>
                        <a href="#" class="btn btn-dark text-white mt-1">More details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white text-center mb-4">
                    <img src="http://html-plus.in.ua/wp-content/uploads/2018/07/boat.jpg" alt="travel2"
                        class="card-img img1">
                    <div class="card-img-overlay">
                        <h2 class="card-title text-white">Boat trip</h2>
                        <p class="card-text">Quos, magni minus. Consectetur error sed quae magnam ut id mollitia ullam.</p>
                        <p class="card-text">Officiis esse dolores rem magni voluptatibus cupiditate quae, corrupti deleniti
                            possimus inventore!</p>
                        <a href="#" class="btn btn-dark text-white mt-1">More details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white text-center mb-4">
                    <img src="http://html-plus.in.ua/wp-content/uploads/2018/07/boat.jpg" alt="travel2"
                        class="card-img img1">
                    <div class="card-img-overlay">
                        <h2 class="card-title text-white">Boat trip</h2>
                        <p class="card-text">Quos, magni minus. Consectetur error sed quae magnam ut id mollitia ullam.</p>
                        <p class="card-text">Officiis esse dolores rem magni voluptatibus cupiditate quae, corrupti deleniti
                            possimus inventore!</p>
                        <a href="#" class="btn btn-dark text-white mt-1">More details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="content" style="min-height: 100vh">
        <div class="position-relative">
            <img src="{{ asset('nvdcpics') }}/NovadeciHomepage.png" class="img-fluid" style="min-height: 100vh; width: 100%">
            <div class="position-absolute d-flex align-items-center text-center"
                style="top:0; left:0; right:0; bottom:0; background-color: rgba(0, 0, 0, 0.5); color: rgb(255, 255, 255);">
                <div class="container mx-auto">
                    <div class="row mt-5">
                        <div class="col-md-4 rounded">
                            <div class="h-50 d-inline-block p-5">
                                <h1 class="text-white font-weight-bold">Suites</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, deleniti saepe.
                                    Consequuntur animi corporis commodi aliquid blanditiis dolores alias, iusto expedita
                                    voluptas eum id quidem earum neque atque pariatur aliquam.</p>
                            </div>
                            <img src="{{ asset('nvdcpics') }}/hotel7.png" class="img-fluid img1">
                        </div>
                        <div class="col-md-4 rounded">
                            <div class="h-50 d-inline-block p-5 ">
                                <h1 class="text-white font-weight-bold">Convention Center</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, deleniti saepe.
                                    Consequuntur animi corporis commodi aliquid blanditiis dolores alias, iusto expedita
                                    voluptas eum id quidem earum neque atque pariatur aliquam.</p>
                            </div>
                            <img src="{{ asset('nvdcpics') }}/FunctionRoom7.png" class="img-fluid img1">
                        </div>
                        <div class="col-md-4 rounded">
                            <div class="h-50 d-inline-block p-5">
                                <h1 class="text-white font-weight-bold">Commercial Spaces</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, deleniti saepe.
                                    Consequuntur animi corporis commodi aliquid blanditiis dolores alias, iusto expedita
                                    voluptas eum id quidem earum neque atque pariatur aliquam.</p>
                            </div>
                            <img src="{{ asset('nvdcpics') }}/FunctionRoom7.png" class="img-fluid img1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <style>
        .img1 img {
            filter: blur(1px) brightness(49%);
            -webkit-filter: blur(1px) brightness(49%);
            -moz-filter: blur(1px) brightness(49%);
        }
    </style>
@endsection
