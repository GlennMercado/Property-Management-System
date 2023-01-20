@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class=" col ">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h2 class="mb-0 title">Event Inquiry Form</h2>
                        </div>
                        <form action="">
                        <div class="card-body">
                            <h3 class = "title-color">Tell us about you</h3>
                            <hr class = "line">
                            <div class = "row pt-1">
                                <div class = "col">
                                    <h4 class = "text-color">Client Name </h4>
                                    <input type="text" class="form-control" placeholder="Enter client name" required>
                                </div>
                                <div class = "col">
                                    <h4 class = "text-color">Contact Number </h4>
                                    <input type="number" class="form-control" placeholder="Enter contact no." required>
                                </div>
                            </div>
                            <div class = "row pt-4">
                                <div class = "col">
                                    <h4 class = "text-color">Contact Person </h4>
                                    <input type="text" class="form-control" placeholder="Enter contact person" required>
                                </div>
                                <div class = "col">
                                    <h4 class = "text-color">Contact Number </h4>
                                    <input type="number" class="form-control" placeholder="Enter contact no." required>
                                </div>
                            </div>  
                            <h4 class = "pt-4 text-color">Billing Address </h4>
                            <input type="text" class="form-control" placeholder="Enter billing address" required>
                            <h4 class = "pt-4 text-color">Contact Email </h4>
                            <input type="text" class="form-control" placeholder="Enter email address" required>
                            <br>
                            <h3 class = "title-color">Tell us about your event</h3>
                            <hr class = "line">
                            <br>
                            <h4 class = "text-color">Event Name </h4>
                            <input type="text" class="form-control" placeholder="Enter event name" required>
                            <h4 class = "pt-4 text-color">Event Type </h4>
                            <input type="text" class="form-control" placeholder="Enter event type" required>
                            <br>
                            <div class="container">

                                <div class="row">
                                    <div class="col">
                                        <h4 class = "text-color">Event Date/Time </h4>
                                        <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00"
                                            id="example-datetime-local-input" required>
                                    </div>
                                    <div class="col">
                                        <span>
                                            <h4 class = "text-color">Expected No. of Guest </h4>
                                            <input type="number" class="form-control form-control-alternative"
                                                placeholder="Enter expected no. of guest" required>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4 class = "text-color">Venue</h4>
                                    </div>
                                    <div class="col-sm">
                                        <div class="custom-control custom-radio custom-control-inline">

                                            <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">Yes</label>

                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="custom-control custom-radio custom-control-inline">

                                            <input type="radio" onclick="enableinput()" id="customRadioInline2"
                                                name="customRadioInline1" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">No Specify:
                                            </label>
                                            <input id="others" class="form-control" type="text" readonly>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4 class = "text-color">Caterer</h4>
                                    </div>
                                    <div class="col-sm">
                                        <div class="custom-control custom-radio custom-control-inline">

                                            <input type="radio" id="customRadioInline3" name="customRadioInline2"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline3">Yes</label>

                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="custom-control custom-radio custom-control-inline">

                                            <input type="radio" onclick="enableinput2()" id="customRadioInline4"
                                                name="customRadioInline2" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline4">No Specify:
                                            </label>
                                            <input id="others2" class="form-control" type="text" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <input type="submit" class="btn btn-success btn-lg btn-block"></button>                                  
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
           
        </div>
        </form> 
        <script>
            function enableinput() {
                $('input[type=radio][name=customRadioInline1]').change(function() {
                    if (this.id == 'customRadioInline2') {
                        $('#others').attr('readonly', false);
                    } else {
                        $('#others').val('');
                        $('#others').attr('readonly', true);

                    }
                })
            }
            function enableinput2() {
                $('input[type=radio][name=customRadioInline2]').change(function() {
                    if (this.id == 'customRadioInline4') {
                        $('#others2').attr('readonly', false);
                    } else {
                        $('#others2').val('');
                        $('#others2').attr('readonly', true);

                    }
                })
            }
        </script>
<style>
    .title{
        text-transform:uppercase;
        font-size:25px;
        letter-spacing:2px;
    }
    .line{
        border:2px solid black;
        width:35%;
        display: inline-block; 
        align-items:right;
        margin-top:10px;
    }
    .title-color{
        color:#484848;
        font-size:20px;
    }
    .text-color{
        font-size:18px;
        color:#6C6C6C;
    }
        @media (max-width: 800px){
            .line{
            width:100%;
            }
        }
</style>
    @include('layouts.footers.auth')
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
      
    @endpush
