<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $games = Game::where('title', 'like', '%'.$request->search.'%')->get();
        // return dd($games);
        return view('search')->with('games', $games);
    }
}
