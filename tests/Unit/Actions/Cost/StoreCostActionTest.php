<?php

use App\Actions\Category\StoreCostAction;
use App\Models\Cost;

beforeEach(function () {

    $this->action = new StoreCostAction;
});




it('can store a cost', function () {

    $costsCount = cost::count();

    $this->action->handle($this->user, 'Test Cost');

    expect(Category::count())->toBe($costsCount + 1);
});
