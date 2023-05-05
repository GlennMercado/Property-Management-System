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
                            
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#pictureModal">Edit</button>
                        </div>
                    </div>
                    <div class="card-body pt-8 pb-4">
                        <div class="text-center">
                            <h3>{{ auth()->user()->name }}<span class="font-weight-light"></span></h3>
                            <h3>{{ auth()->user()->email }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Profile Picture Modal -->
                <div class="modal fade" id="pictureModal" tabindex="-1" role="dialog" aria-labelledby="pictureModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="pictureModalLabel">Upload Profile Picture</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="file" class="form-control-file" id="picture" name="picture"
                                            accept="image/*" required>
                                        <small id="pictureHelp" class="form-text text-muted">Please choose an image file
                                            (JPG, PNG, GIF) to upload.</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true"><i class="bi bi-person-lines-fill"></i> Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                aria-selected="false"><i class="bi bi-patch-exclamation-fill"></i> My Complaints</a>
                        </li>
                    </ul>
                </div>
                <div class="card shadow mb-2">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                aria-labelledby="tabs-icons-text-1-tab">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-center">
                                        <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                                        @csrf
                                        @method('put')

                                        <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                                        @if (session('password_status'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('password_status') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        <div class="pl-lg-4">
                                            <div
                                                class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
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
                                                <label class="form-control-label"
                                                    for="input-password">{{ __('New Password') }}</label>
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
                                                <input type="password" name="password_confirmation"
                                                    id="input-password-confirmation"
                                                    class="form-control form-control-alternative"
                                                    placeholder="{{ __('Confirm New Password') }}" value=""
                                                    required>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <h1>My Complaints</h1>
                                <div class="row">
                                    @foreach ($list as $list)
                                        <div class="card shadow mb-2" data-toggle="tooltip" data-placement="bottom"
                                            title="{{ $list->concern }} {{ $list->created_at }}" style="width: 100%">
                                            <div class="card-body font-weight-bold mt--4">
                                                @if ($list->status == 'Resolved')
                                                    <h2 class="text-success mt-2 mb--1">
                                                        {{ $list->status }}<i class="bi bi-check"></i>
                                                    </h2>
                                                @elseif ($list->status == 'Scheduled')
                                                    <h2 class="text-blue mt-2 mb--1">
                                                        {{ $list->status }} <i class="bi bi-calendar-check-fill"></i>
                                                        {{ \Carbon\Carbon::parse($list->schedule)->format('l, F jS, Y') }}
                                                    </h2>
                                                @else
                                                    <h2 class="text-red mt-2 mb--1">
                                                        {{ $list->status }}<i class="bi bi-hourglass-bottom"></i>
                                                    </h2>
                                                @endif
                                                <span class="badge badge-pill badge-primary category mt-2">
                                                    {{ $list->concern }}
                                                </span>
                                                <span class="text-muted text-sm ml-2">{{ $list->created_at }}</span>
                                                <br>
                                                <br>
                                                <span class="ml-1">{{ $list->concern_text }}</span>
                                                <br>
                                                <a href="{{ $list->complaints_img }}" data-lightbox="photos"
                                                    data-gallery="complaints">
                                                    <img src="{{ $list->complaints_img }}" class="card-img-top mt-2"
                                                        data-lightbox="photos" data-gallery="complaints"
                                                        style="max-height: 350px; max-width:500px;" />
                                                </a>
                                                @if ($list->status == 'Scheduled')
                                                    <div class="card shadow mb-2 p-3 mt-2"
                                                        style="width: 100%; border: 1px solid rgb(50, 199, 50); background-color: aliceblue">
                                                        <label class="text-green font-weight-bold">Remarks</label>
                                                        <p class="font-weight-bold">{{ $list->remarks }}</p>
                                                    </div>
                                                @endif
                                                @if ($list->status == 'Resolved')
                                                    <div class="card shadow mb-2 p-3 mt-2"
                                                        style="width: 100%; border: 1px solid rgb(50, 199, 50); background-color: aliceblue">
                                                        <label class="text-green font-weight-bold">Remarks</label>
                                                        <p class="font-weight-bold">{{ $list->remarks }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if (!$list)
                                    <img src="{{ asset('nvdcpics') }}/complaints1.svg" class="img-fluid"
                                        style="width: 100%; height: 300px">
                                    <p class="text-center display-4">There are no complaints yet</p>
                                @endif
                            </div>
                        </div>
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
