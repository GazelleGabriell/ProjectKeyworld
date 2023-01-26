<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/manage', [CategoryController::class, 'goManageCategory']);
Route::get('/manage/category/edit/{id}', [CategoryController::class, 'goEditCategory']);
Route::put('/manage/category/update/{id}', [CategoryController::class, 'updateCategory']);
Route::delete('/manage/category/delete/{id}', [CategoryController::class, 'deleteCategory']);

Route::get('/keyboard/category/{id}', [KeyboardController::class, 'viewKeyboardByCategory']);
Route::put('/keyboard/category/search/{id}', [KeyboardController::class, 'searchKeyboardByCategory']);
Route::get('/keyboard/detail/{id}', [KeyboardController::class, 'viewKeyboardDetail']);
Route::get('/keyboard/add', [KeyboardController::class, 'goAddKeyboard']);
Route::post('/manage/keyboard/add', [KeyboardController::class, 'addKeyboard']);
Route::get('/manage/keyboard/edit/{id}', [KeyboardController::class, 'goEditKeyboard']);
Route::put('/keyboard/update/{id}', [KeyboardController::class, 'updateKeyboard']);
Route::delete('/manage/keyboard/delete/{id}', [KeyboardController::class, 'deleteKeyboard']);

Route::get('/cart', [CartController::class, 'viewCart']);
Route::post('/cart/add', [CartController::class, 'addCartItem']);
Route::put('/cart/update/{id}', [CartController::class, 'updateCartItem']);

Route::get('/checkout', [TransactionController::class, 'addTransaction']);
Route::get('/transaction', [TransactionController::class, 'getAllTransactionHistory']);
Route::get('/transaction/detail/{id}', [TransactionController::class, 'getDetailTransactionHistory']);


Route::get('/change/password', [UserController::class, 'goChangePassword']);
Route::post('/change/password', [UserController::class, 'changePassword']);
