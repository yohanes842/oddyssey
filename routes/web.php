<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ManageCategoryController;
use App\Http\Controllers\ManageGameController;
use App\Http\Controllers\AddCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/dashboard');

Route::get('/login', [LoginController::class, 'create'])->middleware('guest');

Route::post('/login', [LoginController::class, 'authentication']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'create']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/search', [SearchController::class, 'index']); 

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/game', function () {
    return view('game');
});

Route::get('/admin/manage/games', [ManageGameController::class, 'index']);

Route::get('/admin/manage/categories', [ManageCategoryController::class, 'index']);

Route::get('/admin/manage/games/addgame', function () {
    return view('input-addgame');
});

Route::get('/admin/manage/games/addcategory', function () {
    return view('input-addcat');
});

Route::get('/admin/manage/games/addcategory', [AddCategoryController::class, 'index']);

Route::post('/admin/manage/games/addcategory', [AddCategoryController::class, 'store']);