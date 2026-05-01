<?php

use App\Models\User;

beforeEach(function () {

    $this->user = User::factory()->create();
    $this->url = route('home');
});



/**
 * Status tests
 */
describe('http status tests', function () {

    it('denies a guest', function () {
        $this->get($this->url)->assertRedirect();
    });

    it('renders successfuly', function () {

        $this->actingAs($this->user)->get($this->url)->assertOK();
    });
});



/**
 * View & Data
 */
describe('view & data tests', function () {

    it('loads proper view', function () {
        $this->actingAs($this->user)->get($this->url)->assertViewIs('dashboard.index')
            ->assertViewHas('categoryCount');
    });
});
