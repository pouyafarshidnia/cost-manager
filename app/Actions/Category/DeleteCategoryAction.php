<?php

namespace App\Actions\Category;

use App\Models\Category;

class DeleteCategoryAction
{
    public function handle(Category $category): int
    {
        return $category->delete();
    }
}
