<?php

use App\Actions\Cost\UpdateCostAction;
use App\Models\Cost;

beforeEach(function () {

    $this->action = new UpdateCostAction;
});




it('can update a cost', function () {

    $costsCount = Cost::count();

    $this->action->handle($this->cost, 'Updated Test Cost');

    expect(Cost::count())->toBe($costsCount)
        ->and($this->category->fresh()->title)->toBe('Updated Test Cost');
});
