<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ManageCategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('categoryName')->get();
        return view('manage-categories')->with('categories', $categories);
    }
}
