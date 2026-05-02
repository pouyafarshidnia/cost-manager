<?php

namespace App\Policies;

use App\Models\Cost;
use App\Models\User;


class CostPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Cost $cost): bool
    {
        return $user->id === $cost->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Cost $cost): bool
    {
        return $user->id === $cost->user_id;
    }
}
