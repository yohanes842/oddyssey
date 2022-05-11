@extends('layouts.main')

@section('title', 'Oddyssey')
    
@section('content')
    @include('partials.searchbar')
    <div>
        <h1>Featured Games</h1>
        <div class="featured-games-container h-[35%] w-full"></div>
    </div>
    <div>
        <h1>Hot Games</h1>
        <div class="hot-games-container h-full w-full"></div>
    </div>
    <div class="notification-container">
        @if(session()->has('logout_success'))
        <x-notification message="{!! session('logout_success') !!}" bg-color="bg-[#c7ccf7]" text-color="text-gray-900"/>
        @elseif(session()->has('login_success'))
        <x-notification message="{!! session('login_success') !!}" bg-color="bg-green-100" text-color="text-green-900"/>
        @endif
    </div>
@endsection