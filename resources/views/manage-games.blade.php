@extends('layouts.main')

@section('title', 'Oddyssey | Manage Games')

@section('content')
<div class="w-full flex flex-col items-center">
    <div class="m-10 hover:scale-105">
        <a class="p-3 bg-[#374151] text-white text-sm rounded-md font-medium cursor-pointer hover:scale-105 hover:bg-[#475161]" href="/admin/manage/games/addgame">ADD NEW GAME</a>
    </div>
    <div class="games-list w-full flex flex-col gap-2 text-sm">
        @if($games->isEmpty())
            <h1 class="m-10 text-center">No Games Added!</h1>
        @else
            @foreach($games as $game)
                <div class="game-box mb-1 flex justify-between items-center rounded-md bg-white shadow">
                    <div class="game-left flex">
                        <img class="h-20" src="{{  asset('assets/apex.jpg') }}" alt="">
                        <div class="game-description mx-3 flex flex-col justify-center">
                            <h2 class="font-medium">{{ $game->title }}</h2>
                            <h3 class="text-gray-500 text-xs">{{ $game->category->categoryName }}</h3>
                        </div>
                    </div>
                    <div class="game-right mx-3 flex flex-col items-end justify-center">
                        <h2 class="font-medium"> {{ ($game->price) ?  'IDR '.number_format($game->price) : 'FREE' }}</h3>
                        <div class="flex gap-3 text-sm">
                            <button class="p-4 py-2 mt-1 bg-[#374151] rounded-md text-white font-center font-medium scale-105 hover:bg-[#475161]">UPDATE</button>
                            <button class="p-4 py-2 mt-1 bg-[#ef4343] rounded-md text-white font-center font-medium scale-105 hover:bg-[#ff5353]">DELETE</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</div>
@endsection