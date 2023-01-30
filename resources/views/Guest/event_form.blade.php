@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <div class="card-body">
            <div class="container mt-5">
                <h1>Event Inquiry</h1>
                <br>
                <form action="/store" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block form-control">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @include('layouts.footers.guest')
    @endsection
