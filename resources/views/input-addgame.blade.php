@extends('layouts.addform') 

@section('title', 'Oddyssey | Add Game')

@section('form')
<form action="" method="post">
    @csrf
    <h2 class="font-semibold text-[#374151] text-center mb-5">Add Game</h2>
    <div class="form-container flex flex-col gap-3 mb-2">
        <div class="form-field flex flex-col">
            <div>
                <input
                    class="w-full h-[2.5rem] p-1 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    type="text"
                    name="title"
                    id=""
                    placeholder="Title"
                />
            </div>
        </div>
        <div class="form-field flex flex-col">
            <div>
                <input
                    class="w-full h-[2.5rem] p-1 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    type="text"
                    name="category"
                    id=""
                    placeholder="Category"
                />
            </div>
        </div>
        <div class="form-field flex flex-col">
            <div>
                <input
                    class="w-full h-[2.5rem] p-1 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    type="number"
                    name="price"
                    id=""
                    placeholder="Price"
                />
            </div>
        </div>
        <div>
            <label for="thumbnail">Thumbnail</label>
            <input
                class="w-full h-[3rem] p-1 pt-2 text-sm shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                type="file"
                name="thumbnail"
                id=""
            />
        </div>
        <div>
            <label for="slider">Slider</label>
            <input
                class="w-full h-[3rem] p-1 pt-2 text-sm shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                type="file"
                name="slider"
                id=""
                multiple
            />
        </div>

        <textarea
            class="w-full p-3 rounded-md border-gray-300 border-2 ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
            name="description"
            id=""
            cols="30"
            rows="7"
        ></textarea>
    </div>
    <input
        class="w-fit h-[2rem] m-1 px-2 bg-[#374151] rounded-lg text-white text-xs cursor-pointer font-semibold hover:scale-105"
        type="submit"
        value="ADD GAME"
    />
</form>
@endsection
