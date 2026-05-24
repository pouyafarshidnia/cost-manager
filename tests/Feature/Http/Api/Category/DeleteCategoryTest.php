<?php


beforeEach(function () {
    $this->url = route('api.v1.categories.destroy', $this->category);
});



/**
 * Access
 */
describe('access tests', function () {

    it('initial test', function () {

        $this->delete($this->url)->assertOK()
            ->assertJsonStructure(['message']);
    });
});
