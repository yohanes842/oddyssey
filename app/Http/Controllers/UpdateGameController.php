<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Game;

class UpdateGameController extends Controller
{
    public function index($slug){
        $game = Game::with('category')->where('slug', $slug)->first();
        return view('update-game')->with('game',$game);
    }

    public function update(Request $request){
        $validation = Validator::make($request->all(),
        [
            'title' => 'required',
            'category' => 'required|exists:categories,category_name',
            'price' =>'required|numeric',
            'thumbnail'=> 'required|image|mimes:jpg,jpeg,svg,png',
            'slider' => 'required|min:3',
            'slider.*' => 'image|mimes:jpg,jpeg,svg,png',
            'description' => 'required|min:10'
        ]);
        // return dd($validation);
        if ($request->title != $request->oldTitle){
            $validationTitle = Validator::make($request->all(), [
                'title'=>'required|unique:games'
            ]);
        }

        if(isset($validationTitle)){
            if  ($validation->fails() ||$validationTitle->fails() ){
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validation)
                    ->withErrors($validationTitle);
            }
        }
        else if ($validation->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }
        
       
       
        $updateGame = Game::where('id', $request->id)->first();
        $cat = Category::where('category_name', $request->category)->first();
        $updateGame->title = $request->title;
        $updateGame->slug = Str::of($request->title)->slug('-');
        $updateGame->price = $request->price;
        $updateGame->category_id = $cat->id;
        $updateGame->description = $request->description;
        $updateGame->image_path = $request->title.'-img/';
        $updateGame->updated_at = now();

        $updateGame->save();

        return redirect(route('manage-games'))->with('update_success', 'Game "'.$request->oldTitle.'" has successfully been updated!');;
    }

}
