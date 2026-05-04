<?php

use App\Actions\Cost\StoreCostAction;
use App\Models\Cost;

beforeEach(function () {

    $this->action = new StoreCostAction;
    $this->costData = [
        'category_id'   => $this->category->id,
        'title'         => fake()->name(),
        'price'         => fake()->numberBetween(100, 999_999_999),
        'spent_at'      => fake()->date('j F,Y'),
        'note'          => null,
    ];
});




it('can store a cost', function () {

    $costsCount = cost::count();

    $this->action->handle($this->user, $this->costData);

    expect(cost::count())->toBe($costsCount + 1);
});
