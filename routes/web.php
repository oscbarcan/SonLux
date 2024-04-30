<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('index');
})->name('index');


// Ruta para usuarios admin
Route::middleware('admin')->group(function () {
});

// Ruta para usuarios registrados
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

// Ruta para usuarios no registrados
Route::middleware('guest')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::get('signup', [AuthController::class, 'signupForm'])->name('signupForm');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');
});
