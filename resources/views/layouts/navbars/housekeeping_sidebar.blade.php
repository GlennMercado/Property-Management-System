<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <!-- Brand -->
        <div class="sidenav-header d-flex justify-content-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('nvdcpics') }}/nvdc-logo4.png" style="height: 45px; width: 210px">
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
                        <img alt="Image placeholder" src="{{ asset('nvdcpics') }}/nvdc-logo.png">
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

                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('Housekeeper_Dashboard') }}">
                        <i class="bi bi-graph-up" style = "color: green"></i> {{ __('Dashboard') }}
                    </a>
                </li>

                <!-- Linen Monitoring -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('Linens_Monitoring') }}">
                        <i class="bi bi-ui-checks-grid" style = "color: green"></i> {{ __('Linen Monitoring') }}
                    </a>
                </li>
                
                <!-- Maintenance-->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('Maintenances') }}">
                        <i class="bi bi-tools" style = "color: green"></i> {{ __('Maintenance') }}
                    </a>
                </li>

                 <!-- Lost and Found -->
                 <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('LostandFounds') }}">
                        <i class="bi bi-tools" style = "color: green"></i> {{ __('Lost and Found') }}
                    </a>
                </li>

                <!-- Guest Request -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('Guest_Requests') }}">
                        <i class="bi bi-file-earmark-text" style = "color: green"></i> {{ __('Guest Request') }}
                    </a>
                </li>

                <!-- Report -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('Housekeeping_Report.reports') }}">
                        <i class="bi bi-journal-bookmark" style = "color: green"></i> {{ __('Reports') }}
                    </a>
                </li>

                





                <!-- Divider -->
                <hr class="my-3">

        </div>
        <footer>
            <span id='clock' class="text-dark d-none d-lg-block" style="font-size: 12px"></span>
            <div class="copyright text-muted" style="font-size: 12px">
                &copy; {{ now()->year }} <a href="#" class="font-weight-bold ml-1"
                    target="_blank">InTeractive Solutions</a>
            </div>
        </footer>
        <script type="text/javascript">
            var clockElement = document.getElementById('clock');

            function clock() {
                clockElement.textContent = new Date().toString();
            }

            setInterval(clock, 1000);
        </script>
    </div>
</nav>

