@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>


    <div class="container-fluid mt--7">
        <br>

        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0 title">Linen Management</h3>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:18px;">Room No.</th>
                                        <th scope="col" style="font-size:18px;">Date & Time <br> Received</th>
                                        <th scope="col" style="font-size:18px;">Total Linen</th>
                                        <th scope="col" style="font-size:18px;">Total Discrepancy</th>
                                        <th scope="col" style="font-size:18px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $lists)
                                        <tr>
                                            <td>{{ $lists->Room_No }}</td>
                                            <td>{{ $lists->Date_Received }}</td>
                                            <td>{{ $lists->total }}</td>
                                            <td>{{ $lists->Discrepancy }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#view_supply{{ $lists->Room_No }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @foreach ($array as $arrays)
                                {{-- View Supply --}}
                                <div id="view_supply{{ $arrays['Room_No'] }}" class="modal hide fade" tabindex="-1">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Room
                                                    {{ $arrays['Room_No'] }} Supplies
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table align-items-center table-flush" id="myTable2">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Room No
                                                            </th>
                                                            <th scope="col">Item
                                                                Name</th>
                                                            <th scope="col">
                                                                Quantity</th>
                                                            <th scope="col">
                                                                Quantity <br> Requested</th>
                                                            <th scope="col"> Status </th>  
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($list2 as $lists)
                                                            @if ($lists->Room_No == $arrays['Room_No'])
                                                                <tr>
                                                                    <td>{{ $lists->Room_No }}</td>
                                                                    <td>{{ $lists->name }}</td>
                                                                    <td>{{ $lists->Quantity }}</td>
                                                                    <td>{{ $lists->Quantity_Requested }}</td>
                                                                    <td>{{ $lists->Status}}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>




        <script>
            $('.prevent_submit').on('submit', function() {
                $('.prevent_submit').attr('disabled', 'true');
            });
            $.noConflict();
            jQuery(document).ready(function($) {
                $('#myTable').DataTable();
                $('#myTable2').DataTable();
                $('#myTable4').DataTable();
            });
            // $(document).ready(function() {
            //     $("#optionselect").change(function() {
            //         var selected = $("option:selected", this).val();
            //         if (selected == 'Cleaned') {
            //             $('#cleaned, #cleaned2').show();
            //             $('#outofservice, #outofservice2').hide();
            //         } else if (selected == 'Out of Service') {
            //             $('#outofservice, #outofservice2').show();
            //             $('#cleaned, #cleaned2').hide();
            //         }
            //     });
            // });
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
