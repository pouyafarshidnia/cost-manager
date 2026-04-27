<?php

use App\Models\Category;
use App\Models\User;

beforeEach(function () {

    $this->user = User::factory()->create()->fresh();
    $this->category = Category::factory()->create(['user_id' => $this->user->id])->fresh();
    $this->otherCategory = Category::factory()->create()->fresh();

    $this->url = route('categories.destroy', $this->category);
});



/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {

        $this->delete($this->url)->assertRedirect(route('auth'));
    });

    it('renders successfuly to authenticated owner', function () {

        $this->actingAs($this->user)->delete($this->url)->assertRedirect(route('categories.index'));
    });

    it('denies access to authenticated non-owner user', function () {

        $this->actingAs($this->otherCategory->user)->delete($this->url)->assertForbidden();
    });
});
