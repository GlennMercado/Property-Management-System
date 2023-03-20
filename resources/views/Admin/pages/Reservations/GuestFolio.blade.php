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
                                            <th scope="col" style="font-size:15px;">Payment</th>
                                            <th scope="col" style="font-size:15px;">Room Number</th>
                                            <th scope="col" style="font-size:15px;">Name</th>
                                            <th scope="col" style="font-size:15px;">Pax</th>
                                            <th scope="col" style="font-size:15px;">Check In</th>
                                            <th scope="col" style="font-size:15px;">Check Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $lists)
                                            <tr>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                        data-target="" title="Update">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button>
                                                </td>
                                                <td>{{ $lists->Payment }}</td>
                                                <td>{{ $lists->Room_No }}</td>
                                                <td>{{ $lists->Guest_Name }}</td>
                                                <td>{{ $lists->No_of_Pax }}</td>
                                                <td>{{ $lists->Check_In_Date }}</td>
                                                <td>{{ $lists->Check_Out_Date }}</td>
                                            </tr>
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
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
