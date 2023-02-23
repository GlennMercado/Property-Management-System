@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <div class="row">
        <div class="col-md-4">
            <h1>TEST Room Available</h1>
            <form id="reserveform">
                <input type="text" name="username" id="username" class="form-control">
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    <style>
        .error {
            color: red;
            font-size: 120px;
        }
    </style>
    <script>
        $(function() {
            var $reserve = $("#reserveform");
            if ($reserve.length) {
                $reserve.validate({
                    rules: {
                        username: {
                            required: true
                        }
                    },
                    messages: {
                        username: {
                            required: 'Please enter your number!'
                        }
                    }
                })
            }
        })
    </script>
@endsection
