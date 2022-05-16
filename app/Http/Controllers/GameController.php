<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Game;
use App\Models\Review;

class GameController extends Controller
{
    //view
    public function gameDetails($slug){
        $game = Game::where('slug', $slug)->first();

        if(!$game){
            abort(404);
        }

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

        $image_paths = Storage::files('assets/'.$game->image_path);

        return view('game')
            ->with('vargame', $game)
            ->with('morelikethis', $morelikethis)
            ->with('reviews', $reviews)
            ->with('counter', $counter)
            ->with('image_paths', $image_paths)
            ->with('total_images', count($image_paths));
    }

    public function search(Request $request){
        $games = Game::where('title', 'like', '%'.$request->search.'%')->paginate(15);
        return view('search')->with('games', $games);
    }

    public function dashboard(){
        return view('dashboard');
    }
    



    //manage-game by admin
    public function index(){
        $games = Game::with('category')->orderBy('title')->paginate(6);
        return view('manage-games')->with('games', $games);
    }

    public function formAddGame(){
        $categories = Category::all();
        return view('add-game')->with("categories", $categories);
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
        
        $cat = Category::where('category_name', $request->category)->first();
        $newGame= new Game();
        $newGame->title = $request->title;
        $newGame->slug = Str::of($request->title)->slug('-');
        $newGame->price = $request->price;
        $newGame->category_id = $cat->id;
        $newGame->description = $request->description;
        $newGame->image_path = $request->title.'-img/';
        $newGame->thumbnail_filename = 'thumb.'.$request->file('thumbnail')->extension();
        $newGame->created_at = now();
        $newGame->updated_at = now();
        $newGame->save();

        $path = 'assets/'.$newGame->image_path;
        $file = $request->file('thumbnail');
        $thumb_filename = 'thumb.'.$file->extension();

        Storage::putFileAs(
            $path, $file, $thumb_filename
        );

        $counter = 0;
        foreach($request->file('slider') as $slider){
            $counter++;
            $slider->storeAs($path, 'slide'.$counter.'.'.$slider->extension());
        }

        return redirect()->route('manage-games')->with('add_success', 'Game <b>"'.$request->title.'"</b> has successfully been added!');
    }

    public function formUpdateGame($slug){
        $game = Game::with('category')->where('slug', $slug)->first();

        if(!$game){
            abort(404);
        }

        $categories = Category::all();

        return view('update-game')->with('game',$game)->with("categories", $categories);
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
        $updateGame->thumbnail_filename = 'thumb.'.$request->file('thumbnail')->extension();
        $updateGame->updated_at = now();
        $updateGame->save();
        
        Storage::deleteDirectory($request->oldTitle."-img/");

        $path = 'assets/'.$updateGame->image_path;
        $file = $request->file('thumbnail');
        $thumb_filename = 'thumb.'.$file->extension();

        Storage::putFileAs(
            $path, $file, $thumb_filename
        );

        $counter = 0;
        foreach($request->file('slider') as $slider){
            $counter++;
            $slider->storeAs($path, 'slide'.$counter.'.'.$slider->extension());
        }


        return redirect()->route('manage-games')->with('update_success', 'Game <b>"'.$request->oldTitle.'"</b> has successfully been updated!');;
    }

    public function delete(Request $request){
        $deleteGame = Game::where('id', $request->id)->first();

        if(!$deleteGame){
            abort(404);
        }

        $title = $deleteGame->title;
        $deleteGame->delete();

        return redirect()
            ->route('manage-games')
            ->with('delete_success', 'Game <b>"'.$title.'"</b> has successfully been deleted!');
    }
}
