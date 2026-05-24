<?php


beforeEach(function () {

    $this->url = route('categories.store');
    $this->data = ['title' => fake()->name()];
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


    it('validates title field properly', function (?string $title) {

        $this->actingAs($this->user)->post($this->url, ['title' => $title])->assertSessionHasErrors('title');
    })->with([null, '', str_repeat('a', 256)]);
});
