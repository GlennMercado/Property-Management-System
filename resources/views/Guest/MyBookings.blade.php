@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin', [
        'title' => __('Hello') . ' ' . auth()->user()->name,
    ])
    <div class="col-lg-12">
        <img class="card-img-top img-fluid" src="{{ asset('nvdcpics') }}/nvdcpic4.png" alt="Card image cap">
    </div>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('nvdcpics') }}/user.png" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light"></span>
                                <div class="visible-print text-center">
                                    {!! QrCode::size(200)->generate(auth()->user()->email) !!}
                                    <p>Show this code to the receptionist</p>
                                </div>
                            </h3>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1 mt-10">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('My Bookings') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                <table class="table align-items-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Project</th>
                                            <th scope="col" class="sort" data-sort="budget">Budget</th>
                                            <th scope="col" class="sort" data-sort="status">Status</th>
                                            <th scope="col">Users</th>
                                            <th scope="col" class="sort" data-sort="completion">Completion</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
