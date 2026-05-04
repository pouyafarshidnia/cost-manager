<?php

namespace App\Actions\Cost;

use App\Models\Cost;

class UpdateCostAction
{

    public function handle(Cost $cost, array $costData): int
    {
        return  $cost->update($costData);
    }
}
