<?php

use App\Actions\Category\DeleteCategoryAction;
use App\Models\Category;

beforeEach(function () {

    $this->action = new DeleteCategoryAction;
});



it('can delete category', function () {

    $categoriesCount = Category::count();

    $this->action->handle($this->category);

    expect(Category::count())->toBe($categoriesCount - 1);
});
