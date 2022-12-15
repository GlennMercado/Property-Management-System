@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <style>
        .hcolor {
            color: #8898aa;
        }
    </style>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Hotel Booking</h3>
                            </div>
                            <div class="col text-right">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#reserve">
                                    <i class="bi bi-file-plus"></i> Add Guest
                                </button>
                            </div>
                            <!-- Add Reservation -->
                            <div class="modal fade" id="reserve" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                                Hotel Reservation
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('HotelReservationForm') }}" class="prevent_submit" method="POST">

                                            {{ csrf_field() }}

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Check in Date/Time: </p>
                                                                <input class="form-control chck" name="checkIn" type="date" onkeydown="return false" id="example-datetime-local-input" required>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Check out Date/Time: </p>
                                                                <input class="form-control chck" name="checkOut" type="date" onkeydown="return false" id="example-datetime-local-input" required>
                                                            </div>
                                                        </div>

                                                        <p class="text-left">Room No - Beds: </p>
                                                        <select name="room_no" class="form-control" required>
                                                            <option selected="true" disabled="disabled">Select</option>
                                                            @foreach($room as $rooms)
                                                                @if($rooms->Status == 'Available')
                                                                    <option value="{{$rooms->Room_No}}">{{$rooms->Room_No}} - {{$rooms->No_of_Beds}} - {{$rooms->Extra_Bed}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>

                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Number of Pax: </p>
                                                                <select name="pax" class="form-control" required>
                                                                    <option selected="true" disabled="disabled">Select</option>
                                                                    @for($count = 1; $count <= 4; $count++)
                                                                    <option value="{{$count}}">{{$count}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Mobile No.: </p>
                                                                <input class="form-control" type="tel" minlength="11" maxlength="11" name="mobile" required>
                                                            </div>
                                                        </div>

                                                        <!--
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Number of Adult: </p>
                                                                <select name="adult" class="form-control" required>
                                                                    <option selected="true" disabled="disabled">Select</option>
                                                                    @for($count = 1; $count <= 4; $count++)
                                                                    <option value="{{$count}}">{{$count}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Number of Children: </p>
                                                                <select name="child" class="form-control" required>
                                                                    <option selected="true" disabled="disabled">Select</option>
                                                                    @for($count = 1; $count <= 4; $count++)
                                                                    <option value="{{$count}}">{{$count}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>-->

                                                        <p class="text-left">Guest Name: </p>
                                                        <input class="form-control" type="text" name="gName" required>

                                                        
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
                        <br>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <select class="form-control" style="border:2px solid" id="optionselect" >
                                    <option value="Pending" selected="true">Pending</option>
                                    <option value="On-going">On-going</option>
                                    <option value="Finished">Finished</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Pending -->
                        <table class="table align-items-center table-flush" id="pending">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Reservation No.</th>
                                    <th scope="col">Room No.</th>
                                    <th scope="col">Guest Name</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $lists)
                                    @if($lists->Isvalid == true && $lists->Payment_Status == "Pending")
                                        <tr>
                                            <td>{{ $lists->Reservation_No }}</td>
                                            <td>{{ $lists->Room_No }}</td>
                                            <td>{{ $lists->Guest_Name }}</td>
                                            <td>{{ $lists->Payment_Status }}</td>
                                            <td>
                                                <!--View Button-->
                                                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#view{{$lists->Reservation_No}}"> <i class="bi bi-eye-fill"></i> </button>
                                                <!--Edit Button-->
                                                @if($lists->Payment_Status == 'Pending')
                                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#update{{$lists->Reservation_No}}"> <i class="bi bi-arrow-repeat"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
  
                                    <!--View-->
                                    <div class="modal fade" id="view{{$lists->Reservation_No}}" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                                        Hotel Reservation
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Reservation Number: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Reservation_No}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Room Number: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Room_No}}" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <br>

                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Number of Pax: </p>
                                                            <input class="form-control" type="text" value="{{$lists->No_of_Pax}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Payment Status: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Payment_Status}}" readonly>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Guest Name: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Guest_Name}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Mobile Number: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Mobile_Num}}" readonly>
                                                        </div>
                                                    </div>

                                                    @if($lists->Email != null)
                                                            <br>
                                                            <p class="text-left">Email Address: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Email}}" readonly>   
                                                    @endif
                                                   
                                                    <br>
                                                    <div class="row">
                                                    <div class="col">
                                                            <p class="text-left">Check In Date: </p>
                                                            <input class="form-control" type="text" value="{{date('M-d-Y', strtotime($lists->Check_In_Date))}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Check Out Date: </p>
                                                            <input class="form-control" type="text" value="{{date('M-d-Y', strtotime($lists->Check_Out_Date))}}" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Update Status-->
                                    <div class="modal fade" id="update{{$lists->Reservation_No}}" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title text-left display-4" id="exampleModalLabel">
                                                        Hotel Reservation
                                                    </h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="text-center">Change <span style="color:red;">{{$lists->Guest_Name }}</span> Payment Status to Paid? </h4>          
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                    <a href="{{ url('/update', ['id' => $lists->Reservation_No, 'no' => $lists->Room_No]) }}" class="btn btn-success">Yes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                        
                        <!-- Ongoing -->
                        <table class="table align-items-center table-flush" id="paid" style="display:none;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Reservation No.</th>
                                    <th scope="col">Room No.</th>
                                    <th scope="col">Guest Name</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $lists)
                                    @if($lists->Isvalid == true && $lists->Payment_Status == "Paid")
                                        <tr>
                                            <td>{{ $lists->Reservation_No }}</td>
                                            <td>{{ $lists->Room_No }}</td>
                                            <td>{{ $lists->Guest_Name }}</td>
                                            <td>{{ $lists->Payment_Status }}</td>
                                            <td>
                                                <!--View Button-->
                                                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#view{{$lists->Reservation_No}}"> <i class="bi bi-eye-fill"></i> </button>
                                            </td>
                                        </tr>
                                    @endif
  
                                    <!--View-->
                                    <div class="modal fade" id="view{{$lists->Reservation_No}}" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                                        Hotel Reservation
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Reservation Number: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Reservation_No}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Room Number: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Room_No}}" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <br>

                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Number of Pax: </p>
                                                            <input class="form-control" type="text" value="{{$lists->No_of_Pax}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Payment Status: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Payment_Status}}" readonly>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Guest Name: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Guest_Name}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Mobile Number: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Mobile_Num}}" readonly>
                                                        </div>
                                                    </div>

                                                    @if($lists->Email != null)
                                                            <br>
                                                            <p class="text-left">Email Address: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Email}}" readonly>   
                                                    @endif
                                                   
                                                    <br>
                                                    <div class="row">
                                                    <div class="col">
                                                            <p class="text-left">Check In Date: </p>
                                                            <input class="form-control" type="text" value="{{date('M-d-Y', strtotime($lists->Check_In_Date))}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Check Out Date: </p>
                                                            <input class="form-control" type="text" value="{{date('M-d-Y', strtotime($lists->Check_Out_Date))}}" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                        
                        <!-- Finished -->
                        <table class="table align-items-center table-flush" id="finished" style="display:none;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Reservation No.</th>
                                    <th scope="col">Room No.</th>
                                    <th scope="col">Guest Name</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $lists)
                                    @if($lists->Isvalid == false)
                                        <tr>
                                            <td>{{ $lists->Reservation_No }}</td>
                                            <td>{{ $lists->Room_No }}</td>
                                            <td>{{ $lists->Guest_Name }}</td>
                                            <td>{{ $lists->Payment_Status }}</td>
                                            <td>
                                                <!--View Button-->
                                                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#view{{$lists->Reservation_No}}"> <i class="bi bi-eye-fill"></i> </button>
                                            </td>
                                        </tr>
                                    @endif
  
                                    <!--View-->
                                    <div class="modal fade" id="view{{$lists->Reservation_No}}" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                                        Hotel Reservation
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Reservation Number: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Reservation_No}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Room Number: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Room_No}}" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <br>

                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Number of Pax: </p>
                                                            <input class="form-control" type="text" value="{{$lists->No_of_Pax}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Payment Status: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Payment_Status}}" readonly>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Guest Name: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Guest_Name}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Mobile Number: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Mobile_Num}}" readonly>
                                                        </div>
                                                    </div>

                                                    @if($lists->Email != null)
                                                            <br>
                                                            <p class="text-left">Email Address: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Email}}" readonly>   
                                                    @endif
                                                   
                                                    <br>
                                                    <div class="row">
                                                    <div class="col">
                                                            <p class="text-left">Check In Date: </p>
                                                            <input class="form-control" type="text" value="{{date('M-d-Y', strtotime($lists->Check_In_Date))}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Check Out Date: </p>
                                                            <input class="form-control" type="text" value="{{date('M-d-Y', strtotime($lists->Check_Out_Date))}}" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>

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

            $('.chck').attr('min', maxDate);
        });

        $(document).ready(function(){
        $("#optionselect").change(function(){
        var selected = $("option:selected", this).val();
        if(selected == 'Pending')
        {    
            $('#pending').show();
            $('#paid').hide();
            $('#finished').hide();
        }
        else if(selected == 'On-going')
        {
            $('#pending').hide();
            $('#paid').show();
            $('#finished').hide();
        }
        else if(selected == 'Finished')
        {
            $('#pending').hide();
            $('#paid').hide();
            $('#finished').show();
        }
    });
    });
    </script>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
