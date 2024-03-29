@extends('layouts.addform') 

@section('title', 'Oddyssey | Add Category')

@section('form')
<form action="" method="post">
    @csrf
    <h2 class="font-semibold text-[#374151] text-center mb-5">Add Category</h2>
    <div class="form-container flex flex-col gap-3 mb-2">
        <input
            class="w-full h-[2.5rem] p-1 px-3 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
            type="text"
            name="category_name"
            id=""
            placeholder="Add Category"
            value="{{ old("category_name") }}"
        />
        @error('category_name')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <input
        class="w-fit h-[2rem] m-1 px-2 bg-[#374151] rounded-lg text-white text-xs cursor-pointer font-semibold hover:scale-105"
        type="submit"
        value="ADD CATEGORY"
    />
</form>
<a class="absolute px-2 py-1 top-10 left-10 text-white bg-[#374151] rounded-md shadow hover:scale-110" href="{{ route('manage-categories') }}">
    Back
</a>
@endsection
