@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    @include('layouts.navbars.navs.guestloggedin')
    <div class="position-relative">
        <img src="{{ asset('nvdcpics') }}/NovadeciHomepage.png" class="img-fluid" style="max-height: 400px; width: 100%">
        <div class="position-absolute d-flex align-items-center text-center"
            style="top:0; left:0; right:0; bottom:0; background-color: rgba(0, 0, 0, 0.5); color: white;">
            <div class="container mx-auto mt-7 ">
                <h1 class="image-text uppercase text-uppercase display-3 text-white">
                    Hello {{ auth()->user()->name }}!
                </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="lightbox-gallery">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="{{ url(auth()->user()->profile_pic) }}" data-lightbox="photos">
                                        <img src="{{ url(auth()->user()->profile_pic) }}" class="rounded-circle"
                                            style="width: 180px; height: 180px">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0">
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="card-body pt-8 pb-4">
                        {{-- <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center p-6 mt--6">

                                </div>
                            </div>
                        </div> --}}
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light"></span>
                            </h3>
                            <h3>
                                {{ auth()->user()->email }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                        for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password"
                                        class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Current Password') }}" value="" required>

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password"
                                        class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('New Password') }}" value="" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label"
                                        for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation"
                                        class="form-control form-control-alternative"
                                        placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .lb-outerContainer {
            width: auto;
            min-height: 200px;
        }

        .lb-image {
            width: auto !important;
            min-height: 200px !important;
        }
    </style>
@endsection
