@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
 
   
    <div class="container-fluid mt--7">    
        <!--Room Management-->             
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Room Management</h3>
                            </div>
                            <div class="col text-right">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#add_rooms">Add Rooms</button>           
                            </div>
                        </div>
                        <br>    
                        <div class="row align-items-center">
                            <!--<button class="btn btn-success active" id="assigned">Assigned</button>
                            <button class="btn btn-warning" id="unassigned">Unassigned</button>-->
                        </div>
                    </div>    

                    <!-- Modal -->
                    <div class="modal fade" id="add_rooms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Add Room</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('RoomManagement')}}" class="prevent_submit" method="POST" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="card-body bg-white" style="border-radius: 18px">
                                                <p class="text-left">Room No.: </p>
                                                <?php $count=1; ?>  
                                                <select name="room_no" class="form-control">
                                                    <option selected="true" disabled="disabled">---Choose Room Number---</option>
                                                    @for($count = 1; $count <=30; $count++)
                                                        <option value="{{$count}}"> {{ $count }}</option>
                                                    @endfor
                                                </select>                                                
                                                <br>                                              
                                                <p class="text-left">Room Size: </p>
                                                <input class="form-control" type="text" name="room_size" required>
                                                <br>
                                                <p class="text-left">No. of Beds: </p>
                                                <select name="no_of_beds" class="form-control" required>
                                                    <option selected="true" disabled="disabled">---Choose Beds---</option>
                                                    <option value="One (1) twin-sized">One (1) twin-sized</option>
                                                    <option value="One (1) queen-sized">One (1) queen-sized</option>
                                                    <option value="One (1) queen-sized & One (1) twin-sized">One (1) queen-sized & One (1) twin-sized</option>
                                                </select>
                                                <br>
                                                <p class="text-left">Extra Bed: </p>
                                                <input class="form-control" type="text" name="extra_bed" required>
                                                <br>
                                                <p class="text-left">No. of Pax per Room: </p>
                                                <select name="no_of_pax" class="form-control"required>
                                                    <option selected="true" disabled="disabled">---Choose Number of Pax---</option>
                                                    @for($count = 1; $count <=10; $count++)
                                                        <option value="{{$count}}"> {{ $count }}</option>
                                                    @endfor
                                                </select> 
                                                <br>
                                                <p class="text-left">Rate per Night: </p>
                                                <input class="form-control" type="text" name="rate_per_night" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g,'$1');" required>
                                                
                                                <p class="text-left">Membership: </p>
                                                <select name="membership" class="form-control" required>
                                                    <option selected="true" disabled="disabled">---Choose Membership---</option>
                                                    <option value="Guests">Guests</option>
                                                    <option value="PCC Officers, Staff and Event Team">PCC Officers, Staff and Event Team</option>
                                                </select>
                                                <br>
                                                <p class="text-left">Hotel Image: </p>
                                                <input type="file" name="images" class="form-control" accept="image/png, image/gif, image/jpeg" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                        <input type="submit" class="btn btn-success prevent_submit" value="Add" name="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Room No.</th>
                                    <th scope="col">Room Size</th>
                                    <th scope="col">No. of Beds</th>
                                    <th scope="col">Extra Bed</th>
                                    <th scope="col">No. of Pax per Room</th>
                                    
                                    <!--<th scope="col">Guest Preference</th>-->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $lists)
                                    <tr>
                                        <td>{{ $lists->Room_No}}</td>
                                        <td>{{ $lists->Room_Size}}</td>
                                        <td>{{ $lists->No_of_Beds}}</td>
                                        <td>{{ $lists->Extra_Bed}}</td>
                                        <td>{{ $lists->No_Pax_Per_Room}}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#Room_ID{{$lists->Room_No}}">View</button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="Room_ID{{$lists->Room_No}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Room {{$lists->Room_No}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card-body bg-white" style="border-radius: 18px">
                                                            <p class="text-left">Room No. :</p>
                                                            <input class="form-control" type="text" value="{{$lists->Room_No}}" readonly>

                                                            <br>

                                                            <img src="{{$lists->Hotel_Image}}" class="card-img-top"/>
                                                            
                                                            <br>

                                                            <p class="text-left">Rate per Night: </p>
                                                            <input class="form-control" type="text" value="{{$lists->Rate_per_Night}}" readonly>

                                                            <p class="text-left">Membership </p>
                                                            <input class="form-control" type="text" value="{{$lists->Membership}}" readonly>
                                                            
                                                            <p class="text-left">Status </p>
                                                            <input class="form-control" type="text" value="{{$lists->Status}}" readonly>
                                                            

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

        <br><br>
        
        
        
        
        
        <!--<a href="{{ route('Dashboard') }}" class = "btn btn-primary" style = " margin-top:20px; margin-right:10px; color:black; background:#ffffff; border-color:#68DBA9;">
            Go Back
        </a>-->
        
            @include('layouts.footers.auth')
    
    </div>

<script>
     $('.prevent_submit').on('submit', function(){
            $('.prevent_submit').attr('disabled','true');
        });

    $(document).ready(function(){
        $('#assigned').click(function(){
            $('#assigned').addClass(' active'); 
            $('#unassigned').removeClass(' active'); 
            $('#unassign').hide();
            $('#assign').show();
        });
    });
    $(document).ready(function(){
        $('#unassigned').click(function(){
            $('#unassigned').addClass(' active'); 
            $('#assigned').removeClass(' active'); 
            $('#unassign').show();
            $('#assign').hide();
        });
    });
</script>   
    

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

