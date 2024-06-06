<?php

use App\Http\Controllers\Admin\Messages\AdminMessageController;
use App\Http\Controllers\Admin\Products\AdminProductController;
use App\Http\Controllers\Admin\Providers\AdminProviderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetDesignerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Users\AdminUserController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;


// Ruta principal
Route::get('/', function () {
    return view('index');
})->name('home');

// Ruta para cambiar el idioma (disponible para todos los usuarios)
Route::get('lang/{locale}', [LocalizationController::class, 'setLocale'])->name('lang.switch');

// Ruta para admin
Route::middleware('admin')->group(function () {

    // Ruta para la dashboard
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    // Ruta para usuarios admin
    Route::get('/index/users', [AdminUserController::class, 'index'])->name('admin.user.index');
    Route::get('/edit/user/{user}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/update/user/{user}', [AdminUserController::class, 'update'])->name('admin.user.update');
    Route::get('/destroy/user/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');

    // Ruta para productos admin
    Route::get('/index/products', [AdminProductController::class, 'index'])->name('admin.product.index');
    Route::get('/edit/product/{product}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::get('/create/product', [AdminProductController::class, 'create'])->name('admin.product.create');
    Route::post('/store/product', [AdminProductController::class, 'store'])->name('admin.product.store');
    Route::put('/update/product/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');
    Route::get('/destroy/product/{product}', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');

    // Ruta para proveedores admin
    Route::get('/index/provider', [AdminProviderController::class, 'index'])->name('admin.provider.index');
    Route::get('/edit/provider/{provider}', [AdminProviderController::class, 'edit'])->name('admin.provider.edit');
    Route::get('/create/provider', [AdminProviderController::class, 'create'])->name('admin.provider.create');
    Route::post('/store/provider', [AdminProviderController::class, 'store'])->name('admin.provider.store');
    Route::put('/update/provider/{provider}', [AdminProviderController::class, 'update'])->name('admin.provider.update');
    Route::get('/destroy/provider/{provider}', [AdminProviderController::class, 'destroy'])->name('admin.provider.destroy');

    // Ruta para messages admin
    Route::get('/index/message', [AdminMessageController::class, 'index'])->name('admin.message.index');
    Route::patch('/update/message/{message}', [AdminMessageController::class, 'update'])->name('admin.message.update');
    Route::get('/destroy/message/{message}', [AdminMessageController::class, 'destroy'])->name('admin.message.destroy');
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
Route::resource('budget_designer', BudgetDesignerController::class);
Route::resource('providers', ProviderController::class);
Route::post('budget_designer/result', [BudgetDesignerController::class, 'form_Results'])->name('form-Results');
Route::get('policy', function () {return view('policy.index');})->name('policy');


Route::resource('message', MessageController::class);

// Rutas para tienda online
Route::resource('products', ProductController::class);
Route::post('add_To_Cart', [ProductController::class, 'add_To_Cart'])->name('add-To-Cart');
Route::get('shoping_cart', [ProductController::class, 'index_Shoping_Cart'])->name('shoping-cart');
Route::get('delete_Shoping-Cart/{id}', [ProductController::class, 'delete_Shoping_Cart'])->name('delete-Shoping-Cart');
Route::get('payment_gateway', [ProductController::class, 'payment_Gateway'])->name('payment-gateway');
Route::post('payment_gateway_buy', [ProductController::class, 'payment_Gateway_Buy'])->name('payment-gateway-buy');
Route::get('orders_index', [ProductController::class, 'orders_Index'])->name('orders-index');
Route::get('orders_destroy/{id}', [ProductController::class, 'orders_Destroy'])->name('orders-destroy');
Route::get('payment_Gateway_Index', [ProductController::class, 'payment_Gateway_Index'])->name('payment-gateway-index');
Route::get('about', function () {
    return view('about.index');
})->name('about');
