<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark" id="sidenav-main"
    style="background-color:rgb(54, 59, 69)">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <div class="sidenav-header d-flex justify-content-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('nvdcpics') }}/nvdc-logo6.png" style="height: 60px; width: 210px">
            </a>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main" style="background-color:rgb(54, 59, 69)">
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
            <!-- Navigation -->
            <ul class="navbar-nav">
                <!-- Operation Management -->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples5" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-gear-fill" style="color:rgb(224, 223, 223)"></i>
                        <span class="nav-link-text text-light">{{ __('Operations Management') }}</span>
                    </a>
                    <!-- <div class="collapse" id="navbar-examples4">
                        <ul class="nav-item">
                            <a class="nav-link" href="#navbar-examples4" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples4">
                                <i class="bi bi-box" style="color:rgb(224, 223, 223)"></i>
                                <span class="nav-link-text text-light">{{ __('Reservations') }}</span>
                            </a> -->

                    <div class="collapse" id="navbar-examples5">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'OperationDashboard' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('OperationDashboard') }}">
                                    <i class="bi bi-bar-chart-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                            {{-- dropdown frontdesk --}}
                            <li class="nav-item">
                                <a class="nav-link active" href="#navbar-examples10" data-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="navbar-examples7">
                                    <i class="bi bi-laptop" style="color:rgb(224, 223, 223)"></i>
                                    <span class="nav-link-text text-light">{{ __('Front Desk') }}</span>
                                </a>
                            </li>
                            <div class="collapse" id="navbar-examples10">
                                <ul class="nav nav-sm flex-column">
                                    <li
                                        class="nav-item {{ 'Guest_Reservation' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('Guest_Reservation') }}">
                                            <i class="bi bi-person-badge" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Guest Reservation') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- Dropdown Guest Call Register --}}
                            <li class="nav-item">
                                <a class="nav-link active" href="#navbar-examples7" data-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="navbar-examples7">
                                    <i class="bi bi-telephone-forward-fill" style="color:rgb(224, 223, 223)"></i>
                                    <span class="nav-link-text text-light">{{ __('Guest Call Register') }}</span>
                                </a>
                            </li>
                            <div class="collapse" id="navbar-examples7">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ 'Complaints' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('Complaints') }}">
                                            <i class="bi bi-patch-question-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Complaints') }}
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ 'Requests' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('Requests') }}">
                                            <i class="bi bi-person-lines-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Guest Request') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                        {{-- <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'GuestFolio' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('GuestFolio') }}">
                                    <i class="bi bi-person-lines-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Guest Folio') }}
                                    <span
                                        class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                        id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                </a>
                            </li>
                        </ul> --}}
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'OperationRooms' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('OperationRooms') }}">
                                    <i class="bi bi-door-open-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Rooms') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Reports' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Reports.Operation_Reports') }}">
                                    <i class="bi bi-file-earmark-text-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Reports') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>    
        </div>
        <footer>
            <span id='clock' class="text-light d-none d-lg-block" style="font-size: 12px"></span>
            {{-- <div class="copyright text-muted" style="font-size: 12px">
                &copy; {{ now()->year }} <a href="#" class="font-weight-bold ml-1"
                    target="_blank">InTeractive Solutions</a>
            </div> --}}
        </footer>
        <script type="text/javascript">
            var clockElement = document.getElementById('clock');

            function clock() {
                clockElement.textContent = new Date().toString();
            }

            setInterval(clock, 1000);
        </script>
        <style>
            .act1 {
                background-color: rgb(76, 84, 103);
                font-weight: 600;
            }

            .nav-link:hover {
                background-color: rgb(76, 84, 103);
            }
        </style>
    </div>
</nav>
