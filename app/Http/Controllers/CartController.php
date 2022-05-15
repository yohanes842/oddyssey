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
            'total' => 'IDR '.number_format($cartItems->sum('price')),
        ];
        

        return view('cart')
            ->with('cartItems', $cartItems)
            ->with('count', $count);
    }
    public function store(Request $request){
        $game = Game::where('id', $request->id)->first();
        $cartItem = CartItem::where('user_id', auth()->user()->id)
            ->where('game_id', $game->id)
            ->first();
        
        if($cartItem){
            return redirect(route("cart"))->with('message', 'You already had <b>'.$game->title.'</b> in your cart!');
        }

        $new = new CartItem;
        $new->user_id = auth()->user()->id;
        $new->game_id = $game->id;
        $new->save();

        return redirect(route("cart"))->with('message', '<b>'.$game->title.'</b> has successfully been added to your cart!');
    }
    public function remove(Request $request){
        $cartItem = CartItem::with('game')->where('game_id', $request->id)->first();

        $cartItem->delete();
        return redirect(route("cart"))->with('message', '<b>'.$cartItem->game->title.'</b> has successfully been deleted from your cart!');
    }
}
