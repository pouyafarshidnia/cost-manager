<?php

use App\Actions\Category\UpdateCategoryAction;
use App\Models\Category;

beforeEach(function () {

    $this->action = new UpdateCategoryAction;
});




it('can update category', function () {

    $categoryCount = Category::count();

    $this->action->handle($this->category, 'Updated Test Category');

    expect(Category::count())->toBe($categoryCount)
        ->and($this->category->fresh()->title)->toBe('Updated Test Category');
});
