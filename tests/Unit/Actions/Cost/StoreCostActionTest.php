<?php

use App\Actions\Cost\StoreCostAction;
use App\Models\Cost;

beforeEach(function () {

    $this->action = new StoreCostAction;
});




it('can store a cost', function () {

    $costsCount = cost::count();

    $this->action->handle($this->user, 'Test Cost');

    expect(Category::count())->toBe($costsCount + 1);
});
