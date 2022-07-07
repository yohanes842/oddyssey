<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //Manage category by Admin
    public function index(){
        $categories = Category::orderBy('category_name')->paginate(10);
        return view('manage-categories')->with('categories', $categories);
    }

    public function formAddCategory(){
        return view('add-cat');
    }

    public function store(Request $request){
        $validation = Validator::make($request->all(),
        [
            'category_name' => 'required|unique:categories'
        ]);

        if ($validation->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        $newCategory= new Category();
        $newCategory->category_name = $request->category_name;
        $newCategory->slug = Str::of($request->category_name)->slug('-');
        $newCategory->created_at = now();
        $newCategory->updated_at = now();
        $newCategory->save();

        return redirect(route('manage-categories'))->with('add_success', 'Successfully added new category!');
    }

    public function formUpdateCategory($slug){
        $category = Category::where('slug', $slug)->first();
        return view('update-cat')->with('category',$category);
    }

    public function update(Request $request, $slug){
        if ($request->category_name === $request->oldName){ 
            return redirect()->back()
                ->withErrors(['category_name' => 'New category name must be different.'])
                ->withInput();  
        }
         
        $validation = Validator::make($request->all(), [
            'category_name'=>'required|unique:categories'
        ]);
        if  ($validation->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }
               
        $updateCat = Category::where('slug', $slug)->first();
        
        $updateCat->slug = Str::of($request->category_name)->slug('-');
        $updateCat->category_name = $request->category_name;
        $updateCat->updated_at = now();

        $updateCat->save();

        return redirect()->route('manage-categories')->with('update_success', 'Successfully updated category!');
    }

    public function destroy($slug){
        $deleteCategory = Category::where('slug', $slug)->first();

        if(!$deleteCategory){
            abort(404);
        }

        //Delete game assets directory which has category same as deleted category
        $deleteGames = Game::where('category_id', $deleteCategory->id)->get();
        foreach($deleteGames as $deleteGame){
            $assetPath = $deleteGame->image_path;
            Storage::deleteDirectory('public/assets/'.$assetPath);
        }

        //Delete category from database
        $deleteCategory->delete();

        return redirect()
            ->route('manage-categories')
            ->with('delete_success', 'Successfully deleted category!');
    }
}
