@extends('layouts.addform') 

@section('title', 'Oddyssey | Add Game')

@section('form')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <h2 class="font-semibold text-[#374151] text-center mb-5">Add Game</h2>
    <div class="form-container flex flex-col gap-2 mb-2">
        <div class="form-field flex flex-col">
            <div>
                <input
                    class="w-full h-[2.5rem] p-1 px-3 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    type="text"
                    name="title"
                    id=""
                    placeholder="Title"
                    value="{{ old('title') }}"
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
                    id=""
                    placeholder="Category"
                >
                    <option class="bg-[#c7ccf7]" value="" @if(!old('category')) selected @endif disabled >Select game category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_name }}" @if(old('category') === $category->category_name) selected @endif>{{ $category->category_name }}</option>
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
                    value="{{ old('price') }}"
                />
                @error('price')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <label for="thumbnail">
                Thumbnail
                <span class="text-xs"> 
                    (File extension : jpg, jpeg, svg, png)*
                </span>
            </label>
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
            <label for="slider[]">
                Slider
                <span class="text-xs"> 
                    (Minimum 3 images, file extension : jpg, jpeg, svg, png)*
                </span>
            </label>
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
            placeholder="Descriptions (Minimum 10 characters)"
        >{{ old('description') }}</textarea>
        @error('description')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <input
        class="w-fit h-[2rem] m-1 px-2 bg-[#374151] rounded-lg text-white text-xs cursor-pointer font-semibold hover:scale-105"
        type="submit"
        value="ADD GAME"
    />
</form>
<a class="absolute px-2 py-1 top-10 left-10 text-white bg-[#374151] rounded-md shadow hover:scale-110" href="{{ route('manage-games') }}">
    Back
</a>
@endsection
