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
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
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

Route::post('/post-review/{slug}', [ReviewController::class, 'postReview'])->middleware('auth')->name('post-review');

//admin
Route::controller(GameController::class)->group(function () {
    Route::get('/game/manage/view', 'index')
        ->can('view', Game::class)->name('manage-games');
    Route::get('/game/manage/add', 'formAddGame')
        ->can('create', Game::class)->name('add-game');
    Route::post('/game/manage/add', 'store')
        ->can('create', Game::class);
    Route::get('/game/manage/update/{slug}', 'formUpdateGame')
        ->can('update', Game::class)->name('update-game');
    Route::put('/game/manage/update/{slug}', 'update')
        ->can('update', Game::class);
    Route::delete('/game/manage/delete/{slug}', 'destroy')
        ->can('delete', Game::class)->name('delete-game');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/manage/view', 'index')
        ->can('view', Category::class)->name('manage-categories');
    Route::get('/category/manage/add', 'formAddCategory')
        ->can('create', Category::class)->name('add-category');
    Route::post('/category/manage/add', 'store')
        ->can('create', Category::class);
    Route::get('/category/manage/update/{slug}', 'formUpdateCategory')
        ->can('update', Category::class)->name('update-category');
    Route::put('/category/manage/update/{slug}', 'update')
        ->can('update', Category::class);
    Route::delete('/category/manage/delete/{slug}', 'destroy')
        ->can('delete', Category::class)->name('delete-category');
});