<?php


use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\VerificationController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
        Route::get('/locale/{locale}', 'language')
            ->name('language')
            ->where('locale', '[a-z]+');
    });


Route::controller(ProductController::class)
    ->group(function () {
        Route::get('/product/{slug}', 'product')->name('product')->where('slug', '[A-Za-z0-9-]+');
        Route::get('/category/{slug}', 'category')->name('category')->where('slug', '[A-Za-z0-9-]+');
        Route::get('/brand/{slug}', 'brand')->name('brand')->where('slug', '[A-Za-z0-9-]+');
    });

Route::controller(CartController::class)
    ->prefix('/cart')
    ->name('cart.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/add/{id}', 'add')->name('add')->where('id', '[0-9]+');
        Route::get('/remove/{id}', 'remove')->name('remove')->where('id', '[0-9]+');
        Route::get('/increase/{id}', 'increase')->name('increase')->where('id', '[0-9]+');
        Route::get('/decrease/{id}', 'decrease')->name('decrease')->where('id', '[0-9]+');
        Route::get('/clear', 'clear')->name('clear');
    });

Route::controller(OrderController::class)
    ->prefix('/order')
    ->name('order.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{code}', 'show')->name('show')->where('code', '[A-Za-z0-9-]+');
        Route::get('/create', 'create')->name('create');
        Route::post('', 'store')->middleware(ProtectAgainstSpam::class)->name('store');
        Route::delete('/{code}', 'delete')->name('delete')->middleware(['auth:customer_web', ProtectAgainstSpam::class])->where('code', '[A-Za-z0-9-]+');
        Route::post('/{code}', 'cancel')->name('cancel')->middleware(['auth:customer_web', ProtectAgainstSpam::class])->where('code', '[A-Za-z0-9-]+');

    });

Route::controller(VerificationController::class)
    ->middleware(['guest:customer_web', 'throttle:3,1'])
    ->group(function () {
        Route::get('/verification', 'create')->name('verification');
        Route::post('/verification', 'store');
    });

Route::controller(LoginController::class)
    ->middleware('guest:customer_web')
    ->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store');
    });

Route::controller(LoginController::class)
    ->middleware('auth:customer_web')
    ->group(function () {
        Route::post('/logout', 'destroy')->name('logout');
    });












