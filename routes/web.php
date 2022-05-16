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

Route::get('/login', [UserController::class, 'viewLogin'])->middleware('guest')->name('login');

Route::post('/login', [UserController::class, 'authentication']);

Route::get('/register', [UserController::class, 'viewRegister'])->name('register');

Route::post('/register', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::post('/add-to-cart', [CartController::class, 'store'])->middleware('auth')->name('add-to-cart');

Route::delete('/remove-from-cart', [CartController::class, 'remove'])->middleware('auth')->name('remove-from-cart');


Route::post('/checkout', [TransactionController::class, 'checkout'])->middleware('auth')->name('checkout');


Route::post('/post-review/{slug}', [ReviewController::class, 'postReview'])->name('post-review');


Route::get('/dashboard', [GameController::class, 'dashboard'])->name('dashboard');

Route::get('/search', [GameController::class, 'search']); 

Route::get('/game/{slug}', [GameController::class, 'gameDetails'])->name("game-detail");

Route::get('/admin/manage-games', [GameController::class, 'index'])->name('manage-games');

Route::get('/admin/manage-categories', [CategoryController::class, 'index'])->name('manage-categories');

Route::get('/admin/manage-games/add-game', [GameController::class, 'formAddGame'])->name('add-game');

Route::post('/admin/manage-games/add-game', [GameController::class, 'store']);

Route::get('/admin/manage-games/update-game/{slug}', [GameController::class, 'formUpdateGame'])->name('update-game');

Route::put('/admin/manage-games/update-game/{slug}', [GameController::class, 'update']);

Route::delete('/admin/manage-games/delete-game', [GameController::class, 'delete'])->name('delete-game');


Route::get('/admin/manage-categories/add-category', [CategoryController::class, 'formAddCategory'])->name('add-category');

Route::post('/admin/manage-categories/add-category', [CategoryController::class, 'store']);

Route::get('/admin/manage-categories/update-cat/{slug}', [CategoryController::class, 'formUpdateCategory'])->name('update-cat');

Route::put('/admin/manage-categories/update-cat/{slug}', [CategoryController::class, 'update']);

Route::delete('/admin/manage-categories/delete-cat', [CategoryController::class, 'delete'])->name('delete-cat');