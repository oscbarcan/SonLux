<?php

use App\Http\Controllers\Admin\Products\AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetDesignerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Users\AdminUserController;
use Illuminate\Support\Facades\Route;


// Ruta principal
Route::get('/', function () {
    return view('index');
})->name('home');

// Ruta para admin
Route::middleware('admin')->group(function () {
    Route::get('dashboard', function () {return view('admin.dashboard.index');})->name('dashboard'); // dashboard page

    // Ruta para usuarios admin
    Route::get('/index/users', [AdminUserController::class, 'index'])->name('admin.user.index'); // users list page
    Route::get('/edit/user/{user}', [AdminUserController::class, 'edit'])->name('admin.user.edit'); // edit users page
    Route::put('/update/user/{user}', [AdminUserController::class, 'update'])->name('admin.user.update'); // update users
    Route::get('/destroy/user/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy'); // delete users

    // Ruta para productos admin
    Route::get('/index/products', [AdminProductController::class, 'index'])->name('admin.product.index'); // products list
    Route::get('/edit/product/{product}', [AdminProductController::class, 'edit'])->name('admin.product.edit'); // edit products
    Route::get('/create/product', [AdminProductController::class, 'create'])->name('admin.product.create'); // create product
    Route::post('/store/product', [AdminProductController::class, 'store'])->name('admin.product.store'); // store product
    Route::put('/update/product/{product}', [AdminProductController::class, 'update'])->name('admin.product.update'); // update products
    Route::get('/destroy/product/{product}', [AdminProductController::class, 'destroy'])->name('admin.product.destroy'); // delete products
});

// Ruta para usuarios registrados
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('users', UserController::class)->only(['show', 'edit', 'update']);
});

// Ruta para usuarios no registrados
Route::middleware('guest')->group(function () {
    // Rutas Auth
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::get('signup', [AuthController::class, 'signupForm'])->name('signupForm');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');
});

// Ruta para todo tipo de usuarios
// Rutas para el budget designer
Route::resource('budget_designer', BudgetDesignerController::class);

// Rutas para tienda online
Route::resource('products', ProductController::class);
Route::post('add-To-Cart', [ProductController::class, 'addToCart'])->name('add-To-Cart');
Route::get('shoping_cart', [ProductController::class, 'indexShopingCart'])->name('shoping_cart');
Route::get('delete-Shoping-Cart/{id}', [ProductController::class, 'deleteShopingCart'])->name('delete-Shoping-Cart');
