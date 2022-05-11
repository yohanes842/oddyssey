@extends('layouts.main')

@section('title', 'Oddyssey | Search for ...')

@section('content')
    @include('partials.searchbar')

    <div class="game-card-container w-full h-full flex flex-wrap justify-center gap-7">
    @for($i = 0 ; $i < 15 ; $i++)
        <div class="game-card w-60 h-60 bg-white">
            <div class="card-image">
                <img src="assets/apex.jpg" alt="">
            </div>
            <div class="card-content flex flex-col gap-1 p-3">
                <h3 class="card-gameTitle">Apex Legends</h3>
                <p class="card-description text-gray-400 text-sm text-justify leading-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam in quam atque voluptas</p>
                <h3 class="card-price text-right">FREE</h3>
            </div>
        </div>
    @endfor
    </div>
@endsection