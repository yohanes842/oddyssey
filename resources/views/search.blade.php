@extends('layouts.main')

@section('title', 'Oddyssey | Search for ...')

@section('content')
    @include('partials.searchbar')

    <div class="game-card-container w-full h-full grid grid-cols-5 gap-5 ">
    @foreach($games as $game)
        <div class="game-card bg-white">
            <div class="card-image">
                <img src="assets/apex.jpg" alt="">
            </div>
            <div class="card-content flex flex-col gap-1 p-3">
                <h3 class="card-gameTitle">{{ $game->title }}</h3>
                <p class="card-description text-gray-400 text-sm text-justify leading-4">{{ $game->description}}</p>
                <h3 class="card-price text-right">{{ ($game->price) ?  'IDR '.number_format($game->price) : 'FREE' }}</h3>
            </div>
        </div>
    @endforeach
    </div>
@endsection