<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController
{
    public function index(Request $request)
    {
        return new CategoryCollection($request->user()->categories()->filter($request->all())->paginate($request->perPage)->withQueryString());
    }


    public function show(Category $category)
    {
        Gate::authorize('view', $category);

        return new CategoryResource($category);
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
