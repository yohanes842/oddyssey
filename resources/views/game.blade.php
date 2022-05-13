@extends('layouts.main') @section('title', 'Oddyssey | Nama Game')
@section('content')
<div class="flex flex-col items-center gap-5 px-[15%]">
    <div class="content-1 flex justify-between">
        <div
            class="game-description w-[37%] flex flex-col gap-2 bg-white rounded-b-md shadow"
        >
            <div class="game-description-image">
                <img
                    class="w-full"
                    src="{{ asset('assets/'.$vargame->image_path.'thumb.jpg') }}"
                    alt=""
                />
            </div>
            <div class="game-description-text p-2 pb-4 flex flex-col gap-2">
                <h1 class="font-medium">{{ $vargame->title }}</h1>
                <p class="text-gray-500 text-xs w-full">
                    {{ $vargame->description }}
                </p>
                <div class="game-description-price flex flex-col gap-2">
                    <p class="text-lg font-semibold">{{ ($vargame->price) ?  'IDR '.number_format($vargame->price) : 'FREE' }}</p>
                    <button
                        class="p-2 w-[30%] rounded-lg text-sm font-medium text-white bg-[#374151] hover:bg-[#475161]"
                    >
                        ADD TO CART
                    </button>
                </div>
            </div>
        </div>
        <div
            class="image-carousel w-[30vw] rounded-sm flex items-center bg-black text-[#374151] overflow-hidden relative"
        >
            <button
                class="z-10 m-3 bg-white h-fit w-fit rounded-sm drop-shadow-xl flex items-center absolute left-0 ease-in-out duration-600 ring-[#979cb7] hover:ring-2 hover:scale-110 hover:bg-gray-100"
                id="arrowLeft"
            >
                <span class="material-symbols-rounded"> arrow_back </span>
            </button>
            <div
                class="carousel-image-container flex absolute inset-0"
                id="image-carousel"
            >
                <img
                    class="carousel-image-card w-[30vw] h-full"
                    src="{{ asset('assets/'.$vargame->image_path.'slide1.jpg') }}"
                    alt=""
                />
                <img
                    class="carousel-image-card w-[30vw] h-full"
                    src="{{ asset('assets/'.$vargame->image_path.'slide2.jpg') }}"
                    alt=""
                />
                <img
                    class="carousel-image-card w-[30vw] h-full"
                    src="{{ asset('assets/'.$vargame->image_path.'slide3.jpg') }}"
                    alt=""
                />
            </div>

            <button
                class="z-10 m-3 bg-white h-fit w-fit rounded-sm drop-shadow-xl flex items-center absolute right-0 ease-in-out duration-600 ring-[#979cb7] hover:ring-2 hover:scale-110 hover:bg-gray-100"
                id="arrowRight"
            >
                <span class="material-symbols-rounded"> arrow_forward </span>
            </button>
        </div>
    </div>
    <div
        class="content-2 w-full p-5 bg-white rounded-md shadow flex justify-between"
    >
        <div class="game-genre">
            <h3 class="text-xs text-gray-500">Genre</h3>
            <h2 class="font-semibold">{{ $vargame->category->category_name }}</h2>
        </div>
        <div class="game-releasedate">
            <h3 class="text-xs text-gray-500">Release Date</h3>
            <h2 class="font-semibold">{{ $vargame->created_at->format('d M, Y') }}</h2>
        </div>
        <div class="game-review-summary">
            <h3 class="text-xs text-gray-500">All Reviews</h3>
            <h2 class="text-sm">1<span> Recommended</span></h2>
            <h2 class="text-sm">1<span> Not Recommended</span></h2>
        </div>
    </div>
    <div class="content-morelike w-full">
        <h3 class="font-medium text-gray-500">More Like This</h3>
        <div class="morelike-container flex justify-between gap-3">
            @foreach($morelikethis as $game)
            <div class="morelike-box">
                <div class="morelike-image">
                    <img
                        class="w-full"
                        src="{{ asset('assets/'.$game->image_path.'thumb.jpg') }}"
                        alt=""
                    />
                </div>
                <div class="morelike-price w-full font-medium text-right">
                    {{  ($vargame->price) ?  'IDR '.number_format($vargame->price) : 'FREE'  }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div
        class="content-postreview w-full p-5 bg-white rounded-md flex flex-col gap-3"
    >
        <h2 class="font-semibold">Leave a Review!</h2>
        <form action="" method="post">
            <div class="review-form-container flex flex-col gap-5">
                <div class="radio-button-recommend">
                    <input
                        type="radio"
                        name="review-recommend"
                        id="recommended"
                    />
                    Recommended
                    <input
                        type="radio"
                        name="review-recommend"
                        id="not-recommended"
                    />
                    Not Recommended
                </div>
                <textarea
                    class="w-full p-3 rounded-md border-gray-300 border-2 ring-[#c7ccf7] hover:ring-1 focus:outline-none focus:ring-2"
                    name="review-commend"
                    id=""
                    cols="30"
                    rows="7"
                ></textarea>
                <input
                    class="w-fit p-2 px-5 bg-[#374151] text-base font-medium h-[2.5rem] text-white rounded-lg cursor-pointer hover:scale-105 hover:bg-[#475161]"
                    type="submit"
                    value="POST"
                />
            </div>
        </form>
    </div>
    <div class="content-reviews w-full flex gap-[2%] flex-wrap">
        @foreach($reviews as $review)
            <div
                class="review-box w-[32%] p-3 mb-5 bg-white rounded-md shadow flex flex-col gap-3"
            >
                <div class="review-user font-semibold">{{ $review->user->name }}</div>
                @if($review->review_type == 'recommended')
                    <div class="review-type flex items-center gap-2">
                        <span
                            class="material-symbols-rounded p-1 text-green-400 rounded-[50%] bg-green-100"
                        >
                            thumb_up
                        </span>
                        <span> Recommended</span>
                    </div>
                @else
                    <div class="review-type flex items-center gap-2">
                        <span
                            class="material-symbols-rounded p-1 text-red-400 rounded-[50%] bg-red-100"
                        >
                            thumb_down
                        </span>
                        <span> Recommended</span>
                    </div>
                @endif
                <div class="review-post">
                    {{ $review->description }}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
