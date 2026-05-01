<?php

use App\Models\Category;


beforeEach(function () {

    $this->url = route('costs.store');
    $this->category = Category::factory()->create()->fresh();
    $this->otherCategory = Category::factory()->create()->fresh();
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

        $this->post($this->url, $this->data)->assertRedirect(route('auth'));
    });

    it('renders successfuly for authenticated user', function () {

        $this->actingAs($this->category->user)->post($this->url, $this->data)->assertRedirect(route('costs.index'));
    });
});


/**
 * Validations
 */
describe('validation tests', function () {

    it('validate category id properly', function (?int $category_id) {

        $this->actingAs($this->category->user)->post($this->url, ['category_id' => $category_id])->assertSessionHasErrors('category_id');
    })->with([null, '', 0, $this->otherCategor->id]);


    it('validates title field properly', function (?string $title) {

        $this->actingAs($this->category->user)->post($this->url, ['title' => $title])->assertSessionHasErrors('title');
    })->with([null, '', str_repeat('a', 256)]);



    it('validates price field properly', function (?string $price) {

        $this->actingAs($this->category->user)->post($this->url, ['price' => $price])->assertSessionHasErrors('price');
    })->with([null, '', 'price', 0, -10]);



    it('validates spent at field properly', function (?string $spent_at) {

        $this->actingAs($this->category->user)->post($this->url, ['spent_at' => $spent_at])->assertSessionHasErrors('spent_at');
    })->with([null, '', 'date', 0, -10, 10]);
});
