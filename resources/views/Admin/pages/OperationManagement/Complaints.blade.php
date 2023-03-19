@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <div class="row align-items-center py-4 ml-2">
        <div class="col-lg-12 col-12">
            <h6 class="h2 text-dark d-inline-block mb-0">Complaints</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item">Operation Management</li>
                    <li class="breadcrumb-item">Guest Call Register</li>
                    <li class="breadcrumb-item active text-dark" aria-current="page">Complaints</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        @foreach ($list as $list)
                            <div class="row container-fluid">
                                <i class="ni ni-circle-08 display-4"></i>
                                <p class="pl-2 pt-1 font-weight-bold">Anonymous</p>
                                {{-- <p class="pl-2 font-weight-bold">{{ $list->name }}</p> --}}
                                <div class="card shadow mb-2 msgcolor gal" data-toggle="tooltip" data-placement="bottom"
                                    title="{{ $list->concern }} {{ $list->created_at }}" style="width: 100%">
                                    <div class="card-body font-weight-bold mt--4">
                                        <br>
                                        <span
                                            class="badge badge-pill badge-primary category pt-2">{{ $list->concern }}</span>
                                        <span class="text-muted text-sm ml-2">{{ $list->created_at }}</span>
                                        <br>
                                        <br>
                                        <span class="ml-1">{{ $list->concern_text }}</span>
                                        <br>
                                        {{-- <a href="{{ $list->complaints_img }}" data-lightbox="photos"
                                            data-gallery="complaints">
                                            <img src="{{ $list->complaints_img }}" class="card-img-top mt-2"
                                                data-lightbox="photos" data-gallery="complaints"
                                                style="max-height: 350px; max-width:500px;" /> --}}
                                        </a>
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
                .gal:hover {
                    border: 1px solid rgb(115, 115, 115);
                }

                .category:hover {
                    transform: scale(1.05);
                }
            </style>
        @endsection

        @push('js')
        @endpush
