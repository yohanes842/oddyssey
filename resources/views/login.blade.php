@extends('layouts.opening') 

@section('title', 'Oddyssey | Login') 

@section('form')
    <form action="{{ route("login") }}" method="post">
        @csrf
        <div class="form-container flex flex-col mb-2">
            <div class="form-field flex flex-col mb-2">
                <label for="email">Email</label>
                <div>
                    <input
                        class="w-full h-[2.5rem] p-2 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                        type="email"
                        name="email"
                        id=""
                        required
                    />
                </div>
            </div>
            <div class="form-field flex flex-col mb-2">
                <label for="">Password</label>
                <input
                    class="w-full h-[2.5rem] p-2 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    type="password"
                    name="password"
                    id=""
                    required
                />
            </div>
            <div class="form-field">
                <input class="rounded-lg ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2 active:ring-2" type="checkbox" name="rememberme" id="rememberme" />
                <label for="rememberme">Remember me</label>
            </div>
        </div>
        <div class="submit flex flex-col items-center gap-[1rem] mt-[1rem]">
            <a class="underline hover:text-[#979cc7]" href="{{ route("register") }}"
                >Don't have an account? Register now!</a
            >
            <input
                class="w-1/5 h-[2.5rem] bg-[#374151] rounded-lg text-white cursor-pointer hover:scale-105"
                type="submit"
                value="LOG IN"
            />
        </div>
    </form>
@endsection

@section('notification')
    @if(session()->has('register_success'))
    <x-notification message="{!! session('register_success') !!}" bg-color="bg-green-100" text-color="text-green-900"/>
    @endif
    @error('login')
    <x-notification message="{!! $message !!}" bg-color="bg-red-100" text-color="text-red-900"/>
    @enderror    
@endsection
