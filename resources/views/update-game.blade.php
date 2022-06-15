@extends('layouts.addform') 

@section('title', 'Oddyssey | Update Game')

@section('form')
<form action="{{ route ('update-game',$game->slug) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
                    value = "{{ old('title', $game->title)}}" 
                />
                @error('title')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-field flex flex-col">
            <div>
                <select
                    class="w-full h-[2.5rem] p-1 px-2 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    type="text"
                    name="category"
                    id="update-category-field"
                    placeholder="Category"
                >
                    @foreach($categories as $category)
                        <option value="{{ $category->category_name }}" @if(old('category', $game->category->category_name) === $category->category_name) selected @endif>{{ $category->category_name }}</option>
                    @endforeach
                </select>
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
                    value = "{{ old('price', $game->price)}}"
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
        >{{ old('description', $game->description) }}</textarea>
    </div>
    
    <button type="submit"
    class="w-fit h-[2rem] m-1 px-2 bg-[#374151] rounded-lg text-white text-xs cursor-pointer font-semibold hover:scale-105"
        >
        UPDATE GAME
    </button>
</form>
<a class="absolute px-2 py-1 top-10 left-10 text-white bg-[#374151] rounded-md shadow hover:scale-110" href="{{ route('manage-games') }}">
    Back
</a>
@endsection
