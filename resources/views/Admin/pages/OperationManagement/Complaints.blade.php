@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <div class="row align-items-center ml-2 mt--7">
        <div class="col-lg-12 col-12">
            <h6 class="h2 text-dark d-inline-block mb-0">Complaints</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item">Operations Management</li>
                    <li class="breadcrumb-item">Guest Call Register</li>
                    <li class="breadcrumb-item active text-dark" aria-current="page">Complaints</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                    href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                        class="bi bi-person-lines-fill"></i> Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2"
                    role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                        class="bi bi-calendar-check-fill"></i> Scheduled</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3"
                    role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
                        class="bi bi-check-circle-fill"></i> Resolved</a>
            </li>
        </ul>
        <div class="tab-content mt-4" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                aria-labelledby="tabs-icons-text-1-tab">
                @foreach ($list1 as $list)
                    @if ($list->status == 'Pending')
                        <div class="card shadow">
                            <div class="card-body" id="card1">
                                <div class="row container-fluid">
                                    <img src="{{ url($list->profile_pic) }}" class="rounded-circle"
                                        style="width: 40px; height: 40px">
                                    <p class="pl-2 pt-1 font-weight-bold">{{ $list->name }}</p>
                                    <button class="btn btn-sm bg-green text-white ml-auto" data-toggle="modal"
                                        data-target="#view{{ $list->id }}">Action <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <div class="card shadow mb-2 msgcolor gal mt-3" data-toggle="tooltip"
                                        data-placement="bottom" title="{{ $list->concern }} {{ $list->created_at }}"
                                        style="width: 100%">
                                        <div class="card-body font-weight-bold mt--4">
                                            <br>
                                            <span
                                                class="badge badge-pill badge-primary category pt-2">{{ $list->concern }}</span>
                                            <span class="text-muted text-sm ml-2">{{ $list->created_at }}</span>
                                            <br>
                                            <h2 class="text-red mt-3">{{ $list->status }} <i
                                                    class="bi bi-hourglass-bottom"></i>
                                            </h2>
                                            <br>
                                            <br>
                                            <span class="ml-1">{{ $list->concern_text }}</span>
                                            <br>
                                            <a href="{{ $list->complaints_img }}" data-lightbox="photos"
                                                data-gallery="complaints">
                                                <img src="{{ $list->complaints_img }}" class="card-img-top mt-2"
                                                    data-lightbox="photos" data-gallery="complaints"
                                                    style="max-height: 350px; max-width:500px;" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="modal fade bd-example-modal-lg" id="view{{ $list->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                        Complaints
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <img src="{{ url($list->profile_pic) }}" style="width: 40px; height: 40px">
                                        <p class="pl-2 pt-1 font-weight-bold">{{ $list->name }}</p>
                                    </div>
                                    {{-- <p class="pl-2 font-weight-bold">{{ $list->name }}</p> --}}
                                    <div class="card shadow mb-2 msgcolor mt-3" data-toggle="tooltip"
                                        data-placement="bottom" title="{{ $list->concern }} {{ $list->created_at }}"
                                        style="width: 100%">
                                        <div class="card-body font-weight-bold mt--4">
                                            <form method="POST" class="prevent_submit"
                                                action="{{ url('/complaints_status') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <br>
                                                <input type="text" value="{{ $list->id }}" hidden="true"
                                                    name="id">
                                                <span
                                                    class="badge badge-pill badge-primary category pt-2">{{ $list->concern }}</span>
                                                <span class="text-muted text-sm ml-2">{{ $list->created_at }}</span>
                                                <br>
                                                <br>
                                                <span class="ml-1">{{ $list->concern_text }}</span>
                                                <br>
                                                <a href="{{ $list->complaints_img }}" data-lightbox="photos"
                                                    data-gallery="complaints">
                                                    <img src="{{ $list->complaints_img }}" class="card-img-top mt-2"
                                                        data-lightbox="photos" data-gallery="complaints"
                                                        style="max-height: 350px; max-width:500px;" />
                                                </a>
                                                <div class="form-group mt-2">
                                                    <label for="exampleFormControlTextarea1">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="Scheduled">Scheduled</option>
                                                        <option value="Resolved">Resolved</option>
                                                    </select>
                                                    <label for="exampleFormControlTextarea1" class="mt-3">Schedule
                                                        Maintenance</label>
                                                    <input type="date" class="form-control" name="sched"
                                                        id="my_datepicker">
                                                    <label for="exampleFormControlTextarea1"
                                                        class="mt-3">Remarks</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remarks" max-length="220"></textarea>
                                                </div>
                                                <input type="submit" value="Resolve"
                                                    class="form-control bg-green text-white mt-4">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (!$list1)
                    <div class="card shadow">
                        <img src="{{ asset('nvdcpics') }}/complaints.svg" class="img-fluid"
                            style="width: 100%; height: 200px">
                        <p class="text-center display-5">No complaints yet</p>
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                @foreach ($list2 as $list)
                    @if ($list->status == 'Scheduled')
                        <div class="card shadow">
                            <div class="card-body" id="card1">
                                <div class="row container-fluid">
                                    <img src="{{ url($list->profile_pic) }}" class="rounded-circle"
                                        style="width: 40px; height: 40px">
                                    <p class="pl-2 pt-1 font-weight-bold">{{ $list->name }}</p>
                                    <button class="btn btn-sm bg-green text-white ml-auto" data-toggle="modal"
                                        data-target="#view{{ $list->id }}">Action <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <div class="card shadow mb-2 msgcolor gal mt-3" data-toggle="tooltip"
                                        data-placement="bottom" title="{{ $list->concern }} {{ $list->created_at }}"
                                        style="width: 100%">
                                        <div class="card-body font-weight-bold mt--4">
                                            <br>
                                            <span
                                                class="badge badge-pill badge-primary category pt-2">{{ $list->concern }}</span>
                                            <span class="text-muted text-sm ml-2">{{ $list->created_at }}</span>
                                            <br>
                                            <h2 class="text-blue mt-3">{{ $list->status }}
                                                <i class="bi bi-calendar-check-fill"></i>
                                                {{ \Carbon\Carbon::parse($list->schedule)->format('l, F jS, Y') }}
                                            </h2>
                                            <br>
                                            <br>
                                            <span class="ml-1">{{ $list->concern_text }}</span>
                                            <br>
                                            <a href="{{ $list->complaints_img }}" data-lightbox="photos"
                                                data-gallery="complaints">
                                                <img src="{{ $list->complaints_img }}" class="card-img-top mt-2"
                                                    data-lightbox="photos" data-gallery="complaints"
                                                    style="max-height: 350px; max-width:500px;" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="modal fade bd-example-modal-lg" id="view{{ $list->id }}" tabindex="-1"
                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                        Complaints
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <img src="{{ url($list->profile_pic) }}" style="width: 40px; height: 40px">
                                        <p class="pl-2 pt-1 font-weight-bold">{{ $list->name }}</p>
                                    </div>
                                    {{-- <p class="pl-2 font-weight-bold">{{ $list->name }}</p> --}}
                                    <div class="card shadow mb-2 msgcolor mt-3" data-toggle="tooltip"
                                        data-placement="bottom" title="{{ $list->concern }} {{ $list->created_at }}"
                                        style="width: 100%">
                                        <div class="card-body font-weight-bold mt--4">
                                            <form method="POST" class="prevent_submit"
                                                action="{{ url('/complaints_status') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <br>
                                                <input type="text" value="{{ $list->id }}" hidden="true"
                                                    name="id">
                                                <span
                                                    class="badge badge-pill badge-primary category pt-2">{{ $list->concern }}</span>
                                                <span class="text-muted text-sm ml-2">{{ $list->created_at }}</span>
                                                <br>
                                                <br>
                                                <span class="ml-1">{{ $list->concern_text }}</span>
                                                <br>
                                                <a href="{{ $list->complaints_img }}" data-lightbox="photos"
                                                    data-gallery="complaints">
                                                    <img src="{{ $list->complaints_img }}" class="card-img-top mt-2"
                                                        data-lightbox="photos" data-gallery="complaints"
                                                        style="max-height: 350px; max-width:500px;" />
                                                </a>
                                                <div class="form-group mt-2">
                                                    <label for="exampleFormControlTextarea1">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="Scheduled">Scheduled</option>
                                                        <option value="Resolved">Resolved</option>
                                                    </select>
                                                    <label for="exampleFormControlTextarea1" class="mt-3">Schedule
                                                        Maintenance</label>
                                                    <input type="date" class="form-control" name="sched"
                                                        id="my_datepicker">
                                                    <label for="exampleFormControlTextarea1"
                                                        class="mt-3">Remarks</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remarks" max-length="220"></textarea>
                                                </div>
                                                <input type="submit" value="Resolve"
                                                    class="form-control bg-green text-white mt-4">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (!$list2)
                    <div class="card shadow">
                        <img src="{{ asset('nvdcpics') }}/complaints.svg" class="img-fluid"
                            style="width: 100%; height: 200px">
                        <p class="text-center display-5">No complaints yet</p>
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                @foreach ($list3 as $list)
                    @if ($list->status == 'Resolved')
                        <div class="card shadow">
                            <div class="card-body" id="card1">
                                <div class="row container-fluid">
                                    <img src="{{ url($list->profile_pic) }}" class="rounded-circle"
                                        style="width: 40px; height: 40px">
                                    <p class="pl-2 pt-1 font-weight-bold">{{ $list->name }}</p>
                                    <button class="btn btn-sm bg-green text-white ml-auto" data-toggle="modal"
                                        data-target="#view{{ $list->id }}">Action <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <div class="card shadow mb-2 msgcolor gal mt-3" data-toggle="tooltip"
                                        data-placement="bottom" title="{{ $list->concern }} {{ $list->created_at }}"
                                        style="width: 100%">
                                        <div class="card-body font-weight-bold mt--4">
                                            <br>
                                            <span
                                                class="badge badge-pill badge-primary category pt-2">{{ $list->concern }}</span>
                                            <span class="text-muted text-sm ml-2">{{ $list->created_at }}</span>
                                            <br>
                                            <h2 class="text-green mt-3">{{ $list->status }} <i
                                                    class="bi bi-check-lg"></i>
                                            </h2>
                                            <br>
                                            <br>
                                            <span class="ml-1">{{ $list->concern_text }}</span>
                                            <br>
                                            <a href="{{ $list->complaints_img }}" data-lightbox="photos"
                                                data-gallery="complaints">
                                                <img src="{{ $list->complaints_img }}" class="card-img-top mt-2"
                                                    data-lightbox="photos" data-gallery="complaints"
                                                    style="max-height: 350px; max-width:500px;" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="modal fade bd-example-modal-lg" id="view{{ $list->id }}" tabindex="-1"
                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                        Complaints
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <img src="{{ url($list->profile_pic) }}" style="width: 40px; height: 40px">
                                        <p class="pl-2 pt-1 font-weight-bold">{{ $list->name }}</p>
                                    </div>
                                    {{-- <p class="pl-2 font-weight-bold">{{ $list->name }}</p> --}}
                                    <div class="card shadow mb-2 msgcolor mt-3" data-toggle="tooltip"
                                        data-placement="bottom" title="{{ $list->concern }} {{ $list->created_at }}"
                                        style="width: 100%">
                                        <div class="card-body font-weight-bold mt--4">
                                            <form method="POST" class="prevent_submit"
                                                action="{{ url('/complaints_status') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <br>
                                                <input type="text" value="{{ $list->id }}" hidden="true"
                                                    name="id">
                                                <span
                                                    class="badge badge-pill badge-primary category pt-2">{{ $list->concern }}</span>
                                                <span class="text-muted text-sm ml-2">{{ $list->created_at }}</span>
                                                <br>
                                                <br>
                                                <span class="ml-1">{{ $list->concern_text }}</span>
                                                <br>
                                                <a href="{{ $list->complaints_img }}" data-lightbox="photos"
                                                    data-gallery="complaints">
                                                    <img src="{{ $list->complaints_img }}" class="card-img-top mt-2"
                                                        data-lightbox="photos" data-gallery="complaints"
                                                        style="max-height: 350px; max-width:500px;" />
                                                </a>
                                                <div class="form-group mt-2">
                                                    <label for="exampleFormControlTextarea1">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="Scheduled">Scheduled</option>
                                                        <option value="Resolved">Resolved</option>
                                                    </select>
                                                    <label for="exampleFormControlTextarea1" class="mt-3">Schedule
                                                        Maintenance</label>
                                                    <input type="date" class="form-control" name="sched"
                                                        id="my_datepicker">
                                                    <label for="exampleFormControlTextarea1"
                                                        class="mt-3">Remarks</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remarks" max-length="220"></textarea>
                                                </div>
                                                <input type="submit" value="Resolve"
                                                    class="form-control bg-green text-white mt-4">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (!$list3)
                    <div class="card shadow">
                        <img src="{{ asset('nvdcpics') }}/complaints.svg" class="img-fluid"
                            style="width: 100%; height: 200px">
                        <p class="text-center display-5">No complaints yet</p>
                    </div>
                @endif
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
    <script>
        // Get the datepicker element
        var datepicker = document.getElementById("my_datepicker");

        // Add an event listener to the datepicker
        datepicker.addEventListener("input", function() {
            // Get the selected date from the datepicker
            var selectedDate = new Date(this.value);

            // Get today's date
            var today = new Date();

            // Disable the datepicker if the selected date is in the past
            if (selectedDate < today) {
                this.value = ""; // Clear the datepicker value
                alert("Please select a date in the future."); // Show an error message
            }
        });
    </script>
@endsection

@push('js')
@endpush
