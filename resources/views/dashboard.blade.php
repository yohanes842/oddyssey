@extends('layouts.main')

@section('title', 'Oddyssey | Dashboard')
    
@section('content')
    @include('partials.searchbar')
    
    <div>
        <h1>Featured Games</h1>
            
            {{-- <div class="featured-games-container h-[50%] w-full flex flex-row gap-10"> --}}
            <div class = "game-card-container mb-5 w-full h-full grid grid-cols-5 gap-4 s">
                @foreach ($query as $query)
                    {{-- <div class="card rounded-lg shadow-lg bg-white max-w-sm">
                        <img src="{{ asset('storage/assets/'.$query->game->image_path.$query->game->thumbnail_filename) }}" class="card-img-top rounded-t-lg" alt="Fissure in Sandstone"/>
                        <div class="card-body p-2">
                        <h3 class="card-title text-gray-900 text-2xl font-normal mb-2">{{$query->game->title}}</h3>
                        <p class="card-text text-gray-700 text-base mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>

                        <h4 class = "flex justify-end pr-2">IDR. 10.000</h4>
                    </div> --}}
                    <a href="{{ route("game-detail", $query->game->slug) }}">
                        <div class="game-card h-fit bg-white rounded-lg shadow-xl ring-[#c7ccf7] hover:ring-4 hover:brightness-95">
                            <div class="card-image">
                                <img class="w-full h-20 rounded-t-lg" src="{{ asset('storage/assets/'.$query->game->image_path.$query->game->thumbnail_filename) }}" alt="">
                            </div>
                            <div class="card-content flex flex-col gap-2 p-3 relative h-40">
                                <h3 class="card-gameTitle">{{ $query->game->title }}</h3>
                                <p class="card-description text-gray-400 text-[0.65rem] leading-3 ">{{ substr($query->game->description,0 ,100).'...'}}</p>
                                <h3 class="card-price pt-2 text-right absolute">{{ ($query->game->price) ?  'IDR '.number_format($query->game->price) : 'FREE' }}</h3>
                            </div>
                            
                        </div>
                    </a>
                @endforeach
            </div>
            
        
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