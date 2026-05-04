<?php

use App\Actions\Category\DeleteCostAction;
use App\Models\Cost;

beforeEach(function () {

    $this->action = new DeleteCostAction;
});



it('can delete a cost', function () {

    $costsCount = Cost::count();

    $this->action->handle($this->category);

    expect(Cost::count())->toBe($costsCount - 1);
});
