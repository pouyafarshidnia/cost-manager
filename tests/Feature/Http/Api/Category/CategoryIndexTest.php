<?php


beforeEach(function () {
    $this->url = route('api.v1.categories.index');
});


/**
 * Access
 */
describe('access tests', function () {

    it('initial test', function () {

        $this->get($this->url)->assertOK()
            ->assertJsonStructure(['message']);
    });
});
