<?php
namespace App\Http\Controllers;
// namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index($slug){
        $game = Game::where('slug', $slug)->first();
        return dd($slug);
        $morelikethis = Game::where('category_id', $game->category_id)
            ->where('id', '!=', $game->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        $reviews = Review::with('user')
            ->where('game_id', $game->id)
            ->get();

        $recommended_count = Review::where('game_id', $game->id)
            ->where('review_type', 'recommended')
            ->count();

        $counter = [
            'recommended' => $recommended_count,
            'not' => $reviews->count()-$recommended_count,
        ];
        // return dd($counter);
        return view('game')
            ->with('vargame', $game)
            ->with('morelikethis', $morelikethis)
            ->with('reviews', $reviews)
            ->with('counter', $counter);
    }

}
