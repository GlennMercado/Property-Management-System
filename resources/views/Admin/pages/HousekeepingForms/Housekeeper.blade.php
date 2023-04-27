@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>


    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Housekeeper</h6>
                @if(Auth::user()->User_Type == "Admin")
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">Housekeeping</li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Housekeepers</li>
                        </ol>
                    </nav>
                @elseif(Auth::user()->User_Type == "Housekeeping Supervisor")
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('Housekeeping_Dashboard') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">Housekeeping</li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Housekeepers</li>
                        </ol>
                    </nav>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="col text-right">
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#add_rooms">
                                Add Housekeeper
                            </button>
                        </div>
                    </div>
                    <!-- Add Modal -->
                    <div class="modal fade" id="add_rooms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Add Housekeeper</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('add_housekeeper') }}" class="prevent_submit" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p class="text-left">Housekeeper Name: </p>
                                        <input type="text" name="housekeeper" class="form-control" 
                                        maxlength="20"
                                        pattern="[a-zA-Z\s]+" title="Please enter only letters" required>
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

                    <br>
                    <!-- <div class="row align-items-center">
                        <div class="col text-right">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                        data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                        aria-controls="tabs-icons-text-1" aria-selected="true">Housekeepers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                        aria-selected="false"> Archives </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <br>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="tab-content" id="myTabContent">
                            {{-- List of Housekeepers --}}
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                aria-labelledby="tabs-icons-text-1-tab">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush" id="myTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:18px;">Housekeepers Name</th>
                                            <th scope="col" style="font-size:18px;">Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list as $lists)
                                            <tr>
                                                <td>{{$lists->Housekeepers_Name}}</td>
                                                <td>{{$lists->Status}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                                        data-target="#edit{{ $lists->id }}" title="Update Status">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="edit{{ $lists->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title" id="exampleModalLabel">Update Status</h2>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ url('update_housekeepers_status') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="{{$lists->id}}">
                                                                <input type="hidden" name="name" value="{{$lists->Housekeepers_Name}}">
                                                                <p class="text-left">Housekeepers Status: </p>
                                                                <select name="status" class="form-control" required>
                                                                    <option value="" selected="true" disabled="disabled">Select</option>
                                                                    @if($lists->Status != "Available")
                                                                    <option value="Available">Available</option>
                                                                    @endif
                                                                    @if($lists->Status != "Occupied")
                                                                    <option value="Occupied">Occupied</option>
                                                                    @endif
                                                                    @if($lists->Status != "On-Break")
                                                                    <option value="On-Break">On-Break</option>
                                                                    @endif
                                                                    @if($lists->Status != "On-Leave")
                                                                    <option value="On-Leave">On-Leave</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                                <input type="submit" value="Submit" class="btn btn-success" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Archives --}}
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <!-- Projects table -->
                                <!-- <table class="table align-items-center table-flush" id="myTable2">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:18px;">Facility Type</th>
                                            <th scope="col" style="font-size:18px;">Room No.</th>
                                            <th scope="col" style="font-size:18px;">Item</th>
                                            <th scope="col" style="font-size:18px;">Found By</th>
                                            <th scope="col" style="font-size:18px;">Date Found</th>
                                            <th scope="col" style="font-size:18px;">Status</th>
                                            <th scope="col" style="font-size:18px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>




    <script>
        $(document).ready(function() {
            $("#facility_type").change(function() {
                var selecteds = $("option:selected", this).val();

                if (selecteds == "Hotel Room") {
                    $('#hotel').css({
                        'display': 'block'
                    });
                    $('#all').css({
                        'display': 'block'
                    });
                } else {
                    $('#hotel').css({
                        'display': 'none'
                    });
                    $('#all').css({
                        'display': 'block'
                    });
                }

            });
        });
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
            $('#myTable2').DataTable();
        });
    </script>
    <style>
        .title {
            text-transform: uppercase;
            font-size: 25px;
            letter-spacing: 2px;
        }

        .category {
            font-size: 22px;
            color: #5BDF4A;
        }

        .category2 {
            font-size: 22px;
            color: #E46000;
        }

        p {
            font-family: sans-serif;
        }

        .tab {
            font-size: 100px;
        }
    </style>

    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
