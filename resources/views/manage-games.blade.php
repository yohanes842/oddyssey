@extends('layouts.main')

@section('title', 'Oddyssey | Manage Games')

@section('content')
<div class="w-full flex flex-col items-center">
    <div class="m-5 hover:scale-105">
        <a class="p-3 bg-[#374151] text-white text-sm rounded-md font-medium cursor-pointer hover:scale-105 hover:bg-[#475161]" href="{{ route('add-game') }}">ADD NEW GAME</a>
    </div>
    <div class="games-list pr-2 w-[85%] flex flex-col gap-2 text-sm">
        @if($games->isEmpty())
            <h1 class="m-10 text-center">No Games Added!</h1>
        @else
            @foreach($games as $game)
                <div class="game-box flex justify-between items-center rounded-md bg-white shadow">
                    <div class="game-left flex">
                        <img class="h-20" src="{{  asset('storage/assets/'.$game->image_path.'/thumb.jpg') }} " alt="">
                        <div class="game-description mx-3 flex flex-col justify-center">
                            <h2 class="font-medium">{{ $game->title }}</h2>
                            <h3 class="text-gray-500 text-xs">{{ $game->category->category_name }}</h3>
                        </div>
                    </div>
                    <div class="game-right px-3 py-1 flex flex-col items-end justify-center">
                        <h2 class="font-medium"> {{ ($game->price) ?  'IDR '.number_format($game->price) : 'FREE' }}</h3>
                        <div class="flex gap-3 text-sm my-1">
                            <a class="p-4 py-1 bg-[#374151] rounded-md text-white font-center font-medium scale-105 hover:bg-[#475161]" href="{{ route('update-game', $game->slug) }}">UPDATE GAME</a>

                            <form action="{{ route ('delete-game') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $game->id }}">
                                <button type="submit"
                                class="p-4 py-1 bg-[#ef4343] rounded-md text-white font-center font-medium scale-105 hover:bg-[#ff5353]"
                                    >
                                    DELETE
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
            <div>
                {{ $games->links() }}
            </div>
        @endif
    </div>

</div>
@endsection

@section('notification')
    @if(session()->has('delete_success'))
    <x-notification message="{!! session('delete_success') !!}" bg-color="bg-green-100" text-color="text-green-900"/>
    @endif  

    @if(session()->has('update_success'))
    <x-notification message="{!! session('update_success') !!}" bg-color="bg-green-100" text-color="text-green-900"/>
    @endif  
@endsection



