@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>


    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Lost and Found</h6>
                @if(Auth::user()->User_Type == "Admin")
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">Housekeeping</li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Housekeeping Dashboard</li>
                        </ol>
                    </nav>
                @elseif(Auth::user()->User_Type == "Housekeeping Supervisor")
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('Housekeeping_Dashboard') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">Housekeeping</li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Housekeeping Dashboard</li>
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
                                Add Lost Item
                            </button>
                        </div>
                    </div>
                    <!-- Add Modal -->
                    <div class="modal fade" id="add_rooms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Add Lost Item</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('add_lost_item') }}" class="prevent_submit" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="card-body bg-white" style="border-radius: 18px">
                                                <div class="row">
                                                    <div class="col-md">
                                                        <p class="text-left">Facility Type</p>
                                                        <select name="facility" id="facility_type" class="form-control">
                                                            <option selected="true" disabled="disabled" selected disabled
                                                                value="">Select</option>
                                                            <option value="Hotel Room">Hotel Room</option>
                                                            <option value="Convention Center">Convention Center</option>
                                                            <option value="Function Room">Function Room</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row" id="hotel" style="display:none;">
                                                    <div class="col-md pt-2">
                                                        <p class="text-left">Room No. </p>
                                                        <select name="room_no" class="form-control" required>
                                                            <option selected="true" disabled="disabled" selected disabled
                                                                value="">Select</option>
                                                            @foreach ($count as $counts)
                                                                @for ($i = $counts['Room_No']; $i <= $counts['Room_No']; $i++)
                                                                    @if ($i != 0)
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }}</option>
                                                                    @endif
                                                                @endfor
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="all" style="display:none;">
                                                    <p class="text-left mt-2">Items</p>
                                                    <input type="text" name="item" class="form-control" 
                                                    maxlength="32" required>
                                                    <p class="text-left mt-2">Item Description</p>
                                                    <input type="text" name="item_desc" class="form-control"
                                                        maxlength="32" required>

                                                    <p class="text-left mt-2">Found By</p>
                                                    <select name="foundby" class="form-control" required>
                                                        <option selected="true" disabled="disabled" selected disabled
                                                            value="">
                                                            Select</option>
                                                            @foreach($housekeeper as $housekeepers)
                                                                <option value="{{$housekeepers->Housekeepers_Name}}">
                                                                    {{$housekeepers->Housekeepers_Name}}
                                                                </option>
                                                            @endforeach  
                                                    </select>

                                                    <p class="text-left mt-2">Item Image </p>
                                                    <input type="file" name="images" class="form-control"
                                                        accept="image/png, image/gif, image/jpeg" required />
                                                </div>
                                            </div>
                                        </div>
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
                    <div class="row align-items-center">
                        <div class="col text-right">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                        data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                        aria-controls="tabs-icons-text-1" aria-selected="true">Lost and Found</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                        aria-selected="false"> Archives </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="tab-content" id="myTabContent">
                            {{-- Lost and Found --}}
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                aria-labelledby="tabs-icons-text-1-tab">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush" id="myTable">
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
                                        @foreach ($list as $lists)
                                            @if ($lists->IsArchived == false)
                                                <tr>
                                                    <td>{{ $lists->Facility_Type }}</td>
                                                    <td>{{ $lists->Room_No }}</td>
                                                    <td>{{ $lists->Item }}</td>
                                                    <td>{{ $lists->Found_By }}</td>
                                                    <td>{{ date('F j, Y', strtotime($lists->Date_Found)) }}</td>
                                                    <td>{{ $lists->Status }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#view{{ $lists->id }}"
                                                            title="View Room Linens">
                                                            <i class="bi bi-eye"></i>
                                                        </button>

                                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                                            data-target="#update{{ $lists->id }}"
                                                            title="View Room Linens">
                                                            <i class="bi bi-arrow-repeat"></i>
                                                        </button>

                                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                            data-target="#update2{{ $lists->id }}"
                                                            title="View Room Linens">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </td>

                                                    <!-- View -->
                                                    <div id="view{{ $lists->id }}" class="modal hide fade"
                                                        tabindex="-1">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">
                                                                        View Information
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="text-left">Item Name</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Item }}" readonly>
                                                                    <br>
                                                                    <p class="text-left">Item Description</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Item_Description }}" readonly>
                                                                    <br>
                                                                    <img src="{{ $lists->Item_Image }}"
                                                                        class="card-img-top" />
                                                                    <br><br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-danger"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Update -->
                                                    <div id="update{{ $lists->id }}" class="modal hide fade"
                                                        tabindex="-1">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">
                                                                        Claiming Lost and Found Item
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ url('update_lost_item_status') }}"
                                                                    class="prevent_submit" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body">

                                                                        <input type="hidden" name="id"
                                                                            value="{{ $lists->id }}">

                                                                        <p class="text-left">Claimed By: </p>
                                                                        <input type="text" class="form-control"
                                                                            name="claimed_by" pattern="[A-Za-z ]+"
                                                                            title="Only Uppercase and lowercase letters is required."
                                                                            required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-outline-danger"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <input type="submit" class="btn btn-success">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Disposed/Auctioned -->
                                                    <div id="update2{{ $lists->id }}" class="modal hide fade"
                                                        tabindex="-1">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">
                                                                        Disposed or Auctioned?
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ url('auctioned_or_disposed_item') }}"
                                                                    class="prevent_submit" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="lost_id"
                                                                            value="{{ $lists->id }}">

                                                                        <p class="text-left">Set Status: </p>
                                                                        <select name="status" class="form-control"
                                                                            required>
                                                                            <option value="" selected="true"
                                                                                disabled="disabled">Select</option>
                                                                            <option value="Disposed">Disposed</option>
                                                                            <option value="Auctioned">Auctioned
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a class="btn btn-outline-danger"
                                                                            data-dismiss="modal">Close</a>
                                                                        <input type="submit" class="btn btn-success">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Archives --}}
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush" id="myTable2">
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
                                        @foreach ($list as $lists)
                                            @if ($lists->IsArchived == true)
                                                <tr>
                                                    <td>{{ $lists->Facility_Type }}</td>
                                                    <td>{{ $lists->Room_No }}</td>
                                                    <td>{{ $lists->Item }}</td>
                                                    <td>{{ $lists->Found_By }}</td>
                                                    <td>{{ date('F j, Y', strtotime($lists->Date_Found)) }}</td>
                                                    <td>{{ $lists->Status }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#view2{{ $lists->id }}"
                                                            title="View Room Linens">
                                                            <i class="bi bi-eye"></i>
                                                        </button>


                                                    </td>

                                                    <!-- View -->
                                                    <div id="view2{{ $lists->id }}" class="modal hide fade"
                                                        tabindex="-1">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalLabel">
                                                                        View Information
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="text-left">Item Name</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Item }}" readonly>
                                                                    <br>
                                                                    <p class="text-left">Item Description</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Item_Description }}" readonly>
                                                                    <br>
                                                                    <img src="{{ $lists->Item_Image }}"
                                                                        class="card-img-top" />
                                                                    <br><br>
                                                                    <p class="text-left">Claimed By</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Claimed_By }}" readonly>

                                                                    <p class="text-left mt-2">Date Claimed</p>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $lists->Date_Claimed }}" readonly>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-danger"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @endif
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
