<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <li class="nav-item dropdown align-items-center mr-auto">
            <a class="nav-link d-none d-md-block" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" title="Notifications">
                <i class="ni ni-bell-55 text-white"></i><span
                    class="badge rounded-pill badge-notification bg-danger text-white"
                    id="ncount">{{ auth()->user()->notifications->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-xl py-0 overflow-hidden d-none d-md-block">

                <div class="px-3 py-3">
                    <h6 class="text-sm text-muted m-0">Notifications <strong
                            class="text-primary">{{ auth()->user()->notifications->count() }}</strong>
                    </h6>
                </div>

                <div class="list-group list-group-flush scroll">
                    @forelse (auth()->user()->notifications as $notif)
                        @if ($notif->data['link'])
                            <a href="{{ $notif->data['link'] }}" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <i class="bi bi-info-circle-fill text-success"></i>
                                    </div>
                                    <div class="col ml--2">
                                        <p class="text-md mb-0 font-weight-bold">
                                            {{ $notif->data['txt'] }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @empty
                        <img src="{{ asset('nvdcpics') }}/stargazing.svg" class="img-fluid"
                            style="width: 100%; height: 150px">
                        <p class="text-center display-4">There are no notifications.</p>
                    @endforelse
                </div>

                <a href="{{ url('MyNotifications') }}"
                    class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
            </div>
        </li>
        <a href="{{ url('MyNotifications') }}" class="nav-link d-md-none ml-auto">
            <i class="ni ni-bell-55 text-white"></i><span
                class="badge rounded-pill badge-notification bg-danger text-white"
                id="ncount">{{ auth()->user()->notifications->count() }}</span>
        </a>
        <!-- Brand -->
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            {{-- <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div>
            </div> --}}
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img src="{{ asset('nvdcpics') }}/user1.png" class="rounded-circle">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome! {{ auth()->user()->name }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
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
    </div>
</nav>
