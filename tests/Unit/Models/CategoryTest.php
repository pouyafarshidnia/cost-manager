<?php


use App\Models\User;



/**
 * Columns
 */
test('to array', function () {

    $model_fields = array_keys($this->category->toArray());

    $expected_fields = [
        'id',
        'user_id',
        'title',
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

    it('belongs to s user', function () {

        expect($this->category->user)->toBeInstanceOf(User::class);
    });


    it('has many costs', function () {
        expect($this->category->costs->count())->toBe(8);
    });
});
