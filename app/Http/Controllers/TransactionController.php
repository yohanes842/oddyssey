<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function checkout(Request $request){
        $cartItems = CartItem::where('user_id', auth()->user()->id)->get();
        foreach($cartItems as $cartItem){
            $transaction = new Transaction();
            $transaction->game_id = $cartItem->game_id;
            $transaction->user_id = $cartItem->user_id;
            $transaction->updated_at = now();
            $transaction->save();
            $cartItem->delete();
        }
        
        return redirect(route("cart"))->with('message', $request->counter.' game(s) has successfully been checked out!<br><b>Your total Payment : '.$request->total.'</b>');
    }
}
