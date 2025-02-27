<?php

use App\Events\Example;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/listing/{product}', 'listing')->name('listing');
    Route::get('product/variation', 'changeProductVariation')->name('product.variation');
    Route::get('products', 'index')->name('products.get');
});

Route::controller(CartController::class)->group(function () {
    Route::put('cart', 'update')->name('cart.update');
});


Route::get('/broadcast', function () {
    broadcast(new Example());
});



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['verified'])->name('dashboard');

    // profile routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // cart management for guest
    Route::controller(CartController::class)->prefix('cart')->name('cart.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/items', 'items')->name('items');
        Route::put('', 'update')->name('update');
        Route::delete('/{item?}', 'destroy')->name('destroy');
    });
});

require __DIR__ . '/auth.php';
