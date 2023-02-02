<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <h1 class="text-green">NOVADECI</h1>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
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
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
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
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img alt="Image placeholder" src="{{ asset('nvdcpics') }}/nvdc-logo.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <!--Dashboard-->
                <li class="nav-item">
                    <a class="nav-link text-default" href="{{ route('home') }}">
                        <i class="bi bi-palette text-success"></i> {{ __('Dashboard') }}
                    </a>
                </li>

                <!--Calendar-->
                <li class="nav-item">
                        <a class="nav-link text-default" href="{{ route('Calendar') }}">
                        <i class="bi bi-calendar3 text-success"></i></i> {{ __('Calendar') }}
                    </a>
                </li>

                <!--Room Management-->
                <li class="nav-item">
                    <a class="nav-link text-default" href="{{ route('RoomManagement') }}">
                        <i class="ni ni-building text-success"></i> {{ __('Room Management') }}
                    </a>
                </li>

                <!--Front Desk-->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-pc-display-horizontal text-success">•</i>
                        <span class="nav-link-text text-default">{{ __('Front Desk') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('FrontDesk') }}">
                                <i class="bi bi-pc-display-horizontal text-success"></i> {{ __('Hotel Booking') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('HotelReservationForm') }}">
                                    <i class="bi bi-card-list text-success"></i> {{ __('Hotel Reservation') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('EventInquiryForm') }}">
                                    <i class="bi bi-calendar-event text-success"></i> {{ __('Event Inquiry') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--Housekeeping-->
                <li class="nav-item">
                    <a class="nav-link text-default" href="{{ route('Dashboard') }}">
                        <i class="bi bi-house text-success"></i> {{ __('Housekeeping') }}
                    </a>
                </li>

                <!--Reservaion-->
                <!-- <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-card-checklist text-success"></i>
                        <span class="nav-link-text text-default">{{ __('Reservation') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('EventInquiryForm') }}">
                                    <i class="bi bi-calendar-event text-success"></i> {{ __('Event Inquiry') }}
                                </a>
                            </li>

                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('HotelReservationForm') }}">
                                    <i class="bi bi-card-list text-success"></i> {{ __('Hotel Reservation') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                {{-- Commercial Space --}}
                <li class="nav-item">
                    <a class="nav-link text-default" href="{{ route('CommercialSpaceForm') }}">
                        <i class="bi bi-shop text-success"></i> {{ __('Commercial Space') }}
                    </a>
                </li>

                <!--Inventory Management-->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples3" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-box text-success"></i>
                        <span class="nav-link-text text-default">{{ __('Inventory Management') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('StockAvailability') }}">
                                    <i class="bi bi-ui-checks text-success"></i> {{ __('Stock Availability') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('StockCount') }}">
                                    <i class="bi bi-boxes text-success"></i> {{ __('Hotel Inventory') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('StockCenter') }}">
                                    <i class="bi bi-boxes text-success"></i> {{ __('Convention Center Inventory') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('StockFunction') }}">
                                    <i class="bi bi-boxes text-success"></i> {{ __('Function Rooms Inventory') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('StockPurchaseReport') }}">
                                    <i class="bi bi-receipt-cutoff text-success"></i> {{ __('Purchase Order Report') }}
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>

                <!--Maintenance-->
                <li class="nav-item">
                    <a class="nav-link text-default" href="{{ route('Maintenance') }}">
                        <i class="bi bi-person-lines-fill text-success"></i> {{ __('Maintenance') }}
                    </a>
                </li>
                <!-- Operation Management -->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples4" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-gear text-success"></i></i>
                        <span class="nav-link-text text-default">{{ __('Operations Management') }}</span>
                    </a>
                    <!-- <div class="collapse" id="navbar-examples4">
                        <ul class="nav-item">
                            <a class="nav-link" href="#navbar-examples4" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples4">
                                <i class="bi bi-box text-success"></i>
                                <span class="nav-link-text text-default">{{ __('Reservations') }}</span>
                            </a> -->
                            <div class="collapse" id="navbar-examples4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-default" href="{{ route('Reservation') }}">
                                            <i class="bi bi-view-stacked text-success"></i> {{ __('Reservations') }}
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-default" href="{{ route('RoomAvailable') }}">
                                            <i class="bi bi-check-square text-success"></i> {{ __('Room Available') }}
                                        </a>
                                    </li>
                                </ul>
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-default" href="{{ route('Request') }}">
                                                <i class="bi bi-exclamation-square text-success"></i> {{ __('Request') }}
                                            </a>
                                        </li>
                                    </ul>  
                                </div>
                    <!-- </div> -->
                    <div class="collapse" id="navbar-examples4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('Complaints') }}">
                                    <i class="bi bi-question-square text-success"></i> {{ __('Complaints') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse" id="navbar-examples4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-default" href="{{ route('Inventory') }}">
                                    <i class="bi bi-clipboard-check-fill text-success"></i> {{ __('Inventory') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">

        </div>
    </div>
</nav>
