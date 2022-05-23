<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReviewController;
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
    Route::post('/login', 'authentication');
    Route::get('/register', 'viewRegister')->name('register');
    Route::post('/register', 'store');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(CartController::class)->middleware('auth')->name('cart')->group(function () {
    Route::get('/cart', 'index');
    Route::post('/cart', 'store');
    Route::delete('/cart', 'destroy');
});

Route::post('/checkout', [TransactionController::class, 'checkout'])->middleware('auth')->name('checkout');

Route::controller(GameController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/search', 'search')->name('search'); 
    Route::get('/game/{slug}', 'gameDetails')->name("game-detail");
});

Route::controller(GameController::class)->middleware('admin')->group(function () {
    Route::get('/admin/manage-games', 'index')->name('manage-games');
    Route::get('/admin/manage-games/add', 'formAddGame')->name('add-game');
    Route::post('/admin/manage-games/add', 'store');
    Route::get('/admin/manage-games/update/{slug}', 'formUpdateGame')->name('update-game');
    Route::put('/admin/manage-games/update/{slug}', 'update');
    Route::delete('/admin/manage-games/delete/{slug}', 'destroy')->name('delete-game');
});

Route::controller(CategoryController::class)->middleware('admin')->group(function () {
    Route::get('/admin/manage-categories', 'index')->name('manage-categories');
    Route::get('/admin/manage-categories/add', 'formAddCategory')->name('add-category');
    Route::post('/admin/manage-categories/add', 'store');
    Route::get('/admin/manage-categories/update/{slug}', 'formUpdateCategory')->name('update-category');
    Route::put('/admin/manage-categories/update/{slug}', 'update');
    Route::delete('/admin/manage-categories/delete/{slug}', 'destroy')->name('delete-category');
});

Route::post('/post-review/{slug}', [ReviewController::class, 'postReview'])->middleware('auth')->name('post-review');