<?php

use App\Actions\Category\UpdateCategoryAction;
use App\Models\Category;

beforeEach(function () {

    $this->action = new UpdateCategoryAction;
});




it('can update s category', function () {

    $categoriesCount = Category::count();

    $this->action->handle($this->category, 'Updated Test Category');

    expect(Category::count())->toBe($categoriesCount)
        ->and($this->category->fresh()->title)->toBe('Updated Test Category');
});
