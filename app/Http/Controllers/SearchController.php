<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $games = Game::where('title', 'like', '%'.$request->search.'%')->orderBy('title')->paginate(15);
        return view('search')->with('games', $games);
    }

    public function liveSearch(Request $request){
        if($request->ajax()){
            $games = Game::where('title', 'like', '%'.$request->keyword.'%')
                ->orderBy('title')->get();
            return $games;
        }
    }
}
