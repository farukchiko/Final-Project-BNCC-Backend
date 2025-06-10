<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLogin;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Guest / User Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::middleware('auth')->get('/products', [ProductController::class, 'userIndex'])->name('user.products.index');

Route::middleware('auth')->post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::middleware('auth')->patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');

Route::middleware('auth')->get('/order-history', [CheckoutController::class, 'history'])->name('order.history');
/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminLogin::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLogin::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLogin::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Product CRUD khusus admin
    Route::resource('products', ProductController::class)->names('admin.products');
});

require __DIR__.'/auth.php';