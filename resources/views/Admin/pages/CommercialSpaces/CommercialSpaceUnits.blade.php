@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable({
                "order": [
                    [0, "asc"]
                ]
            });
            $('#myTable2').DataTable({
                "order": [
                    [0, "asc"]
                ]
            });
        });
        // Code that uses other library's $ can follow here.
    </script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Commercial Space Units</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Sales & Marketing</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Commercial Spaces</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Commercial Space Units</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header border-0">
                            <div class="col text-right">
                                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#add_space">
                                    Add Space
                                </button>
                            </div>
                        </div>
                        <!-- Add Modal -->
                        <div class="modal fade" id="add_space" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-left display-4" id="exampleModalLabel">Add Commercial
                                            Space
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/add_comm_space_unit') }}" class="prevent_submit" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <h3>Space/Units</h3>
                                            @foreach ($count as $counts)
                                                @for ($i = 1 + $counts['counts']; $i <= $counts['counts'] + 1; $i++)
                                                    <input type="hidden" name="space_units"
                                                        value="Unit {{ $i }}">
                                                    <input type="text" value="Unit {{ $i }}"
                                                        class="form-control" readonly>
                                                @endfor
                                            @endforeach

                                            <h3 class="mt-4">Measurement Size (sq. m)</h3>
                                            <input type="number" name="size" class="form-control" required>

                                            <h3 class="mt-4">Rental Fee</h3>
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
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                        aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Space/Unit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                        aria-selected="false">
                                        <i class="bi bi-shop-window mr-2"></i>Occupied Units</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    {{-- Vacant --}}
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-1-tab">
                                        <!--Table-->
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush" id="myTable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="font-size:18px;">Action</th>
                                                        <th scope="col" style="font-size:18px;">Space/Unit</th>
                                                        <th scope="col" style="font-size:18px;">Measurement/Size (sq.
                                                            m)
                                                        </th>
                                                        <th scope="col" style="font-size:18px;">Maintenance Status <br>
                                                            (Under
                                                            Maintenance?)</th>
                                                        <th scope="col" style="font-size:18px;">Due Date</th>
                                                        <th scope="col" style="font-size:18px;">Maintenance Cost</th>
                                                        <th scope="col" style="font-size:18px;">Occupancy Status</th>
                                                        <th scope="col" style="font-size:18px;">Rental Fee</th>
                                                        <th scope="col" style="font-size:18px;">Security Deposit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list as $lists)
                                                        <tr>
                                                            <td>
                                                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                                    data-target="#edit_space_{{ str_replace(' ', '_', $lists->Space_Unit) }}"
                                                                    title="Edit Commercial Space">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </button>
                                                            </td>
                                                            <td style="font-size:16px;">{{ $lists->Space_Unit }}</td>
                                                            <td style="font-size:16px;">{{ $lists->Measurement_Size }}</td>
                                                            <td style="font-size:16px;">{{ $lists->Maintenance_Status }}
                                                            </td>
                                                            @if ($lists->Maintenance_Due_Date != null)
                                                                <td style="font-size:16px;">
                                                                    {{ date('F j, Y', strtotime($lists->Maintenance_Due_Date)) }}
                                                                </td>
                                                            @else
                                                                <td></td>
                                                            @endif
                                                            @if ($lists->Maintenance_Cost != null)
                                                                <td style="font-size:16px;" class="cur1">
                                                                    {{ $lists->Maintenance_Cost }}</td>
                                                            @else
                                                                <td></td>
                                                            @endif
                                                            <td style="font-size:16px;">{{ $lists->Occupancy_Status }}
                                                            </td>
                                                            <td style="font-size:16px;" class="cur1">
                                                                {{ $lists->Rental_Fee }}</td>
                                                            <td style="font-size:16px;" class="cur1">
                                                                {{ $lists->Security_Deposit }}
                                                            </td>
                                                        </tr>

                                                        <!-- Edit Modal -->
                                                        <div class="modal fade"
                                                            id="edit_space_{{ str_replace(' ', '_', $lists->Space_Unit) }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-left display-4"
                                                                            id="exampleModalLabel">Edit Commercial Space
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{ url('/edit_comm_unit') }}"
                                                                        class="prevent_submit" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <div class="modal-body">
                                                                            <h3>Space/Units : <span
                                                                                    class="text-primary">{{ $lists->Space_Unit }}</span>
                                                                            </h3>
                                                                            <input type="hidden" name="space_units"
                                                                                value="{{ $lists->Space_Unit }}">
                                                                            <br>
                                                                            <h3>Measurement Size (sq. m) : </h3>
                                                                            <input type="number" name="size"
                                                                                class="form-control"
                                                                                value="{{ $lists->Measurement_Size }}"
                                                                                required>

                                                                            <h3>Rental Fee : </h3>
                                                                            <input type="number" name="rental_fee"
                                                                                class="form-control"
                                                                                value="{{ $lists->Rental_Fee }}" required>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-outline-danger"
                                                                                data-dismiss="modal">Close</button>
                                                                            <!-- <a class="btn btn-secondary" data-dismiss="modal">Close</a> -->
                                                                            <input type="submit"
                                                                                class="btn btn-success prevent_submit"
                                                                                value="Edit" name="submit">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    {{-- Occupied --}}
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-2-tab">
                                        <!--Table-->
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush" id="myTable2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="font-size:18px;">Action</th>
                                                        <th scope="col" style="font-size:18px;">Current Tenant</th>
                                                        <th scope="col" style="font-size:18px;">Space/Unit</th>
                                                        <th scope="col" style="font-size:18px;">Measurement/Size (sq.
                                                            m)</th>
                                                        <th scope="col" style="font-size:18px;">Maintenance Status <br>
                                                            (Under
                                                            Maintenance?)</th>
                                                        <th scope="col" style="font-size:18px;">Due Date</th>
                                                        <th scope="col" style="font-size:18px;">Maintenance Cost</th>
                                                        <th scope="col" style="font-size:18px;">Occupancy Status</th>
                                                        <th scope="col" style="font-size:18px;">Rental Fee</th>
                                                        <th scope="col" style="font-size:18px;">Security Deposit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list2 as $lists)
                                                        <tr>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                                    data-target="#view_history_{{ str_replace(' ', '_', $lists->Space_Unit) }}"
                                                                    title="Update Maintenance Status">
                                                                    <i class="bi bi-eye"></i>
                                                                </button>
                                                                @if ($lists->Occupancy_Status == 'Occupied' && $lists->Maintenance_Status == 'No')
                                                                    <button class="btn btn-sm btn-success"
                                                                        data-toggle="modal"
                                                                        data-target="#update_maintenance1_{{ str_replace(' ', '_', $lists->Space_Unit) }}"
                                                                        title="Update Maintenance Status">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </button>
                                                                @endif

                                                                {{-- @if ($lists->Occupancy_Status == 'Occupied' && $lists->Maintenance_Status == 'Yes' && $lists->Maintenance_Cost == null)
                                                                    <button class="btn btn-sm btn-success"
                                                                        data-toggle="modal"
                                                                        data-target="#update_maintenance2_{{ str_replace(' ', '_', $lists->Space_Unit) }}"
                                                                        title="Update Maintenance Status">
                                                                        <i class="bi bi-arrow-repeat"></i> 
                                                                    </button>
                                                                @endif --}}

                                                                @if ($lists->Maintenance_Status == 'Yes')
                                                                    <button class="btn btn-sm btn-success"
                                                                        data-toggle="modal"
                                                                        data-target="#update_maintenance3_{{ str_replace(' ', '_', $lists->Space_Unit) }}"
                                                                        title="Update Maintenance Status">
                                                                        <i class="bi bi-arrow-up-square"></i>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                            <td style="font-size:16px;">{{ $lists->name_of_owner }}</td>
                                                            <td style="font-size:16px;">{{ $lists->Space_Unit }}</td>
                                                            <td style="font-size:16px;">{{ $lists->Measurement_Size }}
                                                            </td>
                                                            <td style="font-size:16px;">{{ $lists->Maintenance_Status }}
                                                            </td>
                                                            @if ($lists->Maintenance_Due_Date != null)
                                                                <td style="font-size:16px;">
                                                                    {{ date('F j, Y', strtotime($lists->Maintenance_Due_Date)) }}
                                                                </td>
                                                            @else
                                                                <td></td>
                                                            @endif
                                                            @if ($lists->Maintenance_Cost != null)
                                                                <td style="font-size:16px;" class="cur1">
                                                                    {{ $lists->Maintenance_Cost }}</td>
                                                            @else
                                                                <td></td>
                                                            @endif
                                                            <td style="font-size:16px;">{{ $lists->Occupancy_Status }}
                                                            </td>
                                                            <td style="font-size:16px;" class="cur1">
                                                                {{ $lists->Rental_Fee }}</td>
                                                            <td style="font-size:16px;" class="cur1">
                                                                {{ $lists->Security_Deposit }}
                                                            </td>
                                                        </tr>
                                                        <!-- Update Maintenace1 Modal -->
                                                        <div class="modal fade"
                                                            id="update_maintenance1_{{ str_replace(' ', '_', $lists->Space_Unit) }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-left display-4"
                                                                            id="exampleModalLabel">Update Maintenance
                                                                            Status </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ url('/update_comm_maintenance_status2') }}"
                                                                        class="prevent_submit" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="space_units"
                                                                                value="{{ $lists->Space_Unit }}">
                                                                            <input type="hidden" name="stats"
                                                                                value="{{ $lists->Maintenance_Status }}">
                                                                            <input type="hidden" name="tenant_id"
                                                                                value="{{ $lists->Tenant_ID }}" />
                                                                            <h3 class="text-left">Setting space <span
                                                                                    class="text-success">{{ $lists->Space_Unit }}</span>
                                                                                under maintenance.</h3>
                                                                            <h3 class="text-left">Maintenance Cost : </h3>
                                                                            <input type="number" name="cost"
                                                                                class="form-control" required />
                                                                            <h3 class="text-left">Equipments/Materials
                                                                                Used: </h3>
                                                                            <textarea name="others" class="form-control" required></textarea>
                                                                            <h3 class="text-left">Reason for Maintenance :
                                                                            </h3>
                                                                            <textarea name="reason" class="form-control" required></textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-outline-danger"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-success">Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Update Maintenace2 Modal -->
                                                        {{-- <div class="modal fade"
                                                            id="update_maintenance2_{{ str_replace(' ', '_', $lists->Space_Unit) }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-left display-4"
                                                                            id="exampleModalLabel">Update Maintenance
                                                                            Status </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ url('/comm_space_maintainance_cost') }}"
                                                                        class="prevent_submit" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="space_units"
                                                                                value="{{ $lists->Space_Unit }}">
                                                                            <input type="hidden" name="stats"
                                                                                value="{{ $lists->Maintenance_Status }}">
                                                                            <input type="hidden" name="due"
                                                                                value="{{ $lists->Maintenance_Due_Date }}">
                                                                            <input type="hidden" name="tenant_id"
                                                                                value="{{ $lists->Tenant_ID }}">

                                                                            <h3>Space/Units : <span
                                                                                    class="text-primary">{{ $lists->Space_Unit }}</span>
                                                                            </h3>
                                                                            <br>
                                                                            <h3>Maintenance Cost : </h3>
                                                                            <input type="number" name="cost"
                                                                                class="form-control" required>
                                                                            <br>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-outline-danger"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-success prevent_submit">Yes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        <!-- Update Maintenace3 Modal -->
                                                        <div class="modal fade"
                                                            id="update_maintenance3_{{ str_replace(' ', '_', $lists->Space_Unit) }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-left display-4"
                                                                            id="exampleModalLabel">Update Maintenance
                                                                            Status </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ url('/update_comm_maintenance_status') }}"
                                                                        class="prevent_submit" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="space_units"
                                                                                value="{{ $lists->Space_Unit }}">
                                                                            <input type="hidden" name="cost"
                                                                                value="{{ $lists->Maintenance_Cost }}" />
                                                                            <input type="hidden" name="due"
                                                                                value="{{ $lists->Maintenance_Due_Date }}">
                                                                            <input type="hidden" name="gcash"
                                                                                value="{{ $lists->Reference_No }}">
                                                                            <input type="hidden" name="payment"
                                                                                value="{{ $lists->Proof_Image }}">
                                                                            <input type="hidden" name="tenant_id"
                                                                                value="{{ $lists->Tenant_ID }}">

                                                                            <h3 class="text-left">Maintenance Cost : <span
                                                                                    class="cur1 text-primary">{{ $lists->Maintenance_Cost }}</span>
                                                                            </h3>
                                                                            <i>Proof of Payment Here:</i>
                                                                            @if ($lists->Reference_No != null)
                                                                                <h3 class="text-left">Reference Number :
                                                                                    <span
                                                                                        class="text-primary">{{ $lists->Reference_No }}</span>
                                                                                </h3>
                                                                                @if ($lists->Proof_Image != null)
                                                                                    <h3 class="text-left">Payment Image :
                                                                                    </h3>
                                                                                    <img src="{{ $lists->Proof_Image }}"
                                                                                        class="card-img-top">
                                                                                @endif
                                                                            @endif

                                                                            <h3 class="text-left">Set Status : </h3>
                                                                            <select name="status" class="form-control"
                                                                                required>
                                                                                <option value="" selected="true"
                                                                                    disabled="disabled">Select</option>
                                                                                <option value="Paid">Paid</option>
                                                                                <option value="Non-Payment">Non-Payment
                                                                                </option>
                                                                                <option value="Security Deposit">Security
                                                                                    Deposit</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-outline-danger"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-success">Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                        @foreach ($array as $arrays)
                                            <!-- Update Maintenace3 Modal -->
                                            <div class="modal fade"
                                                id="view_history_{{ str_replace(' ', '_', $arrays['Units']) }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content" style="position: relative;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">View Maintenance History </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="overflow-x: scroll;">
                                                            <table class="table align-items-center table-flush">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col">
                                                                            Tenant Name</th>
                                                                        <th scope="col">
                                                                            Space/Unit</th>
                                                                        <th scope="col">
                                                                            Maitenance Cost</th>
                                                                        <th scope="col">Due
                                                                            Date</th>
                                                                        <th scope="col">
                                                                            Paid Date</th>
                                                                        <th scope="col">
                                                                            Payment Status</th>
                                                                        <th scope="col">
                                                                            Paid By</th>
                                                                        <th scope="col">
                                                                            Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($list3 as $index => $lists3)
                                                                        @if ($lists3->Space_Unit == $arrays['Units'])
                                                                            <tr>
                                                                                <td>{{ $lists3->name_of_owner }}</td>
                                                                                <td>{{ $lists3->Space_Unit }}</td>
                                                                                <td class="cur1">
                                                                                    {{ $lists3->Maintenance_Cost }}
                                                                                </td>
                                                                                <td>{{ date('F j, Y', strtotime($lists3->Due_Date)) }}
                                                                                </td>
                                                                                @if ($lists3->Paid_Date != null)
                                                                                    <td>{{ date('F j, Y', strtotime($lists3->Paid_Date)) }}
                                                                                    </td>
                                                                                @else
                                                                                    <td></td>
                                                                                @endif
                                                                                @if ($lists3->Payment_Status == 'Paid')
                                                                                    <td class="text-success">
                                                                                        {{ $lists3->Payment_Status }}</td>
                                                                                @else
                                                                                    <td class="text-danger">
                                                                                        {{ $lists3->Payment_Status }}</td>
                                                                                @endif
                                                                                <td>{{ $lists3->Paid_By }}</td>
                                                                                <td>
                                                                                    @if ($lists3->Payment_Status != 'Non-Payment' && $lists3->Reference_No != null)
                                                                                        <button
                                                                                            class="preview-btn btn btn-sm btn-primary"
                                                                                            data-reference-no="{{ $lists3->Reference_No }}"
                                                                                            data-proof-image="{{ $lists3->Proof_Image }}"
                                                                                            data-index="{{ $index }}">View
                                                                                            Payment</button>
                                                                                    @endif

                                                                                    @if ($lists3->Payment_Status == 'Paid (Checking)')
                                                                                        <button
                                                                                            class="btn btn-sm btn-success"
                                                                                            data-toggle="modal"
                                                                                            data-target="#update_maintenance3_status{{ $lists3->id }}"
                                                                                            title="Update Status">
                                                                                            Update Status
                                                                                        </button>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach ($list3 as $index => $lists3)
                                                @if ($lists3->Payment_Status != 'Non-Payment' && $lists3->Reference_No != null)
                                                    <div class="preview-container preview-container-{{ $index }}">
                                                        <p>Reference Number : <span
                                                                class="reference-no reference-no-{{ $index }}"></span>
                                                        </p>
                                                        @if ($lists3->Proof_Image != null)
                                                            <p>Proof Image:</p>
                                                            <img src="{{ $lists3->Proof_Image }}" alt="Proof Image"
                                                                class="proof-image proof-image-{{ $index }}">
                                                        @else
                                                            <i class="proof-image proof-image-{{ $index }}">No
                                                                proof image available</i>
                                                        @endif
                                                    </div>
                                                @endif

                                                <!-- Update Maintenace1 Modal -->
                                                <div class="modal fade"
                                                    id="update_maintenance3_status{{ $lists3->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-left display-4"
                                                                    id="exampleModalLabel">
                                                                    Update Maintenance
                                                                    Status </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3 class="text-center">Are you sure you want to set this
                                                                    maintenance to paid?</h3>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-outline-danger"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="{{ url('update_maintenance3_status', ['id' => $lists3->id, 'tid' => $lists3->Tenant_ID]) }}"
                                                                    class="btn btn-success">Yes</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
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

        //Preview Image
        const previewBtns = document.querySelectorAll('.preview-btn');
        previewBtns.forEach(previewBtn => {
            const index = previewBtn.dataset.index;
            const previewContainer = document.querySelector(`.preview-container-${index}`);
            const referenceNo = document.querySelector(`.reference-no-${index}`);
            const proofImage = document.querySelector(`.proof-image-${index}`);

            previewBtn.addEventListener('mouseenter', function() {
                referenceNo.textContent = previewBtn.dataset.referenceNo;
                proofImage.src = previewBtn.dataset.proofImage;
                previewContainer.style.display = 'block';
            });

            previewBtn.addEventListener('mouseleave', function() {
                previewContainer.style.display = 'none';
            });
        });
    </script>
    <style>
        /* remove up and down button inside form */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        @media (min-width: 992px) {
            .modal-lg {
                max-width: 90%;
                max-height: 90%;
            }
        }

        /* Preview */
        .preview-container {
            display: none;
            position: absolute;
            top: 0;
            left: 40%;
            transform: translate(-50%, -50%);
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 23999;
            width: auto;
            max-height: auto;
            text-align: center;
            justify-content: center;
        }

        .preview-container p {
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        .preview-container img {
            max-width: 100%;
            max-height: 300px;
            margin-bottom: 10px;
        }

        .img-container {
            position: relative;
            display: inline-block;
        }

        .img-container img {
            display: block;
            position: absolute;
            max-width: 100%;
        }

        .img-container .btn {
            position: relative;
        }

        .img-container .popup {
            position: absolute;
            top: 70%;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s ease-in-out;
        }

        .img-container .btn:hover .popup {
            visibility: visible;
            opacity: 1;
            z-index: 9999;
        }

        .img-container .popup img {
            display: block;
            max-width: 80vw;
            max-height: 80vh;
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: 9999;
            transform: translate(-50%, -50%);
        }

        table {
            text-align: center;
        }

        .cur1::before {
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
