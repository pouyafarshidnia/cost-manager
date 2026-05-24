<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    public function index()
    {
        return response()->json(['message' => 'index message'], 200);
    }


    public function show(Category $category)
    {
        return response()->json(['message' => 'show message'], 200);
    }


    public function store()
    {
        return response()->json(['message' => 'store message'], 200);
    }


    public function update(Category $category)
    {
        return response()->json(['message' => 'update message', 'id' => $category->id], 200);
    }


    public function destroy(Category $category)
    {
        return response()->json(['message' => 'destroy message', 'id' => $category->id], 200);
    }
}
