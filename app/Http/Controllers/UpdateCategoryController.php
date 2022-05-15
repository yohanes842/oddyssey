<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Game;

class UpdatecategoryController extends Controller
{
    public function index($slug){
        $category = Category::where('slug', $slug)->first();
        return view('update-cat')->with('category',$category);
    }

    public function update(Request $request){
        $validation = Validator::make($request->all(),
        [
            'category_name' => 'required'
        ]);
        // return dd($validation);
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
        
       
       
        $updateCat = Category::where('id', $request->id)->first();
        
        $updateCat->slug = Str::of($request->category_name)->slug('-');
        $updateCat->category_name = $request->category_name;
        $updateCat->updated_at = now();

        $updateCat->save();

        return redirect(route('manage-categories'))->with('update_success', 'Category "'.$request->oldName.'" has successfully been updated!');
    }

}

