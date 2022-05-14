@extends('layouts.opening') 

@section('title', 'Oddyssey | Register') 

@section('form')
    <form action="{{ route("register") }}" method="post">
        @csrf
        <div class="form-container flex flex-col mb-2">
            <div class="form-field flex flex-col mb-2">
                <label for="name">Name</label>
                <input
                    class="w-full h-[2.5rem] p-2 shadow-sm border-2 border-gray rounded-md text-black ring-[#c7ccf7] @error('name') ring-red-500 ring-1 @enderror hover:ring-1 focus:outline-none focus:ring-2"
                    type="text"
                    name="name"
                    id="name"
                    required
                    value="{{ old('name') }}"
                />
                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-field flex flex-col mb-2">
                <label for="email">Email</label>
                <input
                    class="w-full h-[2.5rem] p-2 shadow-sm border-2 border-gray rounded-md text-black ring-[#c7ccf7] @error('email') ring-red-500 ring-1 @enderror hover:ring-1 focus:outline-none focus:ring-2"
                    type="email"
                    name="email"
                    id="email"
                    required
                    value="{{ old('email')}}"
                >
                @error('email')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-field flex flex-col mb-2">
                <label for="password">Password</label>
                <input
                    class="w-full h-[2.5rem] p-2 shadow-sm border-2 border-gray rounded-md text-black ring-[#c7ccf7] @error('password') ring-red-500 ring-1 @enderror hover:ring-1 focus:outline-none focus:ring-2"
                    type="password"
                    name="password"
                    id=""
                    required
                />
                @error('password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-field flex flex-col mb-2">
                <label for="confirm_password">Confirm Password</label>
                <input
                    class="w-full h-[2.5rem] p-2 shadow-sm border-2 border-gray rounded-md text-black ring-[#c7ccf7] @error('confirm_password') ring-red-500 ring-1 @enderror hover:ring-1 focus:outline-none focus:ring-2"
                    type="password"
                    name="confirm_password"
                    id=""
                    required
                />
                @error('confirm_password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div
            class="submit-register flex justify-end items-center gap-[1rem] mt-[1rem]"
        >
            <a class="underline hover:text-[#979cc7]" href="{{ route("login") }}"
                >Already registered?</a
            >
            <input
                class="w-1/3 h-[2.5rem] bg-[#374151] rounded-lg text-white cursor-pointer hover:scale-105"
                type="submit"
                value="REGISTER"
            />
        </div>
    </form>
@endsection
