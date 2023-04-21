@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin')
    <div class="container mt-8 content">
        <h1>My Notifications</h1>
        {{-- <h3>Suites</h3>
                <h2><i class="bi bi-info-circle-fill text-success pr-2"></i>You have successfully booked a hotel</h2>
                <p class="text-left text-muted pb-0 mb-0">5min ago</p> --}}
        @forelse (auth()->user()->notifications as $notif)
            <a class="" href="{{ $notif->data['link'] }}">
                <div class="shadow rounded card-hover p-4 m-2">
                    @if ($notif->data['link'])
                        <h3 class="text-truncate"><i class="bi bi-info-circle-fill text-success pr-2"></i>{{ $notif->data['txt'] }}</h3>
                    @endif
                </div>
            </a>
        @empty
            <img src="{{ asset('nvdcpics') }}/stargazing.svg" class="img-fluid" style="width: 100%; height: 150px">
            <p class="text-center display-4">There are no notifications.</p>
        @endforelse
    </div>
@endsection

<style>
    .content {
        min-height: calc(100vh - 120px);
        /* 80px header + 40px footer = 120px  */
    }

    .card-hover:hover {
        background-color: aliceblue;
    }
</style>
