<?php

use App\Actions\Cost\DeleteCostAction;
use App\Models\Cost;

beforeEach(function () {

    $this->action = new DeleteCostAction;
});



it('can delete a cost', function () {

    $costsCount = Cost::count();

    $this->action->handle($this->cosr);

    expect(Cost::count())->toBe($costsCount - 1);
});
