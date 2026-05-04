<?php

use App\Actions\Cost\UpdateCostAction;
use App\Models\Cost;

beforeEach(function () {

    $this->action = new UpdateCostAction;
    $this->costData = [
        'category_id'   => $this->category->id,
        'title'         => 'Updated Test Cost',
        'price'         => fake()->numberBetween(100, 999_999_999),
        'spent_at'      => fake()->date('j F,Y'),
        'note'          => null,
    ];
});




it('can update a cost', function () {

    $costsCount = Cost::count();

    $this->action->handle($this->cost, $this->costData);

    expect(Cost::count())->toBe($costsCount)
        ->and($this->cost->fresh()->title)->toBe('Updated Test Cost');
});
