<?php

use Illuminate\Support\Facades\Route;

use Modules\Gallery\Http\Controllers\Guest\GalleryController as GuestGalleryController;
use Modules\Gallery\Http\Controllers\Admin\GalleryController as AdminGalleryController;

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::controller(AdminGalleryController::class)->name('gallery.')->prefix('gallery')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::delete('/photos/{id}', 'deletePhoto')->name('deletePhoto');
    });
});

Route::name('guest.')->group(function () {
    Route::controller(GuestGalleryController::class)->name('gallery.')->prefix('gallery')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{slug}', 'show')->name('show');
    });
});
