<?php

use App\Http\Controllers\Api\V1\CategoryController;
use Illuminate\Support\Facades\Route;




/**
 * Api/V1 Routes
 */
Route::prefix('v1')->as('api.v1.')->middleware('auth:sanctum')->group(function () {

    /**
     * Categories
     */
    Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
});
