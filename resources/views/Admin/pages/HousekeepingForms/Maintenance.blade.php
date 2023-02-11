@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">                 
        <br>

        <!--Cleaned-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0 title">Maintenance</h3>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="card-body">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style = "font-size:18px;">Room No.</th>
                                    <th scope="col" style = "font-size:18px;">Facility Type</th>
                                    <th scope="col" style = "font-size:18px;">Description</th>
                                    <th scope="col" style = "font-size:18px;">Discovered By</th>
                                    <th scope="col" style = "font-size:18px;">Priority Level</th>
                                    <th scope="col" style = "font-size:18px;">Status</th>
                                    <th scope="col" style = "font-size:18px;">Due Date</th>
                                    <th scope="col" style = "font-size:18px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $lists)
                                <tr>
                                    <td>{{$lists->Room_No}}</td>
                                    <td>{{$lists->Facility_Type}}</td>
                                    <td>{{$lists->Description}}</td>
                                    <td>{{$lists->Discovered_By}}</td>
                                    @if($lists->Priority_Level == "Low")

                                    <td style="color:#20c997;">{{$lists->Priority_Level}}</td>

                                    @elseif($lists->Priority_Level == "Moderate")
                                    <td style="color:#ffc107;">{{$lists->Priority_Level}}</td>

                                    @elseif($lists->Priority_Level == "High")
                                    <td style="color:#dc3545;">{{$lists->Priority_Level}}</td>
                                    @endif
                                    <td>{{$lists->Status}}</td>
                                    <td>{{date('F j, Y', strtotime($lists->Due_Date)) }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view{{ $lists->id }}"> <i class="bi bi-eye"></i> </button>
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#update{{ $lists->id }}"> <i class="bi bi-arrow-repeat"></i> </button>
                                    </td>
                                </tr>

                                    <!--View-->
                                    <div class="modal fade" id="view{{ $lists->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4"
                                                        id="exampleModalLabel">Booking Information</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card-body bg-white"
                                                            style="border-radius: 18px">
                                                            <p class="text-left">Booking No.</p>
                                                            <input type="text" class="form-control" value="{{$lists->Booking_No}}" readonly/>

                                                            <p class="text-left">Room No.</p>
                                                            <input type="text" class="form-control" value="{{$lists->Room_No}}" readonly/>

                                                            <p class="text-left">Guest Name</p>
                                                            <input type="text" class="form-control" value="{{$lists->Guest_Name}}" readonly/>

                                                            <p class="text-left">Mobile Number</p>
                                                            <input type="text" class="form-control" value="{{$lists->Mobile_Num}}" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary"
                                                        data-dismiss="modal">Close</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Update -->
                                    <div class="modal fade" id="update{{ $lists->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4"
                                                        id="exampleModalLabel">Update Maintenance Status</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card-body bg-white"
                                                            style="border-radius: 18px">
                                                            <p class="text-center">Is the problem resolved?</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary"
                                                        data-dismiss="modal">Close</a>
                                                    <a  href="{{ url('/update_maintenance_status', ['id' => $lists->id, 'rno' => $lists->Room_No, 'bno' => $lists->Booking_No])}}" class="btn btn-success">Yes</a>
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
        
        <br>
        



<script>
    $('.prevent_submit').on('submit', function(){
            $('.prevent_submit').attr('disabled','true');
        });
    $(document).ready(function(){
        $("#optionselect").change(function(){
        var selected = $("option:selected", this).val();
        if(selected == 'Cleaned')
        {    
            $('#cleaned, #cleaned2').show();
            $('#outofservice, #outofservice2').hide();
        }
        else if(selected == 'Out of Service')
        {
            $('#outofservice, #outofservice2').show();
            $('#cleaned, #cleaned2').hide();
        }
    });
    });
</script>        
<style>
    .title{
        text-transform:uppercase;
        font-size:25px;
        letter-spacing:2px;
    }
    .category{
        font-size:22px;
        color:#5BDF4A;
    }
    .category2{
        font-size:22px;
        color:#E46000;
    }
    .tab{
        font-size:100px;
    }
</style> 

</div>


    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush