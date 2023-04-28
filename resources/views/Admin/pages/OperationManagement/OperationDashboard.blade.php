@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.js">
    </script>


    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Operations Management Dashboard</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Operations Management</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Operations Management Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            {{-- -xl-4 mb-5 mb-xl-0 --}}
            <div class="col">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                      
                        <div class="container-fluid">
                            <p class="text-lg pt-6">List of Guest Arrival</p>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="tab-content" id="myTabContent">
                                        {{-- Arrival / Departure --}}
                                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                            aria-labelledby="tabs-icons-text-1-tab">
                                            <!-- Projects table -->
                                            <table class="table align-items-center table-flush" id="myTable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="font-size:18px;">Action</th>
                                                        <th scope="col" style="font-size:18px;">Room No.</th>
                                                        <th scope="col" style="font-size:18px;">Facility Type</th>
                                                        <th scope="col" style="font-size:18px;">Housekeeping Status</th>
                                                        <th scope="col" style="font-size:18px;">Check In Date</th>
                                                        <th scope="col" style="font-size:18px;">Check Out Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $datenow = date('Y-m-d'); @endphp

                                                    @foreach ($list as $lists)
                                                        @if ($lists->IsArchived == false && $lists->Check_In_Date == $datenow && $lists->Front_Desk_Status == 'Reserved')
                                                            <tr>
                                                                <td>
                                                                    <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                                        data-target="#view1{{ $lists->ID }}"> <i
                                                                            class="bi bi-eye"></i>
                                                                    </button>

                                                                    @if ($lists->Attendant == 'Unassigned' && $lists->Housekeeping_Status == 'Cleaned')
                                                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                                                            data-target="#assign{{ $lists->ID }}">
                                                                            <i class="bi bi-person-fill"></i> </button>
                                                                    @endif

                                                                    @if ($lists->Housekeeping_Status == 'Inspect')
                                                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                                                            data-target="#update{{ $lists->ID }}">
                                                                            <i class="bi bi-arrow-repeat"></i>
                                                                    @endif
                                                                </td>

                                                                <td>{{ $lists->Room_No }}</td>
                                                                <td>{{ $lists->Facility_Type }}</td>
                                                                <td>{{ $lists->Housekeeping_Status }}</td>
                                                                <td>{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</td>
                                                                <td>{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</td>

                                                            </tr>

                                                            <!--View-->
                                                            <div class="modal fade" id="view1{{ $lists->ID }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-left display-4"
                                                                                id="exampleModalLabel">View Information</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="card-body bg-white"
                                                                                    style="border-radius: 18px">
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $lists->ID }}" />
                                                                                    @if($lists->Facility_Status == "Reserved")
                                                                                        <h3 class="text-left">Room Status: <span style="font-weight:normal; color: #5bc0de;">{{$lists->Facility_Status}}</span> </h3>
                                                                                    @elseif($lists->Facility_Status == "Occupied")
                                                                                        <h3 class="text-left">Room Status: <span style="font-weight:normal; color: #d9534f;">{{$lists->Facility_Status}}</span> </h3>
                                                                                    @endif

                                                                                    @if($lists->Front_Desk_Status == "Reserved")
                                                                                        <h3 class="text-left">Front Desk Status: <span style="font-weight:normal; color: #5bc0de;">{{$lists->Front_Desk_Status}}</span> </h3>
                                                                                    @elseif($lists->Front_Desk_Status == "Checked-In")
                                                                                        <h3 class="text-left">Front Desk Status: <span style="font-weight:normal; color: #5cb85c;">{{$lists->Front_Desk_Status}}</span> </h3>
                                                                                    @elseif($lists->Front_Desk_Status == "Checked-Out")
                                                                                        <h3 class="text-left">Front Desk Status: <span style="font-weight:normal; color: #d9534f;">{{$lists->Front_Desk_Status}}</span> </h3>
                                                                                    @endif
                                                                                    <h3 class="text-left">Booking Number: <span style="font-weight:normal;">{{$lists->Attendant}}</span> </h3>

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

                                                            <!--Assign Attendant-->
                                                            <div class="modal fade" id="assign{{ $lists->ID }}"
                                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-left display-4"
                                                                                id="exampleModalLabel">View Information</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form method="POST" class="prevent_submit"
                                                                            action="{{ url('/assign_housekeepers') }}"
                                                                            enctype="multipart/form-data">
                                                                            {{ csrf_field() }}
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="card-body bg-white"
                                                                                        style="border-radius: 18px">
                                                                                        <input type="hidden" name="id"
                                                                                            value="{{ $lists->ID }}" />

                                                                                        <input type="hidden" name="check"
                                                                                            value="arrival" />

                                                                                        <p class="text-left">Attendants: </p>
                                                                                        <select name="housekeeper"
                                                                                            class="form-control" required>
                                                                                            <option selected="true"
                                                                                                disabled="disabled">
                                                                                                Select</option>
                                                                                                @foreach($housekeeper as $housekeepers)
                                                                                                <option value="{{$housekeepers->Housekeepers_Name}}">
                                                                                                    {{$housekeepers->Housekeepers_Name}}
                                                                                                </option>
                                                                                            @endforeach  
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</a>
                                                                                <input type="submit"
                                                                                    class="btn btn-success prevent_submit"
                                                                                    value="Assign" />
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Update Housekeeping Status Modal-->
                                                            <div class="modal fade" id="update{{ $lists->ID }}"
                                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-left display-4"
                                                                                id="exampleModalLabel">Setting Status</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="card-body bg-white"
                                                                                    style="border-radius: 18px">

                                                                                    @if ($lists->Request_ID == null)
                                                                                        @php $lists->Request_ID = "null"; @endphp
                                                                                    @endif
                                                                                    <h4 class="text-center">Is the Room
                                                                                        {{ $lists->Room_No }} <span
                                                                                            class="text-success">

                                                                                            CLEANED</span>?</h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</a>
                                                                            <a href="{{ url('/update_housekeeping_stats', ['hk' => $lists->Attendant, 'id' => $lists->ID, 'status' => 'Arrival', 'req' => $lists->Request_ID]) }}"
                                                                                class="btn btn-success">Yes</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($lists->IsArchived == false && $lists->Check_Out_Date == $datenow && $lists->Front_Desk_Status == 'Checked-In')
                                                            <tr>
                                                                <td>
                                                                    <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                                        data-target="#view2{{ $lists->ID }}"> <i
                                                                            class="bi bi-eye"></i>
                                                                    </button>
                                                                </td>

                                                                <td>{{ $lists->Room_No }}</td>
                                                                <td>{{ $lists->Facility_Type }}</td>
                                                                <td>{{ $lists->Housekeeping_Status }}</td>
                                                                <td>{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</td>
                                                                <td>{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</td>

                                                            </tr>

                                                            <!--View-->
                                                            <div class="modal fade" id="view2{{ $lists->ID }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-left display-4"
                                                                                id="exampleModalLabel">View Information</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="card-body bg-white"
                                                                                    style="border-radius: 18px">
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $lists->ID }}" />

                                                                                    <p class="text-left">Room Status : </p>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $lists->Facility_Status }}"
                                                                                        readonly>

                                                                                    <p class="text-left">Front Desk Status: </p>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $lists->Front_Desk_Status }}"
                                                                                        readonly>

                                                                                    <p class="text-left">Attendant: </p>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $lists->Attendant }}" readonly>
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
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script type="text/javascript">
        $.noConflict();

        jQuery(function($) {
            var table = $('#myTable').DataTable({
                dom: 'lBfrtip',
                orderCellsTop: true,
                fixedHeader: true,
                lengthChange: false,
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'portrait',
                        pageSize: 'LEGAL'
                    },
                    'excel', 'colvis', 'print'
                ]
            });
        });
    </script>
@endsection

@push('js')
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
