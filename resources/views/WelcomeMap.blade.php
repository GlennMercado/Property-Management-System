@extends('layouts.welcome_layout', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <div class="container-fluid bg-white">
        <div class="text-center pt-7">
            <h1 class="display-1">NVDC Properties Location</h1>
            <br>
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 cards1">
                    <div class="shadow1">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe class="gmap_iframe" height="400px" width="100%"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                    src="https://maps.google.com/maps?width=660&amp;height=500px&amp;hl=en&amp;q=Brgy, 123 General Luis, Novaliches, Lungsod Quezon, Kalakhang Maynila&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                    href="https://formatjson.org/"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Brgy, 123 General Luis, Novaliches, Lungsod Quezon, Kalakhang Maynila</p>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    <div class="container mt--5 pb-5"></div>
@endsection
