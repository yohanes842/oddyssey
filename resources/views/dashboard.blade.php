@extends('layouts.main')

@section('title', 'Oddyssey | Dashboard')
    
@section('content')
    @include('partials.searchbar')
    
    <div>
        <h1>Featured Games</h1>
        <div class = "game-card-container mb-5 w-full h-full grid grid-cols-5 gap-4 s">
            @foreach ($featured as $featured)
                <a href="{{ route("game-detail", $featured->game->slug) }}">
                    <div class="game-card h-fit bg-white rounded-lg shadow-xl ring-[#c7ccf7] hover:ring-4 hover:brightness-95">
                        <div class="card-image">
                            <img class="w-full h-28 rounded-t-lg" src="{{ asset('assets/'.$featured->game->image_path.$featured->game->thumbnail_filename) }}" alt="">
                        </div>
                        <div class="card-content flex flex-col gap-2 p-3 relative h-40">
                            <h3 class="card-gameTitle">{{ $featured->game->title }}</h3>
                            <p class="card-description text-gray-400 text-[0.65rem] leading-3 ">{{ substr($featured->game->description,0 ,100).'...'}}</p>
                            <h3 class="card-price pt-2 text-right absolute bottom-3 right-3 ">{{ ($featured->game->price) ?  'IDR '.number_format($featured->game->price) : 'FREE' }}</h3>
                        </div>
                        
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div>
        <h1>Hot Games</h1>
        <div class="games-list pr-2 w-[100%] flex flex-col gap-2 text-sm">
            @foreach ($hot as $hot)
                <div class="game-box flex justify-between items-center rounded-md bg-white shadow">
                    <div class="game-left flex">
                        <a class="hover:brightness-90" href="{{ route('game-detail', $hot->game->slug) }}">
                            <img 
                                class="h-24 w-48" 
                                src="{{ asset('assets/'.$hot->game->image_path.$hot->game->thumbnail_filename) }}" 
                                alt=""
                            >
                        </a>
                        <div class="game-description mx-3 flex flex-col">
                            <h2 class="font-medium">{{ $hot->game->title }}</h2>
                            <h3 class="text-gray-500 text-xs">{{ $hot->game->category->category_name }}</h3>
                        </div>
                    </div>
                    
                    <div class="game-right px-3 py-1 flex flex-col items-end justify-center">
                        <h2 class="font-medium"> {{ ($hot->game->price) ?  'IDR '.number_format($hot->game->price) : 'FREE' }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="notification-container">
        @if(session()->has('logout_success'))
        <x-notification message="{!! session('logout_success') !!}" bg-color="bg-[#c7ccf7]" text-color="text-gray-900"/>
        @elseif(session()->has('login_success'))
        <x-notification message="{!! session('login_success') !!}" bg-color="bg-green-100" text-color="text-green-900"/>
        @endif
    </div>
@endsection