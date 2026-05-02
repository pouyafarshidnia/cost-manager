<?php

use App\Actions\AuthAction;
use App\Models\User;

beforeEach(function () {

    $this->user = User::find(1);
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

    $user =  $this->action->handle($this->googleUserMock);

    expect($user->id)->toBe($this->user->id)
        ->and($user)->toBeInstanceOf(User::class)
        ->and($user->email)->toBe($this->googleUserMock->email);
});


it('registers new user', function () {

    $usersCount = User::count();

    $user = $this->action->handle($this->googleNewUserMock);

    expect(User::count())->toBe($usersCount + 1)
        ->and($user)->toBeInstanceOf(User::class)
        ->and($user->email)->toBe($this->googleNewUserMock->email);
});
