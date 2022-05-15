@extends('layouts.addform') 

@section('title', 'Oddyssey | Update Category')

@section('form')
<form action="" method="post">
    @csrf
    <input type="hidden" name="oldName" value ="{{ $category->category_name }}">
    <h2 class="font-semibold text-[#374151] text-center mb-5">Add Category</h2>
    <div class="form-container flex flex-col gap-3 mb-2">
        <input
            class="w-full h-[2.5rem] p-1 px-3 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
            type="text"
            name="category_name"
            id=""
            placeholder="Add Category"
            value="{{ $category->category_name }}"
        />
        @error('category_name')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <form action="{{ route ('update-cat',$category->slug) }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $category->id }}">
        <button type="submit"
        class="w-fit h-[2rem] m-1 px-2 bg-[#374151] rounded-lg text-white text-xs cursor-pointer font-semibold hover:scale-105"
            >
            UPDATE CATEGORY
        </button>
    </form>
</form>
@endsection
{{-- 
@section('notification')
    @if(session()->has('add_success'))
    <x-notification message="{!! session('add_success') !!}" bg-color="bg-green-100" text-color="text-green-900"/>
    @endif  
@endsection --}}
