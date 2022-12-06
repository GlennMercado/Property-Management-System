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
                                <h3 class="mb-0">Stocks</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Item Description</th>
                                    <th scope="col">Available Stock</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                    @foreach ($list as $lists)
                                    <tr>
                                        <td>{{ $lists->name}}</td>
                                        <td>{{ $lists->description}}</td>
                                        <td>{{ $lists->total}}</td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#ModalView"><i class="bi bi-eye" style = "padding:2px;">View</i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('home') }}" class = "btn btn-primary" style = " margin-top:20px; margin-right:10px; color:black; background:#ffffff; border-color:#68DBA9;">
            Go Back
        </a>

            @include('layouts.footers.auth')
    </div>
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
