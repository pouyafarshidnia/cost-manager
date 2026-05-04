<?php

namespace App\Actions\Cost;

use App\Models\Cost;
use App\Models\User;

class StoreCostAction
{

    public function handle(User $user, array $costData): Cost
    {
        return  $user->costs()->create($costData);
    }
}
