<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetDesignerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('index');
})->name('home');


// Ruta para usuarios admin
Route::middleware('admin')->group(function () {
});

// Ruta para usuarios registrados
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
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


