<?php

namespace App\Http\Controllers;

use App\Actions\Category\DeleteCategoryAction;
use App\Actions\Category\StoreCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
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
        $categories = $request->user()->categories()->paginate($request->perPage)->withQueryString();
        return view('categories.index', compact('categories'));
    }


    public function store(StoreCategoryRequest $request, StoreCategoryAction $action): RedirectResponse
    {
        $action->handle($request->user(), $request->title);
        return to_route('categories.index')->with('success', 'Category created successfully.');
    }


    public function update(UpdateCategoryRequest $request, Category $category, UpdateCategoryAction $action): RedirectResponse
    {
        Gate::authorize('update', $category);

        $action->handle($category, $request->title);
        return to_route('categories.index')->with('success', 'Category updated successfully.');
    }


    public function destroy(Category $category, DeleteCategoryAction $action): RedirectResponse
    {
        Gate::authorize('delete', $category);

        $action->handle($category);
        return to_route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
