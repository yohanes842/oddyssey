@extends('layouts.addform') 

@section('title', 'Oddyssey | Update Game')

@section('form')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="oldTitle" value ="{{ $game->title }}">
    <h2 class="font-semibold text-[#374151] text-center mb-5">Update Game</h2>
    <div class="form-container flex flex-col gap-2 mb-2">
        <div class="form-field flex flex-col">
            <div>
                <input
                    class="w-full h-[2.5rem] p-1 px-3 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    type="text"
                    name="title"
                    id=""
                    placeholder="Title"
                    value = "{{ $game->title}}" 
                />
                @error('title')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-field flex flex-col">
            <div>
                <input
                    class="w-full h-[2.5rem] p-1 px-3 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    type="text"
                    name="category"
                    id=""
                    placeholder="Category"
                    value = "{{ $game->category->category_name}}"
                />
                @error('category')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-field flex flex-col">
            <div>
                <input
                    class="w-full h-[2.5rem] p-1 px-3 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    type="number"
                    name="price"
                    id=""
                    placeholder="Price"
                    value = "{{ $game->price}}"
                />
                @error('price')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <label for="thumbnail">Thumbnail</label>
            <input
                class="w-full h-[3rem] p-1 pt-2 px-3 text-sm shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                type="file"
                name="thumbnail"
                id=""
            />
            @error('thumbnail')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="slider[]">Slider</label>
            <input
                class="w-full h-[3rem] p-1 pt-2 px-3 text-sm shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                type="file"
                name="slider[]"
                id=""
                multiple
            />
            @error('slider')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
            @foreach($errors->get('slider.*') as $errors)
                    <li>{{ $errors[0] }}</li>
            @endforeach
        </div>

        <textarea
            class="w-full p-3 rounded-md border-gray-300 border-2 ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
            name="description"
            id=""
            cols="30"
            rows="7"
        >{{ $game->description }}</textarea>
    </div>
    <form action="{{ route ('update-game',$game->slug) }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $game->id }}">
        <button type="submit"
        class="w-fit h-[2rem] m-1 px-2 bg-[#374151] rounded-lg text-white text-xs cursor-pointer font-semibold hover:scale-105"
            >
            UPDATE GAME
        </button>
        </form>
    {{-- <input
        class="w-fit h-[2rem] m-1 px-2 bg-[#374151] rounded-lg text-white text-xs cursor-pointer font-semibold hover:scale-105"
        type="submit"
        value="UPDATE GAME"
    /> --}}
</form>
@endsection