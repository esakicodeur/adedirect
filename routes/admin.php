<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('/manage', [UserController::class, 'manage'])->name('manage');
    Route::get('/users', [UserController::class, 'index'])->name('users');
});
