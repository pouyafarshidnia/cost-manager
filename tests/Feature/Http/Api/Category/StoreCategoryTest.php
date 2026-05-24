<?php

use Laravel\Sanctum\Sanctum;

beforeEach(function () {

    $this->url = route('api.v1.categories.store');
});




/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {
        $this->post($this->url)->assertRedirect();
    });


    it('initial test', function () {

        Sanctum::actingAs($this->user);
        $this->post($this->url)->assertOK()->assertJsonStructure(['message']);
    });
});
