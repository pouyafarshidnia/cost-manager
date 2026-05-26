<?php

use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->url = route('api.v1.categories.destroy', $this->category);
    $this->notFoundUrl = route('api.v1.categories.destroy', ['category' => 999]);
    $this->otherCategoryUrl = route('api.v1.categories.destroy', ['category' => 2]);
});



/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {
        $this->delete($this->url)->assertRedirect();
    });


    it('returns json for 403 status', function () {

        Sanctum::actingAs($this->user);
        $this->delete($this->otherCategoryUrl)->assertStatus(403)->assertJsonStructure(['message']);
    });


    it('initial test', function () {

        Sanctum::actingAs($this->user);
        $this->delete($this->url)->assertStatus(202)->assertJsonStructure(['message']);
    });
});
