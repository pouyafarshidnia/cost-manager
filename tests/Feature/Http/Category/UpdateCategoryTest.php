<?php

use App\Models\Category;
use App\Models\User;

beforeEach(function () {

    $this->user = User::factory()->create()->fresh();
    $this->category = Category::factory()->create(['user_id' => $this->user->id])->fresh();
    $this->otherCategory = Category::factory()->create()->fresh();

    $this->url = route('categories.update', $this->category);
    $this->data = ['title' => fake()->name()];
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


    it('validates title field properly', function (?string $title) {

        $this->actingAs($this->user)->put($this->url, ['title' => $title])->assertSessionHasErrors('title');
    })->with([null, '', str_repeat('a', 256)]);
});
