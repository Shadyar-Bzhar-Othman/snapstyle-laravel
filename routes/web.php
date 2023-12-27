<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProductSizeController;
use App\Http\Controllers\AdminSizeController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminSubCategoryController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PageController;
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

// index, show, create, store, edit, update, destroy


// All type of user can access it
// Website routes
Route::get('/', [PageController::class, 'home'])->name('home');


// Products 
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');



// Only guest user can access it
Route::middleware("guest")->group(function () {
    // Session 
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login');


    // Register 
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
});



// Only auth user can access it
Route::middleware("auth")->group(function () {
    // Cart 
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

    Route::patch('/cart/{cartitem}', [CartController::class, 'update'])->name('cart.update');

    Route::delete('/cart/{cartitem}', [CartController::class, 'destroy'])->name('cart.delete');


    // Orders 
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


    // Session
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
});



// Only admin can access it
Route::middleware("can:admin")->group(function () {
    // Dashboard
    Route::get("/dashboard", [PageController::class, "dashboard"])->name('dashboard');

    // Users Admin
    Route::get("/dashboard/users", [AdminUserController::class, "index"])->name('dashboard.users.index');

    Route::get("/dashboard/users/create", [AdminUserController::class, "create"])->name('dashboard.users.create');
    Route::post("/dashboard/users", [AdminUserController::class, "store"])->name('dashboard.users.store');

    Route::get("/dashboard/users/{user}/edit", [AdminUserController::class, "edit"])->name('dashboard.users.edit');
    Route::patch("/dashboard/users/{user}", [AdminUserController::class, "update"])->name('dashboard.users.update');

    Route::delete("/dashboard/users/{user}", [AdminUserController::class, "destroy"])->name('dashboard.users.delete');


    // Products Admin 
    Route::get("/dashboard/products", [AdminProductController::class, "index"])->name('dashboard.products.index');

    Route::get("/dashboard/products/create", [AdminProductController::class, "create"])->name('dashboard.products.create');
    Route::post("/dashboard/products", [AdminProductController::class, "store"])->name('dashboard.products.store');

    Route::get("/dashboard/products/{product}/edit", [AdminProductController::class, "edit"])->name('dashboard.products.edit');
    Route::patch("/dashboard/products/{product}", [AdminProductController::class, "update"])->name('dashboard.products.update');

    Route::delete("/dashboard/products/{product}", [AdminProductController::class, "destroy"])->name('dashboard.products.delete');


    // Product Sizes Admin 
    Route::get("/dashboard/productsizes/create/{product}", [AdminProductSizeController::class, "create"])->name('dashboard.productsizes.create');
    Route::post("/dashboard/productsizes/", [AdminProductSizeController::class, "store"])->name('dashboard.productsizes.store');

    Route::get("/dashboard/productsizes/{productsize}/edit", [AdminProductSizeController::class, "edit"])->name('dashboard.productsizes.edit');
    Route::patch("/dashboard/productsizes/{productsize}", [AdminProductSizeController::class, "update"])->name('dashboard.productsizes.update');

    Route::delete("/dashboard/productsizes/{productsize}", [AdminProductSizeController::class, "destroy"])->name('dashboard.productsizes.delete');


    // Sizes Admin 
    Route::get("/dashboard/sizes", [AdminSizeController::class, "index"])->name('dashboard.sizes.index');

    Route::get("/dashboard/sizes/create", [AdminSizeController::class, "create"])->name('dashboard.sizes.create');
    Route::post("/dashboard/sizes", [AdminSizeController::class, "store"])->name('dashboard.sizes.store');

    Route::get("/dashboard/sizes/{size}/edit", [AdminSizeController::class, "edit"])->name('dashboard.sizes.edit');
    Route::patch("/dashboard/sizes/{size}", [AdminSizeController::class, "update"])->name('dashboard.sizes.update');

    Route::delete("/dashboard/sizes/{size}", [AdminSizeController::class, "destroy"])->name('dashboard.sizes.delete');


    // Categories Admin
    Route::get("/dashboard/categories", [AdminCategoryController::class, "index"])->name('dashboard.categories.index');

    Route::get("/dashboard/categories/create", [AdminCategoryController::class, "create"])->name('dashboard.categories.create');
    Route::post("/dashboard/categories", [AdminCategoryController::class, "store"])->name('dashboard.categories.store');

    Route::get("/dashboard/categories/{category}/edit", [AdminCategoryController::class, "edit"])->name('dashboard.categories.edit');
    Route::patch("/dashboard/categories/{category}", [AdminCategoryController::class, "update"])->name('dashboard.categories.update');

    Route::delete("/dashboard/categories/{category}", [AdminCategoryController::class, "destroy"])->name('dashboard.categories.delete');


    // SubCategories Admin
    Route::get("/dashboard/subcategories", [AdminSubCategoryController::class, "index"])->name('dashboard.subcategories.index');

    Route::get("/dashboard/subcategories/create", [AdminSubCategoryController::class, "create"])->name('dashboard.subcategories.create');
    Route::post("/dashboard/subcategories", [AdminSubCategoryController::class, "store"])->name('dashboard.subcategories.store');

    Route::get("/dashboard/subcategories/{subcategory}/edit", [AdminSubCategoryController::class, "edit"])->name('dashboard.subcategories.edit');
    Route::patch("/dashboard/subcategories/{subcategory}", [AdminSubCategoryController::class, "update"])->name('dashboard.subcategories.update');

    Route::delete("/dashboard/subcategories/{subcategory}", [AdminSubCategoryController::class, "destroy"])->name('dashboard.subcategories.delete');

    // Orders Admin
    Route::get("/dashboard/orders", [AdminOrderController::class, "index"])->name('dashboard.orders.index');
    Route::get("/dashboard/orders/{order}", [AdminOrderController::class, "show"])->name('dashboard.orders.show');

    Route::patch("/dashboard/orders/{order}", [AdminOrderController::class, "update"])->name('dashboard.orders.update');
});