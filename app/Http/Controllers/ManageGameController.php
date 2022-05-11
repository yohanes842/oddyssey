<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class ManageGameController extends Controller
{
    public function index(){
        $games = Game::with('category')->orderBy('title')->paginate(6);
        return view('manage-games')->with('games', $games);
    }
}
