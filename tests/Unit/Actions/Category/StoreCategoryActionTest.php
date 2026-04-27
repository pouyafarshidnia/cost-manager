<?php

use App\Actions\Category\StoreCategoryAction;
use App\Models\Category;
use App\Models\User;

beforeEach(function () {

    $this->action = new StoreCategoryAction;
    $this->user = User::factory()->create();
});




it('can store category', function () {

    expect(Category::count())->toBe(0);

    $this->action->handle($this->user, 'Test Category');

    expect(Category::count())->toBe(1);
});
