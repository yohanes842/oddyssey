@extends('layouts.main')

@section('title', 'Oddyssey | Search for ...')

@section('content')
    @include('partials.searchbar')

    <div class="game-card-container mb-5 w-full h-full grid grid-cols-5 gap-4 ">
    @foreach($games as $game)
        <a href="{{ route("game-detail", $game->slug) }}">
            <div class="game-card h-full bg-white rounded-lg shadow-xl ring-[#c7ccf7] hover:ring-4 hover:brightness-95">
                <div class="card-image">
                    <img class="w-full h-20 rounded-t-lg" src="{{ asset('storage/assets/'.$game->image_path.$game->thumbnail_filename) }}" alt="">
                </div>
                <div class="card-content flex flex-col gap-2 p-3">
                    <h3 class="card-gameTitle">{{ $game->title }}</h3>
                    <p class="card-description text-gray-400 text-[0.65rem] leading-3 ">{{ substr($game->description,0 ,100).'...'}}</p>
                    <h3 class="card-price pt-2 text-right">{{ ($game->price) ?  'IDR '.number_format($game->price) : 'FREE' }}</h3>
                </div>
            </div>
        </a>
    @endforeach
    </div>
    <div>
        {{ $games->links() }}
    </div>
@endsection