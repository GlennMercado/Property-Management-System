<!-- verify-email-resend.blade.php -->
@extends('layouts.registerlogin', ['class' => 'bg-light'])

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Resend Verification Link') }}</div>

        <div class="card-body">
            <br><br>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Verification Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
