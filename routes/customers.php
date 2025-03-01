<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrdersController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\ReviewController;

Route::middleware('auth')->group(function () {


    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'profile')->name('profile');
    });

    Route::controller(OrdersController::class)->group(function () {
        Route::get('/index', 'index')->name('orders.index');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/listing/{product}', 'listing')->name('listing');
        Route::get('product/variation', 'changeProductVariation')->name('product.variation');
        Route::get('products', 'index')->name('products.get');
    });

    // cart management for guest
    Route::controller(CartController::class)
        ->prefix('cart')
        ->name('cart.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/items', 'items')->name('items');
            Route::put('', 'update')->name('update');
            Route::delete('/{item?}', 'destroy')->name('destroy');
        });

    Route::controller(CartController::class)
        ->prefix('checkout')
        ->name('checkout.')
        ->group(function () {
            Route::post('', 'checkout')->name('index');
            Route::get('success', 'success')->name('success');
            Route::get('cancel', 'cancel')->name('cancel');
        });

    Route::controller(ReviewController::class)->prefix('reviews')->name('reviews.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{item}', 'create')->name('create');
        Route::post('/{item}', 'store')->name('store');
    });
});
