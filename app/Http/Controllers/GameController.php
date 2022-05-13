<?php
namespace App\Http\Controllers;
// namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Review;

class GameController extends Controller
{
    public function index($slug){


        $game = Game::with('category')->where('slug', $slug)
            ->first();

        $morelikethis = Game::where('category_id', $game->category_id)->get();
        $reviews = Review::with('user')->where('game_id', $game->id)->get();
        // return dd($reviews);

        return view('game')
            ->with('vargame', $game)
            ->with('morelikethis', $morelikethis)
            ->with('reviews', $reviews);
    }

}
