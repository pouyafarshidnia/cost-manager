<?php

namespace App\Http\Controllers;

use App\Actions\AuthAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Socialite;

class GoogleAuthController
{

    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->stateless()->redirect();
    }


    public function callback(AuthAction $action): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = $action->handle($googleUser);
            Auth::login($user);
            return redirect()->route('home');
        } catch (\Throwable $th) {
            Log::error('Google auth error: ' . $th->getMessage());
            return redirect()->route('auth');
        }
    }
}
