@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
        });
        // Code that uses other library's $ can follow here.
    </script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Guest Folio</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Front Desk</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Guest Folio</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class=" col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive t1">
                                <table class="table align-items-center table-flush" id="myTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:15px;">Action</th>
                                            <th scope="col" style="font-size:15px;">Guest list</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $lists)
                                            <tr>
                                                <td>
                                                    <button class="btn btn-sm bg-green text-white" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg" title="Add Charges" onclick="details()">
                                                        Add charges
                                                        <i class="bi bi-plus-circle text-white"></i>
                                                    </button>
                                                </td>
                                                <td id="g1">
                                                    NAME: <span class="font-weight-bold">{{ $lists->Guest_Name }}</span>
                                                    <br>
                                                    PAYMENT: <span class="font-weight-bold">{{ $lists->Payment }}</span>
                                                    <br>
                                                    ROOM NUMBER: <span class="font-weight-bold">{{ $lists->Room_No }}</span>
                                                    <br>
                                                    NUMBER OF PAX: <span
                                                        class="font-weight-bold">{{ $lists->No_of_Pax }}</span> <br>
                                                    DATE OF ARRIVAL: <span
                                                        class="font-weight-bold">{{ $lists->Check_In_Date }}</span> <br>
                                                    DATE OF DEPARTURE: <span
                                                        class="font-weight-bold">{{ $lists->Check_Out_Date }}</span> <br>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Large modal -->
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Charges</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Add Charges
                                            <select class="form-control" name="Charges" id="">
                                                <option value="">Towel = ₱200</option>
                                                <option value="">Linen = ₱150</option>
                                                <option value="">Bed Pad = ₱200</option>
                                                <option value="">Others</option>
                                            </select>
                                            <input type="text" class="form-control mt-3" placeholder="Enter Price" hidden>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn bg-green text-white">Save changes</button>
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
    <script>
        
    </script>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
