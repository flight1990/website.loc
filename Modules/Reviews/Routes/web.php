<?php

use Illuminate\Support\Facades\Route;
use Modules\Reviews\Http\Controllers\Admin\ReviewsController as AdminReviewsController;
use Modules\Reviews\Http\Controllers\Guest\ReviewsController as GuestReviewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::controller(AdminReviewsController::class)->name('reviews.')->prefix('reviews')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});

Route::name('guest.')->group(function () {
    Route::controller(GuestReviewsController::class)->name('reviews')->prefix('reviews')->group(function () {
        Route::post('/', 'store')->name('store');
    });
});
