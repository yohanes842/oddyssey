<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;

class DeleteCategoryController extends Controller
{
    public function delete(Request $request){
        //step 1: cari data
        //step 2: delete
        $deleteCategory = Category::where('id', $request->id)->first();
        // $deleteReview = Review::where ('game_id', $request->id)->first();
        $category_name = $deleteCategory->category_name;

        $deleteCategory->delete();

        return redirect()
            ->back()
            ->with('delete_success', 'Category "'.$category_name.'" has successfully been deleted!');
            // ->withoutQueryString();
    }
}
