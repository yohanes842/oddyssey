<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;

class DeleteGameController extends Controller
{
    public function delete(Request $request){
        //step 1: cari data
        //step 2: delete
        $deleteGame = Game::where('id', $request->id)->first();
        // $deleteReview = Review::where ('game_id', $request->id)->first();
        $title = $deleteGame->title;

        $deleteGame->delete();

        return redirect()
            ->back()
            ->with('delete_success', 'Game "'.$title.'" has successfully been deleted!');
    }
}
