<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;


/**
 * Guest Routes
 */
Route::prefix('auth')->middleware('guest')->group(function () {

    Route::get('', AuthController::class)->name('auth');
    Route::get('gooogle', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
    Route::get('callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');
});



/**
 * Authenticated Routes
 */
Route::middleware('auth')->group(function () {


    /**
     * Dashboard
     */
    Route::get('', [DashboardController::class, 'index'])->name('home');


    /**
     * Categories
     */
    Route::resource('categories', CategoryController::class)->except(['show, create, edit']);



    /**
     * Logout
     */
    Route::get('logout', LogoutController::class)->name('logout');
});
