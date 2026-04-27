<?php

use App\Models\Category;
use App\Models\User;

beforeEach(function () {

    $this->user = User::factory()->create()->fresh();
    $this->category = Category::factory()->create(['user_id' => $this->user->id])->fresh();
    $this->otherCategory = Category::factory()->create()->fresh();

    $this->url = route('categories.update', $this->category);
    $this->data = ['name' => fake()->name()];
});



/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {

        $this->put($this->url, $this->data)->assertRedirect(route('auth'));
    });

    it('renders successfuly to authenticated owner', function () {

        $this->actingAs($this->user)->put($this->url, $this->data)->assertRedirect(route('categories.index'));
    });

    it('denies access to authenticated non-owner user', function () {

        $this->actingAs($this->otherCategory->user)->put($this->url, $this->data)->assertForbidden();
    });
});


/**
 * Validations
 */
describe('validation tests', function () {


    it('validates name field properly', function (?string $name) {

        $this->actingAs($this->user)->put($this->url, ['name' => $name])->assertSessionHasErrors('name');
    })->with([null, '', str_repeat('a', 256)]);
});
