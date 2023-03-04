@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <div class="row">
        <div class="col-md-4">
            <h1>Guest Reservation</h1>
            <form id="reserveform">
                <input type="text" name="username" id="username" class="form-control">
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
