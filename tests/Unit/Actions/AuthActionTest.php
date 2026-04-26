<?php

use App\Actions\AuthAction;
use App\Models\User;

beforeEach(function () {

    $this->user = User::factory()->create();
    $this->action = new AuthAction;

    $this->googleUserMock = (object) [
        'name'   => $this->user->name,
        'email'  => $this->user->email,
        'avatar' => $this->user->picture,
    ];

    $this->googleNewUserMock = (object) [
        'name'   => fake()->name(),
        'email'  => 'someEmail64135@gmail.com',
        'avatar' => fake()->imageUrl(),
    ];
});


it('returns existing user', function () {

    expect(User::count())->toBe(1);

    $user =  $this->action->handle($this->googleUserMock);

    expect(User::count())->toBe(1)
        ->and($user)->toBeInstanceOf(User::class)
        ->and($user->email)->toBe($this->googleUserMock->email);
});


it('registers new user', function () {

    expect(User::count())->toBe(1);

    $user = $this->action->handle($this->googleNewUserMock);

    expect(User::count())->toBe(2)
        ->and($user)->toBeInstanceOf(User::class)
        ->and($user->email)->toBe($this->googleNewUserMock->email);
});
