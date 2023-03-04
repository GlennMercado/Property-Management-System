<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" style="background-color: rgb(55, 58, 66)"
    id="sidenav-main">
    <div class="container-fluid txt1">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <div class="sidenav-header align-items-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('nvdcpics') }}/nvdc-logo2.png" style="height: 65px; width: 185px">
            </a>
        </div>
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
                        onclick="event.preven-white();
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
                <li class="nav-item {{ 'home' == request()->path() ? 'act1' : '' }}">
                    <a class="nav-link text-light" href="{{ route('home') }}">
                        <i class="bi bi-graph-up text-light"></i> {{ __('Dashboard') }}
                    </a>
                </li>

                <!--Calendar-->
                {{-- <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('Calendar') }}">
                        <i class="bi bi-calendar3 text-light"></i></i> {{ __('Calendar') }}
                    </a>
                </li> --}}


                <!--Calendar-->
                <li class="nav-item {{ 'Hotel_Room_Management' == request()->path() ? 'act1' : '' }}">
                    <a class="nav-link text-light" href="{{ route('Dashboard') }}">
                        <i class="bi bi-house text-light"></i> {{ __('Room Management') }}
                    </a>
                </li>


                <!--Front Desk-->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-pc-display-horizontal text-light"></i>
                        <span class="nav-link-text text-light">{{ __('Front Desk') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'HotelReservationForm' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('HotelReservationForm') }}">
                                    <i class="bi bi-journal text-light"></i> {{ __('Hotel Booking') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'EventInquiryForm' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('EventInquiryForm') }}">
                                    <i class="bi bi-calendar3-event text-light"></i> {{ __('Event Inquiry') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--Housekeeping-->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples4" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples4">
                        <i class="bi bi-house text-light"></i>
                        <span class="nav-link-text text-light">{{ __('Housekeeping') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Housekeeping_Dashboard' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Housekeeping_Dashboard') }}">
                                    <i class="bi bi-graph-up text-light"></i> {{ __('Dashboard') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Linen_Monitoring' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Linen_Monitoring') }}">
                                    <i class="bi bi-ui-checks-grid text-light"></i> {{ __('Linen Monitoring') }}
                                </a>
                            </li>
                        </ul>
                        {{-- <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('Key_Management') }}">
                                    <i class="text-light">•</i> {{ __('Key Management') }}
                                </a>
                            </li>
                        </ul> --}}
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Maintenance' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Maintenance') }}">
                                    <i class="bi bi-tools text-light"></i> {{ __('Maintenance') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Housekeeping_Reports' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Housekeeping_Reports.reports') }}">
                                    <i class="bi bi-journal-bookmark text-light"></i> {{ __('Reports') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Commercial Space --}}
                <li class="nav-item {{ 'CommercialSpaceForm' == request()->path() ? 'act1' : '' }}">
                    <a class="nav-link text-light" href="{{ route('CommercialSpaceForm') }}">
                        <i class="bi bi-shop text-light"></i> {{ __('Commercial Space') }}
                    </a>
                </li>

                <!--Inventory Management-->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples3" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-clipboard-data text-light"></i>
                        <span class="nav-link-text text-light">{{ __('Inventory Management') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples3">
                        {{-- <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('StockAvailability') }}">
                                    <i class="text-light">•</i> {{ __('Stock Availability') }}
                                </a>
                            </li>
                        </ul> --}}
                        {{-- <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('StockAvail') }}">
                                    <i class="text-light">•</i> {{ __('Stock Movement History') }}
                                </a>
                            </li>
                        </ul> --}}
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockCount' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockCount') }}">
                                    <i class="bi bi-archive text-light"></i> {{ __('Hotel Inventory') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockCenter' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockCenter') }}">
                                    <i class="bi bi-box-seam text-light"></i> {{ __('Convention Center Inventory') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockHotelLinen' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockHotelLinen') }}">
                                    <i class="bi bi-question-circle text-light"></i> {{ __('Linen Request') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockHotelSupply' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockHotelSupply') }}">
                                    <i class="bi bi-boxes text-light"></i> {{ __('Supply Request') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockReports' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockReports') }}">
                                    <i class="bi bi-list-task text-light"></i> {{ __('Stock Reports') }}
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>


                <!-- Operation Management -->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples5" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-gear text-light"></i>
                        <span class="nav-link-text text-light">{{ __('Operations Management') }}</span>
                    </a>
                    <!-- <div class="collapse" id="navbar-examples4">
                        <ul class="nav-item">
                            <a class="nav-link" href="#navbar-examples4" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples4">
                                <i class="bi bi-box text-light"></i>
                                <span class="nav-link-text text-white">{{ __('Reservations') }}</span>
                            </a> -->

                    <div class="collapse" id="navbar-examples5">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'OperationDashboard' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('OperationDashboard') }}">
                                    <i class="bi bi-graph-up text-light"></i> {{ __('Dashboard') }}
                                </a>
                            </li>
                            {{-- Dropdown pt2 --}}
                            <li class="nav-item">
                                <a class="nav-link active" href="#navbar-examples7" data-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="navbar-examples7">
                                    <i class="bi bi-person-lines-fill text-light"></i>
                                    <span class="nav-link-text text-light">{{ __('Guest Call Register') }}</span>
                                </a>
                            </li>
                            <div class="collapse" id="navbar-examples7">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ 'Complaints' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('Complaints') }}">
                                            <i class="bi bi-question-circle text-light"></i> {{ __('Complaints') }}
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ 'Guest_Request' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('Guest_Request') }}">
                                            <i class="bi bi-file-earmark-text text-light"></i>
                                            {{ __('Guest Request') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Guest_Reservation' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Guest_Reservation') }}">
                                    <i class="bi bi-person-badge text-light"></i> {{ __('Guest Reservation') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Reports' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Reports') }}">
                                    <i class="bi bi-journal-bookmark text-light"></i> {{ __('Reports') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- </div> -->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples13" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples13">
                        <i class="bi bi-cash-coin text-light"></i>
                        <span class="nav-link-text text-light">{{ __('Finances') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples13">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'FinanceDashboard' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('FinanceDashboard') }}">
                                    <i class="bi bi-graph-up text-light"></i> {{ __('Finance Dashboard') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Finance' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Finance') }}">
                                    <i class="bi bi-cash-coin text-light"></i> {{ __('Finance') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'DailyReport' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('DailyReport') }}">
                                    <i class="bi-clipboard2-check text-light"></i> {{ __('Daily Report') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- User Management --}}
                <li class="nav-item {{ 'UserManagement' == request()->path() ? 'act1' : '' }}">
                    <a class="nav-link text-light" href="{{ route('UserManagement') }}">
                        <i class="bi bi-shop text-light"></i> {{ __('User Management') }}
                    </a>
                </li>


        </div>
        <footer>
            <span id='clock' class="text-light d-none d-lg-block"></span>
        </footer>
        <script type="text/javascript">
            var clockElement = document.getElementById('clock');

            function clock() {
                clockElement.textContent = new Date().toString();
            }

            setInterval(clock, 1000);
        </script>
        <style>
            .txt1 {
                font-weight: 600;
            }
            .act1 {
                background-color: rgb(88, 93, 105);
            }
        </style>
    </div>
</nav>
