@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable({
                "order": [[0, "asc"]]
            });
        });
        // Code that uses other library's $ can follow here.
    </script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Commercial Spaces</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Sales & Marketing</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Commercial Spaces</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="col text-right">
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#add_space">
                                Add Space
                            </button>
                        </div>
                    </div>
                    <!-- Add Modal -->
                    <div class="modal fade" id="add_space" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Add Commercial Space</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('/add_comm_space_unit')}}" class="prevent_submit" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <h3>Space/Units</h3>
                                        @foreach ($count as $counts)
                                            @for ($i = 1 + $counts['counts']; $i <= $counts['counts'] + 1; $i++)
                                                <input type="hidden" name="space_units" value="Unit {{$i}}">
                                                <input type="text" value="Unit {{$i}}" class="form-control" readonly>
                                            @endfor
                                        @endforeach
                                       
                                        <h3>Measurement Size (sq. m)</h3>
                                        <input type="number" name="size" class="form-control" required>

                                        <h3>Rental Fee</h3>
                                        <input type="number" name="rental_fee" class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                        <!-- <a class="btn btn-secondary" data-dismiss="modal">Close</a> -->
                                        <input type="submit" class="btn btn-success prevent_submit" value="Add"
                                            name="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Table-->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:18px;">Action</th>
                                        <th scope="col" style="font-size:18px;">Space/Unit</th>
                                        <th scope="col" style="font-size:18px;">Measurement/Size (sq. m)</th>
                                        <th scope="col" style="font-size:18px;">Maintenance Status <br> (Under Maintenance?)</th>
                                        <th scope="col" style="font-size:18px;">Due Date</th>
                                        <th scope="col" style="font-size:18px;">Maintenance Cost</th>
                                        <th scope="col" style="font-size:18px;">Occupancy Status</th>
                                        <th scope="col" style="font-size:18px;">Rental Fee</th>
                                        <th scope="col" style="font-size:18px;">Security Deposit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $lists)
                                        <tr>
                                            <td> 
                                                @if($lists->Occupancy_Status != "Occupied")
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_space_{{ str_replace(' ', '_', $lists->Space_Unit) }}" title="Edit Commercial Space">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                @endif
                                                
                                                @if($lists->Occupancy_Status == "Occupied" && $lists->Maintenance_Status == "No")
                                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#update_maintenance1_{{ str_replace(' ', '_', $lists->Space_Unit) }}" title="Update Maintenance Status">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                    </button>
                                                @endif

                                                @if($lists->Occupancy_Status == "Occupied" && $lists->Maintenance_Status == "Yes" && $lists->Maintenance_Cost == null)
                                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#update_maintenance2_{{ str_replace(' ', '_', $lists->Space_Unit) }}" title="Update Maintenance Status">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                    </button>
                                                @endif

                                                @if($lists->Maintenance_Status == "Yes" && $lists->Maintenance_Cost != null)
                                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#update_maintenance3_{{ str_replace(' ', '_', $lists->Space_Unit) }}" title="Update Maintenance Status">
                                                        <i class="bi bi-arrow-up-square"></i>
                                                    </button>
                                                    
                                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#update_maintenance4_{{ str_replace(' ', '_', $lists->Space_Unit) }}" title="Update Maintenance Status">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td style="font-size:16px;">{{ $lists->Space_Unit }}</td>
                                            <td style="font-size:16px;">{{ $lists->Measurement_Size }}</td>
                                            <td style="font-size:16px;">{{ $lists->Maintenance_Status }}</td>
                                            @if($lists->Maintenance_Due_Date != null)
                                                <td style="font-size:16px;">{{ date('F j, Y', strtotime($lists->Maintenance_Due_Date)) }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            @if($lists->Maintenance_Cost != null)
                                                <td style="font-size:16px;" class="cur1">{{ $lists->Maintenance_Cost}}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td style="font-size:16px;">{{ $lists->Occupancy_Status }}</td>
                                            <td style="font-size:16px;" class="cur1">{{ $lists->Rental_Fee}}</td>
                                            <td style="font-size:16px;" class="cur1">{{ $lists->Security_Deposit}}</td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit_space_{{ str_replace(' ', '_', $lists->Space_Unit) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4" id="exampleModalLabel">Edit Commercial Space</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{url('/edit_comm_unit')}}" class="prevent_submit" method="POST"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <h3>Space/Units : <span class="text-primary">{{$lists->Space_Unit}}</span></h3>
                                                            <input type="hidden" name="space_units" value="{{$lists->Space_Unit}}" >
                                                            <br>
                                                            <h3>Measurement Size (sq. m) : </h3>
                                                            <input type="number" name="size" class="form-control" value="{{$lists->Measurement_Size}}" required>

                                                            <h3>Rental Fee : </h3>
                                                            <input type="number" name="rental_fee" class="form-control" value="{{$lists->Rental_Fee}}" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                            <!-- <a class="btn btn-secondary" data-dismiss="modal">Close</a> -->
                                                            <input type="submit" class="btn btn-success prevent_submit" value="Edit"
                                                                name="submit">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Update Maintenace1 Modal -->
                                        <div class="modal fade" id="update_maintenance1_{{ str_replace(' ', '_', $lists->Space_Unit) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4" id="exampleModalLabel">Update Maintenance Status </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="space_units" value="{{$lists->Space_Unit}}">
                                                        <input type="hidden" name="stats" value="{{$lists->Maintenance_Status}}">
                                                        <h3 class="text-center">Set this space Under Maintenance?</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                        <a href="{{url('/update_comm_maintenance_status', ['id' => $lists->Space_Unit, 'stats' => 'Yes'])}}" class="btn btn-success prevent_submit">Yes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Update Maintenace2 Modal -->
                                        <div class="modal fade" id="update_maintenance2_{{ str_replace(' ', '_', $lists->Space_Unit) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4" id="exampleModalLabel">Update Maintenance Status </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{url('/comm_space_maintainance_cost')}}" class="prevent_submit" method="POST"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <input type="hidden" name="space_units" value="{{$lists->Space_Unit}}">
                                                            <input type="hidden" name="stats" value="{{$lists->Maintenance_Status}}">
                                                            <input type="hidden" name="due" value="{{$lists->Maintenance_Due_Date}}">
                                                            <h3>Space/Units : <span class="text-primary">{{$lists->Space_Unit}}</span></h3>
                                                            <br>
                                                            <h3>Maintenance Cost : </h3>
                                                            <input type="number" name="cost" class="form-control" required>
                                                            <br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success prevent_submit">Yes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Update Maintenace3 Modal -->
                                        <div class="modal fade" id="update_maintenance3_{{ str_replace(' ', '_', $lists->Space_Unit) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4" id="exampleModalLabel">Update Maintenance Status </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="space_units" value="{{$lists->Space_Unit}}">
                                                        <input type="hidden" name="stats" value="{{$lists->Maintenance_Status}}">
                                                        <h3 class="text-center">Is the problem resolved?</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                        <a href="{{url('/update_comm_maintenance_status', ['id' => $lists->Space_Unit, 'stats' => 'No'])}}" class="btn btn-success prevent_submit">Yes</a>
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
    </div>
    </div>
    <script>
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });
    </script>
    <style>
        table
        {
            text-align:center;
        }
        .cur1::before{
                content: '₱';
        }
        .tbltxt {
            font-size: 18px;
        }

        .title {
            text-transform: uppercase;
            font-size: 25px;
            letter-spacing: 2px;
        }

        .line {
            border: 2px solid black;
            width: 35%;
            display: inline-block;
            align-items: right;
            margin-top: 10px;
        }

        .title-color {
            color: #484848;
            font-size: 20px;
        }

        .text-color {
            font-size: 18px;
            color: #6C6C6C;
        }

        @media (max-width: 800px) {
            .line {
                width: 100%;
            }
        }
    </style>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
