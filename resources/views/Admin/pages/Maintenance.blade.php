@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">                 
        <br>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">Maintenance</h3>
                            </div>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <select class="form-control" style="border:2px solid" id="optionselect" >
                                    <option value="Out of Order" selected="true">Out of Order</option>
                                    <option value="Out of Service">Out of Service</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <!--Out of Order-->
                        <div class="row align-items-center" id="order">
                            <div class="col">
                                <h3 class="mb-0">Out of Order</h3>
                            </div>
                            <!-- <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div> -->
                        </div>
                        <!--Out of Service-->
                        <div class="row align-items-center" id="service" style="display:none;">
                            <div class="col">
                                <h3 class="mb-0">Out of Service</h3>
                            </div>
                            <!-- <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div> -->
                        </div>
                    </div>
                    <!--Out of Order-->
                    <div class="table-responsive" id="outoforder">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Room No.</th>
                                    <th scope="col">Booking Status</th>
                                    <th scope="col">Housekeeping Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                outoforder
                            </tbody>
                        </table>
                    </div>

                    <!--Out of Service-->
                    <div class="table-responsive" id="outofservice" style="display:none;">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Room No.</th>
                                    <th scope="col">Booking Status</th>
                                    <th scope="col">Housekeeping Status</th>
                                </tr>
                            </thead>
                            <tbody>
                               outofservice
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
        
        <br>

        



<script>
    $(document).ready(function(){
        $("#optionselect").change(function(){
        var selected = $("option:selected", this).val();
        if(selected == 'Out of Order')
        {
            $('#outoforder, #order').show();
            $('#outofservice, #service').hide();
        }
        else if(selected == 'Out of Service')
        {
            $('#outoforder, #order').hide();
            $('#outofservice, #service').show();
        }

    });
    });
</script>        
        
@include('layouts.footers.auth')
    
    </div>


    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush