<?php



beforeEach(function () {

    $this->url = route('api.v1.categories.update', $this->category);
});




/**
 * Access
 */
describe('access tests', function () {

    it('initial test', function () {

        $this->put($this->url)->assertOK()
            ->assertJsonStructure(['message']);
    });
});
