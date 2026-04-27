<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class CategoryController
{
    public function index(Request $request): View
    {
        $categories = $request->user()->categories;
        return view('categories.index', compact('categories'));
    }


    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        return to_route('categories.index');
    }


    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        Gate::authorize('update', $category);

        return to_route('categories.index');
    }


    public function destroy(Category $category): RedirectResponse
    {
        Gate::authorize('delete', $category);

        return to_route('categories.index');
    }
}
