<?php

use App\Models\Category;
use App\Models\Cost;
use App\Models\User;
use Illuminate\Support\Carbon;

beforeEach(function () {
    $this->cost = Cost::factory()->create()->fresh();
});



/**
 * Columns
 */
test('to array', function () {

    $model_fields = array_keys($this->category->toArray());

    $expected_fields = [
        'id',
        'user_id',
        'category_id',
        'title',
        'price',
        'date',
        'note',
        'created_at',
        'updated_at',
    ];

    sort($model_fields);
    sort($expected_fields);

    expect($model_fields)->toEqual($expected_fields);
});



/**
 * Casts
 */
describe('casts tests', function () {

    it('casts date to date', function () {

        expect($this->cost->date)->toBeInstanceOf(Carbon::class);
    });
});


/**
 * Relations
 */
describe('relation tests', function () {

    it('belongs to s user', function () {

        expect($this->cost->user)->toBeInstanceOf(User::class);
    });


    it('belongs to s category', function () {

        expect($this->cost->user)->toBeInstanceOf(Category::class);
    });
});
