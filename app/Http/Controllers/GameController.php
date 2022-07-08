<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Game;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Support\Facades\File;

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
            ->limit(3)
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

        $image_paths = File::files(public_path("assets/".$game->image_path));
        $image_fileName = [];
        $image_fileName = array_map(fn($image) => $image->getFilename(), $image_paths);

        return view('game')
            ->with([
                'vargame' => $game,
                'morelikethis' => $morelikethis,
                'reviews' => $reviews,
                'counter' => $counter,
                'image_paths' => $image_fileName,
                'total_images' => count($image_fileName),
            ]);
    }

    public function dashboard(){
        //Getting 5 games with highest count of positive reviews
        $featured = Review::selectRaw('count(id) as count_row, game_id')
                    ->where ('review_type', '=', 'recommended')
                    ->groupBy('game_id')
                    ->orderBy('count_row', 'desc')
                    ->limit(5)
                    ->get();
        
        $hot = '';
        $i = 7;

        //Getting transactions from pasts week until get a least one transaction and maximum 8 transactions which most purchased in the past week
        //First check from one past week and do increment until get the last transaction data
        do{
            $hot = Transaction::selectRaw('count(id) as count_row, game_id')
                ->whereRaw('DATEDIFF(now(),purchased_at)<='.$i)
                ->groupBy('game_id')
                ->orderBy('count_row', 'desc')
                ->limit(8)
                ->get();
            $i = $i+7;
        } while($hot->isEmpty());
        

        return view('dashboard')
            ->with ([
                'featured' => $featured,
                'hot' => $hot,
            ]);
    }

    //manage-game by admin
    public function index(){
        $games = Game::with('category')->orderBy('title')->paginate(10);
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
        ], [
            'slider.min' => 'The slider must be at least :min images',
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

        $path = 'public/assets/'.$newGame->image_path;
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

        return redirect()->route('manage-games')->with('add_success', 'New game added successfully!');
    }

    public function formUpdateGame($slug){
        $game = Game::with('category')->where('slug', $slug)->first();

        $categories = Category::orderBy('category_name')->get();

        return view('update-game')
            ->with([
                'game' => $game,
                'categories' =>  $categories,
            ]);
    }

    public function update(Request $request, $slug){
        $validation = Validator::make($request->all(),
        [
            'title' => 'required',
            'category' => 'required|exists:categories,category_name',
            'price' =>'required|numeric',
            'thumbnail'=> 'required|image|mimes:jpg,jpeg,svg,png',
            'slider' => 'required|min:3',
            'slider.*' => 'image|mimes:jpg,jpeg,svg,png',
            'description' => 'required|min:10'
        ], [
            'slider.min' => 'The slider must be at least :min images',
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
        
       
       
        $updateGame = Game::where('slug', $slug)->first();
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
        
        Storage::deleteDirectory('public/assets/'.$request->oldTitle.'-img/');

        $path = 'public/assets/'.$updateGame->image_path;
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

        return redirect()->route('manage-games')->with('update_success', 'Game updated successfully!');
    }

    public function destroy($slug){
        $deleteGame = Game::where('slug', $slug)->first();

        if(!$deleteGame){
            abort(404);
        }

        $title = $deleteGame->title;

        //Delete game assets directory
        $assetPath = $deleteGame->image_path;
        Storage::deleteDirectory('public/assets/'.$assetPath);

        //Delete game from database
        $deleteGame->delete();

        return redirect()
            ->route('manage-games')
            ->with('delete_success', 'Game deleted successfully!');
    }
}
