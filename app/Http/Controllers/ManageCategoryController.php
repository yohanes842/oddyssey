<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ManageCategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name')->paginate(6);
        return view('manage-categories')->with('categories', $categories);
    }
}
