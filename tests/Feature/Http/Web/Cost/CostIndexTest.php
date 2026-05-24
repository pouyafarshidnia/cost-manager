<?php


beforeEach(function () {

    $this->url = route('costs.index');
});


/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {

        $this->get($this->url)->assertRedirect();
    });


    it('renders successfuly for authenticated user', function () {

        $this->actingAs($this->user)->get($this->url)->assertOk();
    });
});



/**
 * View & Data
 */
describe('view & data tests', function () {

    it('loads proper view & data', function () {

        $this->actingAs($this->user)->get($this->url)
            ->assertViewIs('costs.index')
            ->assertViewHas('costs', function ($costs) {
                return $costs->count() === 8;
            })->assertViewHas('categories', function ($categories) {
                return $categories->count() === 5;
            });
    });
});
