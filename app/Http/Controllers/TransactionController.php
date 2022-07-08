<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CartItem;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function checkout(Request $request){
        $user = auth()->user();
        $total = auth()->user()->cartItems()->join('games', 'game_id', '=', 'games.id')->sum('price');

        if(!Hash::check($request->password, $user->password)){
            return redirect()
                ->back()
                ->withErrors([
                    'password' => "Password don't match"
                ]);
        }

        $cartItems = CartItem::where('user_id', $user->id)->get();
        foreach($cartItems as $cartItem){
            $transaction = new Transaction();
            $transaction->game_id = $cartItem->game_id;
            $transaction->user_id = $cartItem->user_id;
            $transaction->purchased_at = now();
            $transaction->save();
            $cartItem->delete();
        }

        return redirect()->route("cart")->with('checkout_success', $cartItems->count().' game(s) has successfully been checked out! Your total Payment : IDR '. number_format($total));
    }
}
