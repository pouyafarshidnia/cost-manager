<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Models\User;

class StoreCategoryAction
{
    public function handle(User $user, string $title): Category
    {
        return $user->categories()->create(['title' => $title]);
    }
}
