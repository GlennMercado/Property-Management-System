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
                                <h2 class="mb-0">Hotel Booking</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="nav-wrapper">
                            <form action="{{ route('HotelReservationForm') }}" class="prevent_submit" method="POST">
                                {{ csrf_field() }}
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li class="nav-item">
                                        <p class="text-left">Room No - Beds: </p>
                                        <select name="room_no" class="form-control" required>
                                            <option selected="true" disabled="disabled">Select</option>
                                            @foreach($room as $rooms)
                                                @if($rooms->Status == 'Available')
                                                    <option value="{{$rooms->Room_No}}">{{$rooms->Room_No}} - {{$rooms->No_of_Beds}} - {{$rooms->Extra_Bed}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </li>
                                    <li class="nav-item">
                                        <p class="text-left">Check in Date/Time: </p>
                                        <input class="form-control chck" name="checkIn" type="date" onkeydown="return false" id="example-datetime-local-input" required>                     
                                    </li>
                                    <li class="nav-item">
                                        <p class="text-left">Check out Date/Time: </p>
                                        <input class="form-control chck" name="checkOut" type="date" onkeydown="return false" id="example-datetime-local-input" required>
                                                            
                                    </li>                              
                                </ul>

                                <br><br>

                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li class="nav-item">
                                        <p class="text-left">Number of Pax: </p>
                                        <select name="pax" class="form-control" required>
                                            <option selected="true" disabled="disabled">Select</option>
                                            @for($count = 1; $count <= 4; $count++)
                                            <option value="{{$count}}">{{$count}}</option>
                                            @endfor
                                        </select>
                                    </li>
                                    <li class="nav-item">
                                        <p class="text-left">Mobile No.: </p>
                                        <input class="form-control" type="tel" minlength="11" maxlength="11" name="mobile" required>
                                    </li>
                                    <li class="nav-item">
                                        <p class="text-left">Guest Name: </p>
                                        <input class="form-control" type="text" name="gName" required>                        
                                    </li>                              
                                </ul>

                                <br><br>

                                <ul class="nav nav-pills nav-fill flex-column flex-md-row">
                                    <li class="nav-item">
                                        <input type="submit" class="btn btn-success prevent_submit" value="Submit" style="width:50%;" />
                                    </li> 
                                </ul>
                                             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <br>

        



<script>
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

            $('.chck').attr('min', maxDate);
        });
</script>        
        
@include('layouts.footers.auth')
    
    </div>


    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush