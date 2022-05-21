<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    //Manage category by Admin
    public function index(){
        $categories = Category::orderBy('category_name')->paginate(6);
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

        return redirect(route('manage-categories'))->with('add_success', 'Category <b>"'.$request->category_name.'"</b> has successfully been added!');
    }

    public function formUpdateCategory($slug){
        $category = Category::where('slug', $slug)->first();
        return view('update-cat')->with('category',$category);
    }

    public function update(Request $request, $slug){
        $validation = Validator::make($request->all(),
        [
            'category_name' => 'required'
        ]);
        
        if ($request->category_name != $request->oldName){
            $validationName = Validator::make($request->all(), [
                'category_name'=>'required|unique:categories'
            ]);
        }

        if(isset($validationName)){
            if  ($validation->fails() ||$validationName->fails() ){
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validation)
                    ->withErrors($validationName);
            }
        }
        else if ($validation->fails()){
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

        return redirect()->route('manage-categories')->with('update_success', 'Category <b>"'.$request->oldName.'"</b> has successfully been updated!');
    }

    public function destroy($slug){
        $deleteCategory = Category::where('slug', $slug)->first();
        $category_name = $deleteCategory->category_name;
        $deleteCategory->delete();

        return redirect()
            ->route('manage-categories')
            ->with('delete_success', 'Category <b>"'.$category_name.'"</b> has successfully been deleted!');
    }
}
