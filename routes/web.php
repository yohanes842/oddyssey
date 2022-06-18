<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Models\Category;
use App\Models\Game;

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

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'viewLogin')->middleware('guest')->name('login');
    Route::post('/login', 'authentication')->middleware('guest');
    Route::get('/register', 'viewRegister')->middleware('guest')->name('register');
    Route::post('/register', 'store')->middleware('guest');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(CartController::class)->middleware('auth')->name('cart')->group(function () {
    Route::get('/cart', 'index');
    Route::post('/cart', 'store');
    Route::delete('/cart', 'destroy');
});

Route::post('/checkout', [TransactionController::class, 'checkout'])->middleware('auth')->name('checkout');

Route::controller(SearchController::class)->group(function (){
    Route::get('/search', 'search')->name('search');
    Route::get('live-search', 'liveSearch');
});

Route::controller(GameController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/game/{slug}', 'gameDetails')->name("game-detail");
});

Route::controller(GameController::class)->group(function () {
    Route::get('/admin/manage-games', 'index')->can('view', Game::class)->name('manage-games');
    Route::get('/admin/manage-games/add', 'formAddGame')->can('create', Game::class)->name('add-game');
    Route::post('/admin/manage-games/add', 'store')->can('create', Game::class);
    Route::get('/admin/manage-games/update/{slug}', 'formUpdateGame')->can('update', Game::class)->name('update-game');
    Route::put('/admin/manage-games/update/{slug}', 'update')->can('update', Game::class);
    Route::delete('/admin/manage-games/delete/{slug}', 'destroy')->can('delete', Game::class)->name('delete-game');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/admin/manage-categories', 'index')->can('view', Category::class)->name('manage-categories');
    Route::get('/admin/manage-categories/add', 'formAddCategory')->can('create', Category::class)->name('add-category');
    Route::post('/admin/manage-categories/add', 'store')->can('create', Category::class);
    Route::get('/admin/manage-categories/update/{slug}', 'formUpdateCategory')->can('update', Category::class)->name('update-category');
    Route::put('/admin/manage-categories/update/{slug}', 'update')->can('update', Category::class);
    Route::delete('/admin/manage-categories/delete/{slug}', 'destroy')->can('delete', Category::class)->name('delete-category');
});

Route::post('/post-review/{slug}', [ReviewController::class, 'postReview'])->middleware('auth')->name('post-review');