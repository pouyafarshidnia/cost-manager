<?php

use App\Actions\Category\StoreCategoryAction;
use App\Models\Category;

beforeEach(function () {

    $this->action = new StoreCategoryAction;
});




it('can store category', function () {

    $categoriesCount = Category::count();

    $this->action->handle($this->user, 'Test Category');

    expect(Category::count())->toBe($categoriesCount + 1);
});
