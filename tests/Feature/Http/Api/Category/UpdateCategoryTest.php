<?php

use Laravel\Sanctum\Sanctum;

beforeEach(function () {

    $this->url = route('api.v1.categories.update', $this->category);
    $this->notFoundUrl = route('api.v1.categories.update', ['category' => 999]);
    $this->otherCategoryUrl = route('api.v1.categories.update', ['category' => 2]);

    $this->data = ['title' => 'updated Category'];
});




/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {

        $this->put($this->url)->assertRedirect();
    });


    it('returns json for 404 status', function () {
        Sanctum::actingAs($this->user);
        $this->put($this->notFoundUrl, $this->data)->assertStatus(404)->assertJsonStructure(['message']);
    });



    it('returns json for 403 status', function () {

        Sanctum::actingAs($this->user);
        $this->put($this->otherCategoryUrl, $this->data)->assertStatus(403)->assertJsonStructure(['message']);
    });


    it('renders successfuly', function () {
        Sanctum::actingAs($this->user);
        $this->put($this->url, $this->data)->assertStatus(202)->assertJsonStructure(['message']);
    });
});
