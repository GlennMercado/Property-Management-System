<nav class="navbar fixed-top navbar-horizontal navbar-expand-md" style="background-color: #30bc6c">
    <div class="container px-2">
        <a class="navbar-brand d-lg-none" href="{{ route('welcome') }}">
            <img src="{{ asset('nvdcpics') }}/nvdc-logo.png" style="width: 100%; height: 50px; margin-right:1%;">
        </a>
        <a class="navbar-brand d-none d-lg-block" href="{{ route('welcome') }}">
            <img src="{{ asset('nvdcpics') }}/nvdc-logo5.png" style="width: 100%; height: 50px; margin-right:1%;">
        </a>
        <div class="dropdown" style="cursor: pointer">
            <a class="me-3 dropdown-toggle hidden-arrow" role="button" data-target="#notif" id="navbarDropdownMenuLink"
                role="button" data-toggle="collapse" aria-expanded="false">
                <i class="fas fa-bell text-white"></i>
                <span class="badge rounded-pill badge-notification bg-danger text-white">
                    {{ auth()->user()->notifications->count() }} </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" id="notif" aria-labelledby="navbarDropdownMenuLink"
                style="width: 300px">
                @forelse (auth()->user()->notifications as $notif)
                    <a class="dropdown-item d-inline-block text-truncate" href="#"
                        style="max-width: 200px">{{ $notif->data['name'] }} Started!</a>
                @empty
                    <span>There are no notifications.</span>
                @endforelse

            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="avatar avatar-sm rounded-circle">
                <img src="{{ auth()->user()->profile_pic }}" class="rounded-circle">
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-2 collapse-brand">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ auth()->user()->profile_pic }}" class="rounded-circle">
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
                        <a class="dropdown-item" href="{{ url('rooms') }}">Suite</a>
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
            </ul>
        </div>
    </div>
    <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img src="{{ auth()->user()->profile_pic }}" class="rounded-circle">
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
                    <i class="bi bi-book-half"></i>
                    <span>{{ __('My Bookings') }}</span>
                </a>
                <a href="{{ url('complaints') }}" class="dropdown-item">
                    <i class="ni ni-single-copy-04"></i>
                    <span>{{ __('Send a Complaint') }}</span>
                </a>
                <a href="{{ url('FAQ') }}" class="dropdown-item">
                    <i class="ni ni-single-copy-04"></i>
                    <span>{{ __('FAQ') }}</span>
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
