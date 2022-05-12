<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;

class AddCategoryController extends Controller
{
    public function index(){
        return view('input-addcat');
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

        // Category::create([
        //     'name'=> $request->name
        // ]);

        $newCategory= new Category();
        $newCategory->category_name = $request->category_name;
        $newCategory->created_at = now();
        $newCategory->updated_at = now();
        $newCategory->save();

        return redirect()
            ->back()
            ->with('add_success', 'Category "'.$request->category_name.'" has successfully been added!');
       
    }
}
