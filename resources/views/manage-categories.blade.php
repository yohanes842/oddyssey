@extends('layouts.main')

@section('title', 'Oddyssey | Manage Categories')

@section('content')
<div class="w-full flex flex-col items-center">
    <div class="m-5 hover:scale-105">
        <a class="p-3 bg-[#374151] text-white text-sm rounded-md font-medium cursor-pointer hover:scale-105 hover:bg-[#475161]" href="{{ route('add-category') }}">ADD NEW CATEGORY</a>
    </div>
    <div class="categories-list w-[85%] flex flex-col gap-2 ">
        @if($categories->isEmpty())
            <h1 class="m-10 text-center">No Categories Added!</h1>
        @else
            @foreach($categories as $category)
                <div class="cat-box h-20 w-full p-5 flex justify-between items-center rounded-md bg-white shadow">
                    <div class="cat-left flex">
                        <h2 class="font-medium">{{ $category->category_name }}</h2>
                    </div>
                    <div class="cat-right flex flex-col items-end justify-center">
                        <div class="flex gap-3 text-sm">
                            <button class="p-4 py-1 bg-[#374151] rounded-md text-white font-center font-medium scale-105 hover:bg-[#475161]">UPDATE</button>
                            <button class="p-4 py-1 bg-[#ef4343] rounded-md text-white font-center font-medium scale-105 hover:bg-[#ff5353]">DELETE</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div>
                {{ $categories->links() }}
            </div>
        @endif
    </div>

</div>
@endsection