<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Game;

class AddGameController extends Controller
{
    public function index(){
        return view('input-addgame');
    }

    public function store(Request $request){
        $validation = Validator::make($request->all(),
        [
            'title' => 'required|unique:games',
            'category' => 'required|exists:categories,category_name',
            'price' =>'required|numeric',
            'thumbnail'=> 'required|image|mimes:jpg,jpeg,svg,png',
            'slider' => 'required|min:3',
            'slider.*' => 'image|mimes:jpg,jpeg,svg,png',
            'description' => 'required|min:10'
        ]);

        if ($validation->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        // Category::create([
        //     'name'=> $request->name
        // ]);
        
        $cat = Category::where('category_name', $request->category)->first();
        $newGame= new Game();
        $newGame->title = $request->title;
        $newGame->slug = Str::of($request->title)->slug('-');
        $newGame->price = $request->price;
        $newGame->category_id = $cat->id;
        $newGame->description = $request->description;
        $newGame->image_path = $request->title.'-img/';
        $newGame->created_at = now();
        $newGame->updated_at = now();
        $newGame->save();

        return redirect()->back();
    }
}
