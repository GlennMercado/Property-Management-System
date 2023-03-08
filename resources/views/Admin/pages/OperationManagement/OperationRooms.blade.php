@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2>Operation Rooms</h2>
                            </div>
                        </div>
                    </div>
                    <table class="table align-items-center table-flush datatable datatable-Stock">
                        <thead class="thead-light">
                            <tr>
                                <div class="table-responsive">
                                    <th scope="col" style="font-size:16px;">Action</th>
                                    <th scope="col" style="font-size:16px;">Available Rooms</th>
                                    <th scope="col" style="font-size:16px;">Sample 2</th>
                                    <th scope="col" style="font-size:16px;">Sample 3</th>
                                    <th scope="col" style="font-size:16px;">Sample 4</th>
                                </div>
                            </tr>
                        </thead>
                        <tbody>
                            <td>
                                <button class="btn btn-sm btn-primary btn-sm" data-toggle="modal"
                                    data-target=""><i class="bi bi-eye"
                                        title="View Stock"></i></button>
                            </td>
                            <td>Sample 1.1</td>
                            <td>Sample 2.1</td>
                            <td>Sample 3.1</td>
                            <td>Sample 4.1</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        p {
            font-family: montserrat;
        }
    </style>
@endsection

@push('js')
@endpush
