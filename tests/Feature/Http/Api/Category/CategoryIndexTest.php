<?php

use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->url = route('api.v1.categories.index');
});


/**
 * Access
 */
describe('access tests', function () {


    it('denies access to guests', function () {

        $this->get($this->url)->assertRedirect();
    });


    it('initial test', function () {

        Sanctum::actingAs($this->user);
        $this->get($this->url)->assertOK()->assertJsonStructure(['message', 'user']);
    });
});
