@extends('layouts.addform') 

@section('title', 'Oddyssey | Add Category')

@section('form')
<form action="" method="post">
    <h2 class="font-semibold text-[#374151] text-center mb-5">Add Category</h2>
    <div class="form-container flex flex-col gap-3 mb-2">
        <input
            class="w-full h-[2.5rem] p-1 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
            type="text"
            name="category"
            id=""
            placeholder="Add Category"
        />
    </div>
    <input
        class="w-fit h-[2rem] m-1 px-2 bg-[#374151] rounded-lg text-white text-xs cursor-pointer font-semibold hover:scale-105"
        type="submit"
        value="ADD CATEGORY"
    />
</form>
@endsection
