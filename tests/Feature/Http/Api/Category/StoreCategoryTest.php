<?php

use Laravel\Sanctum\Sanctum;

beforeEach(function () {

    $this->url = route('api.v1.categories.store');

    $this->data = ['title' => 'New Category'];
});




/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {
        $this->post($this->url, $this->data)->assertRedirect();
    });


    it('initial test', function () {

        Sanctum::actingAs($this->user);
        $this->post($this->url, $this->data)->assertStatus(201)->assertJsonStructure(['message']);
    });
});


/**
 * Validation Tests
 */
describe('validation tests', function () {


    it('validates title field properly', function (?string $title) {

        Sanctum::actingAs($this->user);
        $this->post($this->url, ['title' => $title])->assertStatus(422)->assertJsonStructure(['success', 'message', 'data' => ['title']]);
    })->with([null, '', str_repeat('a', 256)]);
});
