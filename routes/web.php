<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController as AdminUploadController;
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

Route::get('command', function () {
    \Artisan::call('storage:link');
    dd("Done");
});


Route::prefix('admin')->name('admin')->middleware('auth')->group(function () {
    Route::controller(AdminUploadController::class)->prefix('upload')->name('upload.')->group(function () {
        Route::post('/image', 'uploadImage');
        Route::post('/file', 'uploadFile');
    });
});

Route::auth(['confirm' => false, 'reset' => false, 'register' => 'false']);
