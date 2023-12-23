<?php

use App\Models\Category;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/dashboard/products/create", [ProductController::class, "create"]);
Route::post("/dashboard/products/create", [ProductController::class, "store"]);

Route::get('/', [ProductController::class, 'index']);

Route::get('/cart', [CartController::class, 'create']);
Route::post('/cart', [CartController::class, 'store']);

Route::patch('/cart', [CartController::class, 'update']);

Route::delete('/cart', [CartController::class, 'destroy']);

Route::post('/order', [OrderController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
