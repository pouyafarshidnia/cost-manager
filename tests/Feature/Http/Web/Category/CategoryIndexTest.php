<?php


beforeEach(function () {
    $this->url = route('categories.index');
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
            ->assertViewIs('categories.index')
            ->assertViewHas('categories', function ($categories) {
                return $categories->count() === 5;
            });
    });
});
