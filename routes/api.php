<?php

use App\Http\Controllers\Api\V1\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


/**
 * Api/V1 Routes
 */
Route::prefix('v1')->group(function () {

    /**
     * Categories
     */
    Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
});
