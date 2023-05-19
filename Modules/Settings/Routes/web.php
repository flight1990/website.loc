<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::controller(SettingsController::class)->name('settings.')->prefix('settings')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::patch('/update', 'update')->name('update');
    });
});

