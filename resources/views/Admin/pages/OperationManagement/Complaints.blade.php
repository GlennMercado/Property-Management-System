@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--6">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">Guest Complaints</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($list as $list)
                            <div class="row">
                                <i class="ni ni-circle-08 display-4"></i>
                                <div class="card shadow ml-2 mb-2 msgcolor text-white" data-toggle="tooltip" data-placement="bottom" title="{{$list->concern}} {{$list->created_at}}" style="max-width: 500px;">
                                    <div class="card-body font-weight-bold mt--4">
                                        <br>
                                        {{ $list->concern_text }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- DELETE MODAL --}}
                        <div class="col-md-4">
                            <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog"
                                aria-labelledby="modal-notification" aria-hidden="true">
                                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                    <div class="modal-content bg-red">

                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modal-title-notification">Your attention is required
                                            </h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="py-3 text-center">
                                                <i class="ni ni-archive-2 ni-3x"></i>
                                                <h4 class="heading mt-4">Attention!</h4>
                                                <p>Are you sure you want to delete this message?</p>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white">Yes</button>
                                            <button type="button" class="btn btn-link text-white ml-auto"
                                                data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .msgcolor{
                    background-color: rgb(41, 168, 136);
                }
            </style>
        @endsection

        @push('js')
        @endpush
