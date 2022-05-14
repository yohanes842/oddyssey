<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ManageCategoryController;
use App\Http\Controllers\ManageGameController;
use App\Http\Controllers\AddCategoryController;
use App\Http\Controllers\AddGameController;
use App\Http\Controllers\GameController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/dashboard');

Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authentication']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/search', [SearchController::class, 'index']); 

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// Route::get('/game', function () {
//     return view('game');
// });

Route::get('/game/{game:slug}', [GameController::class, 'index'])->name("game-detail");

Route::get('/admin/manage-games', [ManageGameController::class, 'index'])->name('manage-games');;

Route::get('/admin/manage-categories', [ManageCategoryController::class, 'index'])->name('manage-categories');;

Route::get('/admin/manage-categories/add-category', [AddCategoryController::class, 'index'])->name('add-category');

Route::post('/admin/manage-categories/add-category', [AddCategoryController::class, 'store']);

Route::get('/admin/manage-games/add-game', [AddGameController::class, 'index'])->name('add-game');;

Route::post('/admin/manage-games/add-game', [AddGameController::class, 'store']);