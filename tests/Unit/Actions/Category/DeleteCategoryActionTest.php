<?php

use App\Actions\Category\DeleteCategoryAction;
use App\Models\Category;

beforeEach(function () {

    $this->action = new DeleteCategoryAction;
    $this->category = Category::factory()->create();
});



it('can delete category', function () {

    expect(Category::count())->toBe(1);

    $this->action->handle($this->category);

    expect(Category::count())->toBe(0);
});
