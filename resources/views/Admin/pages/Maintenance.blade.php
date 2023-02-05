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
                                <h2 class="mb-0 title">Maintenance</h3>
                            </div>
                        </div>
                        <!--Out of Order-->
                        <div class="row align-items-center" id="order">
                            <!-- <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
                    <!--Out of Order-->
                    <div class="table-responsive" id="outoforder">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style = "font-size:18px;">Room No.</th>
                                    <th scope="col" style = "font-size:18px;">Booking Status</th>
                                    <th scope="col" style = "font-size:18px;">Housekeeping Status</th>
                                    <th scope="col" style = "font-size:18px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($list as $lists)
                                @if($lists->Housekeeping_Status == "Out of Order")
                                    <tr>
                                        <td style = "font-size:16px;">{{$lists->Room_No}}</td>
                                        <td style = "font-size:16px;">{{$lists->Status}}</td>
                                        <td style = "font-size:16px; color:#E46000;">{{$lists->Housekeeping_Status}}</td>
                                        <td>
                                            <!--Update Status button-->
                                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#update{{$lists->Room_No}}"> 
                                                <i class="bi bi-arrow-repeat"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif

                                <!--Update Housekeeping Status Modal-->
                                <div class="modal fade" id="update{{$lists->Room_No}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Maintenance</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                        <form method="POST" class="prevent_submit" action="{{url('/update_housekeeping_status')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card-body bg-white" style="border-radius: 18px">

                                                            <input type="hidden" name="room_no" value="{{$lists->Room_No}}" />

                                                            <p class="text-left">Housekeeping Status: </p>
                                                            <select name="status" class="form-control" required>
                                                                <option selected="true" disabled="disabled">Select</option>
                                                                <option value="Cleaned">Cleaned</option>
                                                                <option value="Out of Order">Out of Order</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                               @endforeach
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
<style>
    .title{
        text-transform:uppercase;
        font-size:25px;
        letter-spacing:2px;
    }
    .category2{
        font-size:22px;
        color:#E46000;
    }
</style>

    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush