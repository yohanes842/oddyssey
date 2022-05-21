@extends('layouts.main')

@section('title', 'Oddyssey | Your Cart')

@section('content')
    @if($cartItems->isEmpty())
        <h1 class="m-64 text-center text-2xl font-semibold">
            Your Cart is Empty!
        </h1>
    @else
        <h2>Your Cart</h2>
        <div class="cart-box p-3 m-2 bg-white rounded-md">
            <div class="items-container flex flex-col gap-2 ">
                @foreach($cartItems as $cartItem)
                    <div class="items-box mb-3 flex justify-between items-center rounded-md">
                        <div class="left-content flex gap-5">
                            <a class="hover:brightness-90" href="{{ route('game-detail', $cartItem->slug) }}">
                                <img 
                                    class="h-20 w-40" 
                                    src="{{ asset('storage/assets/'.$cartItem->image_path.$cartItem->thumbnail_filename) }}" 
                                    alt=""
                                >
                            </a>
                            <div class="items-description flex flex-col justify-center">
                                <h2 class="font-medium">{{ $cartItem->game->title }}</h1>
                                <h3 class="text-gray-500 text-xs">{{ $cartItem->game->category->category_name }}</h3>
                            </div>
                        </div>
                        <div class="right-content flex flex-col items-center">
                            <h3 class="font-medium">{{ $cartItem->game->price_with_notation }}</h3>
                            <form action="{{ route('cart') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $cartItem->id }}">
                                <button type="submit" 
                                    class="w-24 p-2 mt-1 bg-[#ef4343] rounded-md text-white text-sm font-center font-medium hover:bg-[#ff5353]"
                                    >
                                    REMOVE
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    {{-- <div class="ask-container z-20 fixed left-0 top-0 w-screen h-screen bg-black/20">
                        <div class="ask-box w-fit p-10 mx-auto mt-64 bg-[#c7ccf7] text-gray-900 shadow-lg rounded-lg">
                            <p>Do you want to remove '{{ $cartItem->game->title }}'' from your cart?</p>
                            <div class="flex mt-5 justify-center gap-10">
                                <button class="w-fit px-3 py-1 bg-green-600 text-white shadow rounded-lg scale-110 hover:brightness-90">Yes</button>
                                <button class="w-fit px-3 py-1 bg-red-600 text-white shadow rounded-lg scale-110 hover:brightness-90">No</button>
                            </div>
                            
                        </div>
                    </div> --}}
                @endforeach
            </div>

            <div class="total-box p-2 flex justify-between items-center border-t-2 border-gray-500">
                <div class="left-total">
                    <h1 class="font-medium">Total</h1>
                    <h3>{{ $count['counter'] }} game(s)</h3>
                </div>
                <div class="left-total">
                    <h2 class="font-medium">{{ $count['total'] }}</h2>
                </div>
            </div>

        </div>
        
        <div class="button-checkout w-full flex justify-end">
            <button 
                class="w-32 p-1 m-2 py-2 bg-[#374151] rounded-md text-white font-center font-medium hover:bg-[#475161] hover:scale-105"
                id="checkout-button"
            >
                CHECKOUT
            </button>
        </div>
    @endif


    <div class="checkout-form z-20 fixed left-0 top-0 w-screen h-screen bg-black/20 @if(!$errors->any()) hidden @endif" id="checkout">
        <div class="checkout-form-box w-[50%] p-10 mx-auto mt-64 bg-[#c7ccf7] text-gray-900 shadow-lg rounded-lg">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="counter" value="{{ $count['counter'] }}">
                <input type="hidden" name="total" value="{{ $count['total'] }}">
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">

                <h2>Hi, <b>{{ auth()->user()->name }}</b>! Please type your password to continue your transaction!</h2>
                <h2 class="text-center font-semibold">Your total transaction : {{ $count['total'] }}</h2>
                <input
                    class="w-[50%] h-[2rem] p-2 mx-[25%] my-5 shadow-sm border-2 border-gray rounded-md ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    type="password"
                    name="password"
                    id=""
                    placeholder="Password"
                    required
                />
                @error('password')
                    <p class="text-center text-sm text-red-500">{{ $message }}</p>
                @enderror
                <div class="flex mt-5 justify-center gap-10">
                    <button 
                        type="submit" 
                        class="w-fit px-3 py-1 bg-green-600 text-white shadow rounded-lg scale-110 hover:brightness-90"
                    >
                        Checkout
                    </button>
                    <button 
                        class="w-fit px-3 py-1 bg-red-600 text-white shadow rounded-lg scale-110 hover:brightness-90"
                        id="checkout-exit-button"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('notification')
    @if(session()->has('message'))
    <x-notification message="{!! session('message') !!}" bg-color="bg-[#c7ccf7]" text-color="text-gray-900"/>
    @elseif(session()->has('checkout_success'))
    <x-notification message="{!! session('checkout_success') !!}" bg-color="bg-[#c7ccf7]" text-color="text-gray-900"/>
    @endif  
@endsection