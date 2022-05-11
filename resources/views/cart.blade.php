@extends('layouts.main')

@section('title', 'Oddyssey | Your Cart')

@section('content')
    <h2>Your Cart</h2>
    <div class="cart-box p-3 m-2 bg-white rounded-md">

        <div class="items-container flex flex-col gap-2">
            @for($i = 0 ; $i < 3 ; $i++)
                <div class="items-box mb-3 flex justify-between items-center rounded-md">
                    <div class="left-content flex gap-5">
                        <img class="h-24" src="assets/apex.jpg" alt="">
                        <div class="items-description flex flex-col justify-center">
                            <h2 class="font-medium">Elden Ring</h1>
                            <h3 class="text-gray-500 text-xs">Action RPG</h3>
                        </div>
                    </div>
                    <div class="right-content flex flex-col items-center">
                        <h3 class="font-medium">IDR 599,000</h3>
                        <button class="w-24 p-2 mt-1 bg-[#ef4343] rounded-md text-white text-sm font-center font-medium hover:bg-[#ff5353]">REMOVE</button>
                    </div>
                </div>
            @endfor
        </div>

        <div class="total-box p-2 flex justify-between items-center border-t-2 border-gray-500">
            <div class="left-total">
                <h1 class="font-medium">Total</h1>
                <h3>3 game(s)</h3>
            </div>
            <div class="left-total">
                <h2 class="font-medium">IDR 599,000</h2>
            </div>
        </div>

    </div>
    
    <div class="button-checkout w-full flex justify-end">
        <button class="w-32 p-1 m-2 py-2 bg-[#374151] rounded-md text-white font-center font-medium hover:bg-[#475161] hover:scale-105">CHECKOUT</button>
    </div>
@endsection