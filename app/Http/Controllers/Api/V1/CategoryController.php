<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class CategoryController
{
    public function index()
    {
        return response()->json(['message' => 'test message'], 200);
    }
}
