<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $cartItems = CartItem::with('game.category')
        ->join('games', 'cart_items.game_id', '=', 'games.id')
            ->where('user_id', auth()->user()->id)->get();

        $count = [
            'counter' => $cartItems->count(),
            'total' => $cartItems->sum('price'),
        ];
        

        return view('cart')
            ->with('cartItems', $cartItems)
            ->with('count', $count);
    }
    public function store($slug){
        $game = Game::where('slug', $slug)->first();

        $new = new CartItem;
        $new->user_id = auth()->user()->id;
        $new->game_id = $game->id;
        $new->save();

        return redirect(route("cart"));
    }
}
