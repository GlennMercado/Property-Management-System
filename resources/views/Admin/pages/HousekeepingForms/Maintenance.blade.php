@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
 
 
<style>
    i {
        margin-left: 5%;
    }
</style>  
    <div class="container-fluid mt--7">  
        <div class="row">
                <div class="col-xl">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Maintenance</h3>
                                </div>
                                <div class="col text-right">                     
                                    <button class="btn btn-outline-success" data-toggle="modal" data-target="#addm">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="addm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Maintenance</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <form action="{{ route('Maintenance')}}" class="prevent_submit" method="POST"> 
                                            
                                            {{ csrf_field() }}

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Due Date: </p>
                                                                <input class="form-control due" type="date" name="due" onkeydown="return false" required>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Location: </p>
                                                                <select name="location" class="form-control">
                                                                    <option selected="true" disabled="disabled">Select</option>
                                                                    @foreach($list2 as $lists2)
                                                                    <option value="{{$lists2->Room_No}}">Room - {{$lists2->Room_No}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <p class="text-left">Description: </p>
                                                        <input class="form-control" type="text" name="desc" required>
                                                        
                                                        <br>

                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Asset: </p>
                                                                <input class="form-control" type="text" name="asset" required>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                                                </div>
                                        </form>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" >ID</th>
                                        <th scope="col" >Status</th>
                                        <th scope="col" >Description</th>
                                        <th scope="col" >Asset</th>
                                        <th scope="col" >Location</th>
                                        <th scope="col" >Due Date</th>
                                        {{-- <th scope="col" >Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $lists)
                                    <tr>
                                        <td>{{ $lists->ID}}</td>
                                        <td>{{ $lists->Status}}</td>
                                        <td>{{ $lists->Description}}</td>
                                        <td>{{ $lists->Asset}}</td>
                                        <td>{{ $lists->Location}}</td>
                                        <td>{{ date("F j Y", strtotime($lists->Due_Date))}}</td>
                                        {{-- <td>
                                            <i class="bi bi-person"></i>
                                            <i class="bi bi-check-lg"></i>
                                            <i class="bi bi-chevron-right"></i>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footers.auth')
    </div>
   <!-- style -->
<style>
    p{
        letter-spacing:1px;
        font-weight:lighter;
        font-family:sans-serif;
        color:#909090;
    }
    h5{
        font-family:sans-serif;
    }
</style>
<script type="text/javascript">
$('.prevent_submit').on('submit', function(){
    $('.prevent_submit').attr('disabled','true');
});


    $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
        var dateToday = new Date();
        var month = dateToday.getMonth() + 1;
        var day = dateToday.getDate();
        var year = dateToday.getFullYear();

        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;

        $('.due').attr('min', maxDate);
    });
</script>


@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush