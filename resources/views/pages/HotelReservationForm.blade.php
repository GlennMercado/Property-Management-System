@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <style>
        .hcolor {
            color: #8898aa;
        }
    </style>
    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class=" col ">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">Hotel Reservation Form</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="hcolor">Registration Card</h3>
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <h4>Date:</h4>
                                    </div>
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control datepicker" placeholder="Select date" type="text"
                                                value="06/20/2020" readonly>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <h4>Reservation No.</h4>
                                    <input type="text" class="form-control" placeholder="Default input" readonly>
                                </div>
                                <div class="col-12">
                                    <br>
                                    <h4>Guest Name:</h4>
                                    <input type="text" class="form-control" placeholder="Default input">
                                </div>
                                <div class="col-12">
                                    <br>
                                    <h4>Address:</h4>
                                    <input type="text" class="form-control" placeholder="Default input">
                                </div>
                                <div class="col-6">
                                    <br>
                                    <h4>Mobile No.:</h4>
                                    <input type="text" class="form-control" placeholder="Default input">
                                </div>
                                <div class="col-6">
                                    <br>
                                    <h4>Landline:</h4>
                                    <input type="text" class="form-control" placeholder="Default input">
                                </div>
                                <div class="col-12">
                                    <br>
                                    <h4>Organization:</h4>
                                    <input type="text" class="form-control" placeholder="Default input">
                                </div>
                                <div class="col-12">
                                    <br>
                                    <h4>Landline:</h4>
                                    <input type="text" class="form-control" placeholder="Default input">
                                </div>
                                <div class="col-12">
                                  <br>
                                  <button type="button" class="btn btn-primary btn-lg btn-block">Submit</button>
                              </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
