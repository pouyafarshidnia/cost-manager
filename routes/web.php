<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LogoutCpntroller;
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
    Route::get('', function () {})->name('home');



    /**
     * Logout
     */
    Route::get('logout', LogoutCpntroller::class)->name('logout');
});
