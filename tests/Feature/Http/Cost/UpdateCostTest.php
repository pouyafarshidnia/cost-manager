<?php

use App\Models\Category;
use App\Models\Cost;

beforeEach(function () {

    $this->cost = Cost::factory()->create()->fresh();
    $this->category = Category::factory()->create(['user_id' => $this->cost->use->id])->fresh();
    $this->otherCost = Cost::factory()->create()->fresh();

    $this->url = route('costs.update', $this->cost);
    $this->data = [
        'category_id' => $this->category->id,
        'title'       => fake()->name(),
        'price'       => fake()->numberBetween(100, 999_999),
        'spent_at'    => fake()->date('j F,Y'),
        'note'        => null
    ];
});



/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {

        $this->put($this->url, $this->data)->assertRedirect(route('auth'));
    });

    it('renders successfuly to authenticated owner', function () {

        $this->actingAs($this->cost->user)->put($this->url, $this->data)->assertRedirect(route('costs.index'));
    });

    it('denies access to authenticated non-owner user', function () {

        $this->actingAs($this->otherCost->user)->put($this->url, $this->data)->assertForbidden();
    });
});


/**
 * Validations
 */
describe('validation tests', function () {

    it('validates category id properly', function (mixed $category_id) {

        $this->actingAs($this->cost->user)->post($this->url, ['category_id' => $category_id])->assertSessionHasErrors('category_id');
    })->with([null, '', 0, fn() => Category::factory()->create()->fresh()->id]);


    it('validates title field properly', function (?string $title) {

        $this->actingAs($this->cost->user)->post($this->url, ['title' => $title])->assertSessionHasErrors('title');
    })->with([null, '', str_repeat('a', 256)]);



    it('validates price field properly', function (mixed $price) {

        $this->actingAs($this->cost->user)->post($this->url, ['price' => $price])->assertSessionHasErrors('price');
    })->with([null, '', 'price', 0, -10]);



    it('validates spent at field properly', function (mixed $spent_at) {

        $this->actingAs($this->cost->user)->post($this->url, ['spent_at' => $spent_at])->assertSessionHasErrors('spent_at');
    })->with([null, '', 'date', 0, -10, 10]);
});
