<nav class="navbar fixed-top navbar-horizontal navbar-expand-md" style="background-color: #30bc6c">
    <div class="container px-2">
        <img src="{{ asset('nvdcpics') }}/nvdc-logo.png" style="width: 50px; height: 50px; margin-right:1%;">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <h2 class="text-white">NVDC Properties</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="avatar avatar-sm rounded-circle">
                <img src="{{ asset('nvdcpics') }}/user.png" class="rounded-circle">
            </span>

            </a>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-2 collapse-brand">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('nvdcpics') }}/user.png" class="rounded-circle">
                        </a>
                    </div>
                    <div class="col mt-1 collapse-brand">
                        <a href="{{ route('welcome') }}">
                            <h3>{{ auth()->user()->name }}</h3>
                        </a>
                    </div>
                    <div class="col-4 collapse-close">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">

                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-block d-sm-none">
                    <a href="{{ url('guest_profile') }}" class="nav-link nav-link-icon text-white font-weight-bold">
                        <i class="ni ni-single-02"></i>
                        <span class="nav-link-inner--text">{{ __('My profile') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-white font-weight-bold" href="{{ url('about_us') }}">
                        <i class="ni ni-single-02"></i>
                        <span class="nav-link-inner--text">{{ __('About Us') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-white font-weight-bold" href="{{ url('contact_us') }}">
                        <i class="bi bi-telephone-fill"></i>
                        <span class="nav-link-inner--text">{{ __('Contact Us') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-white font-weight-bold" href="{{ url('map') }}">
                        <i class="ni ni-pin-3"></i>
                        <span class="nav-link-inner--text">{{ __('Map') }}</span>
                    </a>
                </li>
                <div class="dropdown show">
                    <a class="dropdown-toggle text-white nav-link nav-link-icon font-weight-bold" href="#"
                        role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bi bi-book-half"></i>
                        <span class="nav-link-inner--text">{{ __('Book Now') }}</span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('suites') }}">Suite</a>
                        <a class="dropdown-item" href="{{ url('convention_center') }}">Convention/Function Room</a>
                        <a class="dropdown-item" href="{{ url('commercial_spaces') }}">Commercial Space</a>
                    </div>
                </div>
                <li class="nav-item d-block d-sm-none">
                    <a href="{{ route('logout') }}" class="nav-link nav-link-icon text-white font-weight-bold"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span class="nav-link-inner--text">{{ __('Logout') }}</span>
                    </a>
                </li>
                <!--<div class="btn-group">
                     <button type="button" class="btn dropdown-toggle" style = "background-color:#30BC6C; color:white;" data-toggle="dropdown" aria-haspopup="" aria-expanded="false">
                    <i class="bi bi-book-half mr-md-2"></i>Book Now
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('suites') }}">Suite</a>
                        <a class="dropdown-item" href="{{ url('convention_center') }}">Convention/Function Room</a>
                        <a class="dropdown-item" href="{{ url('commercial_spaces') }}">Commercial Space</a>
                    </div> -->
                <!-- <div class="dropdown nav-item">
                    <p class="dropbtn nav-link nav-link-icon">Book Now</p>
                        <div class="dropdown-content">
                            <a href="{{ url('suites') }}">Suites</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                        </div>
                    </div> -->

                <!-- <li class="nav-item">
                    <a class="nav-link nav-link-icon text-default" href="#" data-toggle="modal"
                        data-target="#ticket">
                        <i class="ni ni-single-02"></i>
                        <span class="nav-link-inner--text">{{ __('Submit a Ticket') }}</span>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
    <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img src="{{ asset('nvdcpics') }}/user.png" class="rounded-circle">
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-white font-weight-bold">{{ auth()->user()->name }}</span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                </div>
                <a href="{{ url('guest_profile') }}" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>{{ __('My profile') }}</span>
                </a>
                <a href="{{ url('my_bookings') }}" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>{{ __('My Bookings') }}</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
            </div>
        </li>
    </ul>
</nav>

<!-- Modal -->
<div class="modal fade" id="ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Submit a Ticket
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('welcome') }}" method="POST">

                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="row">
                        <div class="card-body bg-white" style="border-radius: 18px">
                            <div class="row">
                                <div class="col">
                                    <label for="example-email-input" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" placeholder="Enter Here.."
                                        name="name" required>
                                </div>
                                <div class="col">
                                    <label for="example-email-input" class="form-control-label">Email</label>
                                    <input class="form-control" type="email" placeholder="Enter Here.."
                                        name="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="example-text-input" class="form-control-label">Category</label>
                                    <select class="form-control" name="category" required>
                                        <option>Hotel</option>
                                        <option>Convention Center</option>
                                        <option>Function Room</option>
                                        <option>Sports Center</option>
                                        <option>Stalls</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="example-text-input" class="form-control-label">Subject </label>
                                    <input class="form-control" type="text" placeholder="Enter Subject Here.."
                                        name="subject" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Description </label>
                                <input class="form-control" type="text" placeholder="Enter Description Here.."
                                    name="description" required>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Attachment(s) </label>
                                <input type="file" class="form-control" name="ticketimages"
                                    accept="image/png, image/gif, image/jpeg" value="asd" style="width:50%; " />
                            </div>

                            <!--Buttons-->
                            <button class="btn btn-primary" type="submit"
                                style="float:right; margin-top:20px;">Submit Form</button>
                            <a href="#" class="btn btn-primary"
                                style="float:right; margin-top:20px; margin-right:10px; background:#DC5C4E; border-color:#DC5C4E;">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    body {
        overflow-x: hidden;
    }

    .dropbtn {
        color: white;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
</style>
