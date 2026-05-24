<?php

use Laravel\Sanctum\Sanctum;

beforeEach(function () {

    $this->url = route('api.v1.categories.update', $this->category);
});




/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {

        $this->put($this->url)->assertRedirect();
    });


    it('initial test', function () {

        Sanctum::actingAs($this->user);
        $this->put($this->url)->assertOK()->assertJsonStructure(['message']);
    });
});
