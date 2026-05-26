<?php

use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->url = route('api.v1.categories.show', ['category' => 1]);
    $this->notFoundUrl = route('api.v1.categories.show', ['category' => 999]);
    $this->otherCategoryUrl = route('api.v1.categories.show', ['category' => 2]);
});


/**
 * Access
 */
describe('access tests', function () {


    it('denies access to guests', function () {

        $this->get($this->url)->assertRedirect();
    });


    it('renders successfuly', function () {

        Sanctum::actingAs($this->user);
        $this->get($this->url)->assertOK()->assertJsonStructure(['data' => ['title', 'date', 'owner']]);
    });


    it('returns json for 404 status', function () {

        Sanctum::actingAs($this->user);
        $this->get($this->notFoundUrl)->assertStatus(404)->assertJsonStructure(['message']);
    });


    it('returns json for 403 status', function () {

        Sanctum::actingAs($this->user);
        $this->get($this->otherCategoryUrl)->assertStatus(403)->assertJsonStructure(['message']);
    });
});
