<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/view/{categoryId}', [App\Http\Controllers\KeyboardController::class, 'viewKeyboardsByCategory']);

Route::get('/detail/{id}', [App\Http\Controllers\KeyboardController::class, 'viewKeyboardDetail']);
Route::get('/create', [App\Http\Controllers\KeyboardController::class, 'create']);
Route::get('/edit/{id}', [App\Http\Controllers\KeyboardController::class, 'edit']);
Route::post('/create', [App\Http\Controllers\KeyboardController::class, 'store']);
Route::patch('/update/{id}', [App\Http\Controllers\KeyboardController::class, 'update']);
Route::delete('/delete/{id}', [App\Http\Controllers\KeyboardController::class, 'delete']);

Route::get('/manage/category', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/manage/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::patch('/manage/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update']);
Route::delete('/manage/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete']);

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index']);
Route::post('/cart/create', [App\Http\Controllers\CartController::class, 'store']);
Route::patch('/cart/update/{id}', [App\Http\Controllers\CartController::class, 'update']);

Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/transaction/detail/{id}', [App\Http\Controllers\TransactionController::class, 'detail']);
Route::post('/checkout', [App\Http\Controllers\TransactionController::class, 'checkout']);

Route::get('/setting/password', [App\Http\Controllers\UserController::class, 'editPassword']);
Route::post('/setting/password/update', [App\Http\Controllers\UserController::class, 'updatePassword']);
