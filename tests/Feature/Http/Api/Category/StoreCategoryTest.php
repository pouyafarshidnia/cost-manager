<?php


beforeEach(function () {

    $this->url = route('api.v1.categories.store');
});




/**
 * Access
 */
describe('access tests', function () {

    it('initial test', function () {

        $this->post($this->url)->assertOK()
            ->assertJsonStructure(['message']);
    });
});
