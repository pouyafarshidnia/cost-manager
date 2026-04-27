<?php

use App\Models\User;

beforeEach(function () {

    $this->url = route('categories.store');
    $this->user = User::factory()->create()->fresh();
    $this->data = ['name' => fake()->name()];
});



/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {

        $this->post($this->url, $this->data)->assertRedirect(route('auth'));
    });

    it('renders successfuly for authenticated user', function () {

        $this->actingAs($this->user)->post($this->url, $this->data)->assertRedirect(route('categories.index'));
    });
});


/**
 * Validations
 */
describe('validation tests', function () {


    it('validates name field properly', function (?string $name) {

        $this->actingAs($this->user)->post($this->url, ['name' => $name])->assertSessionHasErrors('name');
    })->with([null, '', str_repeat('a', 256)]);
});
