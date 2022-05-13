<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;

class ManageGameController extends Controller
{
    public function index(){
        $games = Game::with('category')->orderBy('title')->paginate(6);
        // $array = [];

        // foreach($games as $game){
        //     $images = Storage::files('public/assets/'.$game->image);
        //     foreach($images as $image){
        //         basename($image);
        //     }
        // }

        return view('manage-games')->with('games', $games);
    }
}
