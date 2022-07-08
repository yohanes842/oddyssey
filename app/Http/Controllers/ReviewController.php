<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function postReview(Request $request, $slug){
        $validation = Validator::make($request->all(),[
            'reviewType' => 'required',
            'reviewDescription' => 'required',
        ]);
        
        $game = Game::where('slug', $slug)->first();
        if($validation->fails()){
            return redirect()
                ->route("game-detail", $slug."#review-form")
                ->withErrors($validation)
                ->withInput();
        }else{
            $user = Review::where('game_id', $game->id)
                    ->where('user_id', auth()->user()->id)
                    ->get();
            if(count($user) > 0){
                return redirect()
                ->back()
                ->with("alreadyReviewed", "You already reviewed this game before!");
            }
        }
        $newReview = new Review();
        $newReview->game_id = $game->id;
        $newReview->user_id = auth()->user()->id;
        $newReview->review_type = $request->reviewType;
        $newReview->description = $request->reviewDescription;
        $newReview->save();

        return redirect()->back()->with("post_success", "Your review was successfully posted!");
    }
}
