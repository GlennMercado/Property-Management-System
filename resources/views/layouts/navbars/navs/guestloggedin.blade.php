<nav class="navbar fixed-top navbar-horizontal bg-white navbar-expand-md">
    <div class="container px-2">
        <img src="{{ asset('nvdcpics') }}/nvdc-logo.png" style="width: 50px; height: 50px; margin-right:1%;">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <h2 class="text-default">NVDC Properties</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="ni ni-bullet-list-67 text-default"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-8 collapse-brand">
                        <a href="{{ route('welcome') }}">
                            <h3>NVDC Properties</h3>
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
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-default" href="{{ route('AboutUs') }}">
                        <i class="ni ni-single-02"></i>
                        <span class="nav-link-inner--text">{{ __('About Us') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-default" href="{{ route('ContactUS') }}">
                        <i class="ni ni-single-02"></i>
                        <span class="nav-link-inner--text">{{ __('Contact Us') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-default" href="{{route=('Map')}}">
                        <i class="ni ni-pin-3"></i>
                        <span class="nav-link-inner--text">{{ __('Map') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-default" href="#" data-toggle="modal"
                        data-target="#ticket">
                        <i class="ni ni-single-02"></i>
                        <span class="nav-link-inner--text">{{ __('Submit a Ticket') }}</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                </div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>{{ __('My profile') }}</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>{{ __('Settings') }}</span>
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
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <label for="example-email-input" class="form-control-label">Name</label>
                                        <input class="form-control" type="text" placeholder="Enter Here.."
                                            id="example-text-input" id="validationCustom01" required>
                                    </div>
                                    <div class="col">
                                        <label for="example-email-input" class="form-control-label">Email</label>
                                        <input class="form-control" type="email" placeholder="Enter Here.."
                                            id="example-email-input" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="example-text-input" class="form-control-label">Category</label>
                                        <select class="form-control" id="example-category-input" required>
                                            <option>Pick Category</option>
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
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Description </label>
                                    <input class="form-control" type="text" placeholder="Enter Description Here.."
                                        id="example-text-input" required>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Attachment(s) </label>
                                    <input type="file" class="custom-file-input" id="customFileLang"
                                        lang="en" required style="width:200px;">
                                    <input type="file" class="form-control" id="customFile"
                                        style="width:50%; " />
                                </div>

                                <!--Buttons-->
                                <button class="btn btn-primary" type="submit"
                                    style="float:right; margin-top:20px;">Submit
                                    form</button>
                                <a href="#" class="btn btn-primary"
                                    style="float:right; margin-top:20px; margin-right:10px; background:#DC5C4E; border-color:#DC5C4E;">
                                    Cancel
                                </a>
                            </form>
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
</style>
