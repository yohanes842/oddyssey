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

        if($validation->fails()){
            return redirect()
                ->back()
                ->withErrors($validation);
        }

        $game = Game::where('slug', $slug)->first();
        $newReview = new Review();
        $newReview->game_id = $game->id;
        $newReview->user_id = auth()->user()->id;
        $newReview->review_type = $request->reviewType;
        $newReview->description = $request->reviewDescription;
        $newReview->save();

        return redirect()->back()->with("post_success", "Your review is successfully posted!");
    }
}
