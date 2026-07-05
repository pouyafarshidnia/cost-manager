<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Category\DeleteCategoryAction;
use App\Actions\Category\StoreCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
use App\Http\Requests\Category\StoreCategoryViaApiRequest;
use App\Http\Requests\Category\UpdateCategoryViaApiRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController
{
    public function index(Request $request, #[CurrentUser] User $user): CategoryCollection
    {
        return new CategoryCollection($user->categories()->filter($request->all())->paginate($request->perPage)->withQueryString());
    }


    public function show(Category $category): CategoryResource
    {
        Gate::authorize('view', $category);

        return new CategoryResource($category);
    }


    public function store(StoreCategoryViaApiRequest $request, #[CurrentUser] User $user, StoreCategoryAction $action): JsonResponse
    {


        $action->handle($user, $request->title);
        return response()->json(['message' => 'Category created successfuly'], 201);
    }


    public function update(UpdateCategoryViaApiRequest $request, Category $category, UpdateCategoryAction $action): JsonResponse
    {
        Gate::authorize('update', $category);

        $action->handle($category, $request->title);
        return response()->json(['message' => 'Category updated successfuly'], 202);
    }


    public function destroy(Category $category, DeleteCategoryAction $action): JsonResponse
    {
        Gate::authorize('delete', $category);

        $action->handle($category);
        return response()->json(['message' => 'Category Destroyed successfuly'], 202);
    }
}
