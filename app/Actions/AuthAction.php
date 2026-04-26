<?php


namespace App\Actions;

use App\Models\User;

class AuthAction
{

    public function handle($googleUser): User
    {
        $user = User::whereEmail($googleUser->email)->first();
        if (! is_null($user))
            return $user;

        return User::create([
            'name'       => $googleUser->name,
            'email'      => $googleUser->email,
            'picture'    => $googleUser->avatar,
        ]);
    }
}
