@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('Admin.users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
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
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
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
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" onclick="btn1()" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
