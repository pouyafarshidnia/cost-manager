<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicty
{

    /**
     * Determine whether the user can update the model.
     */
    public function view(User $user, Category $category): bool
    {
        return $this->isCategoryOwner($user, $category);
    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Category $category): bool
    {
        return $this->isCategoryOwner($user, $category);
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Category $category): bool
    {
        return $this->isCategoryOwner($user, $category);
    }



    /**
     * Check if the user is the owner of category
     */
    private function isCategoryOwner(User $user, Category $category): bool
    {
        return $user->id === $category->user_id;
    }
}
