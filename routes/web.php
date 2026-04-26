<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutCpntroller;
use Illuminate\Support\Facades\Route;


/**
 * Guest Routes
 */
Route::prefix('auth')->middleware('guest')->controller(AuthController::class)->group(function () {

    Route::get('', 'index')->name('auth');
    Route::get('gooogle', 'redirectToGoogle')->name('auth.google.redirect');
    Route::get('callback', 'handleGoogleCallback')->name('auth.google.callback');
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
