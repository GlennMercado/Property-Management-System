@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin')
    <div class="container mt-8 content">
        <h1><i class="bi bi-bell-fill"></i> My Notifications</h1>
        {{-- <h3>Suites</h3>
                <h2><i class="bi bi-info-circle-fill text-success pr-2"></i>You have successfully booked a hotel</h2>
                <p class="text-left text-muted pb-0 mb-0">5min ago</p> --}}
        @forelse (auth()->user()->notifications as $notif)
            <a href="{{ $notif->data['link'] }}">
                <div class="shadow rounded card-hover p-4 m-2">
                    @if ($notif->data['link'])
                        <h4 class="notif-text"><i class="bi bi-info-circle-fill text-success pr-2"></i>{{ $notif->data['txt'] }}</h4>
                    @endif
                </div>
            </a>
            <a href="{{ route('markasread', $notif->id) }}" class="text-left" style="text-decoration: underline">Mark as read</a>
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

    .notif-text {
    display: -webkit-box;
    max-width: 850px;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
