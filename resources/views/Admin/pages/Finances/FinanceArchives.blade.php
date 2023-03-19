@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Finance Archives</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Finance</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Finance Achives</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="col">

                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal" style="float:right;">
                                        Add Finance
                                    </button>
                                </div>
                                <h3 class="mb-0">Finance</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush datatable datatable-Stock">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Action</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($list as $lists)
                                    <tr>
                                        <td>
                                            <button type="button" data-toggle="modal"
                                                data-target="#ModalView{{ $lists->userid }}" class="btn btn-sm btn-primary"
                                                title="View Finance">
                                                <i class="bi bi-eye"></i></button>
                                            <button type="button" data-toggle="modal"
                                                data-target="#ModalUpdate{{ $lists->userid }}"
                                                class="btn btn-sm btn-warning" title="Update Finance">
                                                <i class="bi bi-arrow-clockwise"></i></button>
                                        </td>
                                        <td>{{ $lists->name }}</td>
                                        <td>{{ $lists->email }}</td>
                                        <td>{{ $lists->cnumber }}</td>
                                        <td>{{ $lists->status }}</td>

                                    </tr>
                                    <!-- Modal -->
                                    <!--View-->
                                    <div class="modal fade text-left" id="ModalView{{ $lists->userid }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalCreate">View
                                                        Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Payee </p>
                                                            <input type="text" class="form-control" name="name"
                                                                value="{{ $lists->name }}" readonly>
                                                            <div class="invalid-feedback">
                                                                Stock Name empty
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <p class = "mt-2">Particular </p>
                                                        <input type="text" class="form-control" name="email"
                                                            value="{{ $lists->email }}" readonly>
                                                        <p class = "mt-2">Amount </p>
                                                        <input type="text" class="form-control" name="date"
                                                            value="{{ date('m-d-Y', strtotime($lists->created_at)) }}"
                                                            readonly>
                                                        <p class = "mt-2">Remarks </p>
                                                        <input type="text" class="form-control" name="cnumber"
                                                            value="{{ $lists->cnumber }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-warning"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                    </div>
                </div>
                <!--Modal Edit-->
                <div class="modal fade text-left" id="ModalUpdate{{ $lists->userid }}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ url('/update_info') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-left">Stock ID </p>
                                            <input class="form-control" type="text" value="{{ $lists->userid }}"
                                                readonly>
                                            <input class="form-control" type="text" name="userid"
                                                value="{{ $lists->userid }}" hidden>
                                        </div>
                                        <div class="col">
                                            <p class="text-left">Payee </p>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $lists->name }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group pt-2">
                                        <label for="Stockdetails">Stock Description </label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $lists->email }}" required>
                                        <input type="hidden" class="form-control" name="cnumber"
                                            value="{{ $lists->cnumber }}">
                                        {{-- <input class="form-control" type="tel" minlength="11" maxlength="11" name="mobile" placeholder = "09XXXXXXXXX" required> --}}
                                        <label class = "pt-2">Status </label>
                                        <select class="form-control" value="{{ $lists->status }}" name="status"
                                            required>
                                            <option>Requesting</option>
                                            <option>Paid</option>
                                            <option>Unpaid</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                                    <input type="submit" name="update" value="Update" class="btn btn-success" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Table Continue-->
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

    <!--Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Add Finance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/addinfo') }}" class="prevent_submit" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <p class="text-left">Name </p>
                                <input type="text" class="form-control" name="name" placeholder="Enter name..."
                                    pattern="[A-Za-z ]+" title="Name should only contain letters." maxlength="32"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-2">
                                <p for="Stockdetails">Email </p>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email..."
                                    maxlength="32" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-2">
                                <p for="Stockdetails">Contact Number </p>
                                <input type="number" class="form-control" name="cnumber"
                                    onKeyPress="if(this.value.length==11) return false;" placeholder="09XXXXXXXXX"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-2">
                                <p for="Stockdetails">Proof of Payment </p>
                                <input type="file" class="form-control" name="proof"
                                    accept="image/png, image/gif, image/jpeg" required>

                                <input type="hidden" class="form-control" name="status" value="Requesting">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        /* disable arrows input type number */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        p {
            font-family: sans-serif;
        }
    </style>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
