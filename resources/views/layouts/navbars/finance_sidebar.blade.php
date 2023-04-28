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
                <!-- Finance Module -->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples13" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples13">
                        <i class="bi bi-wallet-fill" style="color:rgb(224, 223, 223)"></i>
                        <span class="nav-link-text text-light">{{ __('Finances') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples13">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'DailyReport' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('DailyReport') }}">
                                    <i class="bi bi-calendar2-range-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Daily Report') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'FinanceArchives' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('FinanceArchives') }}">
                                    <i class="bi bi-archive-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Finance Archives') }}
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
