<?php

namespace App\Actions\Category;

use App\Models\Category;

class UpdateCategoryAction
{
    public function handle(Category $category, string $title): int
    {
        return $category->update(['title' => $title]);
    }
}
