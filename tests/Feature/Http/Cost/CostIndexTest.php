<?php

use App\Models\Category;
use App\Models\Cost;
use App\Models\User;

beforeEach(function () {

    $this->url = route('costs.index');
    $this->user = User::factory()->create()->fresh();
    $this->category = Category::factory()->create(['user_id' => $this->user->id])->fresh();
    Cost::factory()->count(5)->create(['user_id' => $this->user->id, 'category_id' => $this->category->id]);
    Cost::factory()->count(3)->create();

    $this->cost = $this->user->costs()->first();
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
                return $costs->count() === 5;
            })->assertViewHas('categories', function ($categories) {
                return $categories->count() === 1;
            });
    });
});
