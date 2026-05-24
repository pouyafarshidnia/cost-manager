<?php

use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->url = route('api.v1.categories.destroy', $this->category);
});



/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {
        $this->delete($this->url)->assertRedirect();
    });


    it('initial test', function () {

        Sanctum::actingAs($this->user);
        $this->delete($this->url)->assertOK()->assertJsonStructure(['message']);
    });
});
