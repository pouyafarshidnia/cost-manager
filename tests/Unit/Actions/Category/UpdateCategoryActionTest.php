<?php

use App\Actions\Category\UpdateCategoryAction;
use App\Models\Category;

beforeEach(function () {

    $this->action = new UpdateCategoryAction;
    $this->category = Category::factory()->create();
});




it('can update category', function () {

    expect(Category::count())->toBe(1);

    $this->action->handle($this->category, 'Updated Test Category');

    expect(Category::count())->toBe(1)
        ->and($this->category->fresh()->title)->toBe('Updated Test Category');
});
