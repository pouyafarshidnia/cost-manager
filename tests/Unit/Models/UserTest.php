<?php

use App\Models\Category;
use App\Models\Cost;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create()->fresh();
    Category::factory()->count(5)->create(['user_id' => $this->user->id]);
    Category::factory()->count(3)->create();

    Cost::factory()->count(6)->create(['user_id' => $this->user->id]);
    Cost::factory()->count(1)->create();
});



/**
 * Columns
 */
test('to array', function () {

    $model_fields = array_keys($this->user->toArray());

    $expected_fields = [
        'id',
        'name',
        'email',
        'picture',
        'created_at',
        'updated_at',
    ];

    sort($model_fields);
    sort($expected_fields);

    expect($model_fields)->toEqual($expected_fields);
});



/**
 * Relations
 */
describe('relation tests', function () {

    it('has many categories', function () {

        expect($this->user->categories)->toHaveCount(5);
    });

    it('has many costs', function () {
        expect($this->user->costs->count())->toBe(6);
    });
});
