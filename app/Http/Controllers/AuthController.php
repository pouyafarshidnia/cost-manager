<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Laravel\Socialite\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request): View
    {
        return view('auth.index');
    }


    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->stateless()->redirect();
    }


    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::whereEmail($googleUser->email)->first();

            if (! is_null($user))
                return $this->login($user);

            $new_user = $this->register($googleUser);
            return $this->login($new_user);
        } catch (\Throwable $th) {
            Log::error('Google auth error: ' . $th->getMessage());
            return redirect()->route('auth');
        }
    }



    private function login(User $user): RedirectResponse
    {
        Auth::login($user);
        return redirect()->route('home');
    }


    private function register($googleUser): User
    {
        return User::create([
            'name'       => $googleUser->name,
            'email'      => $googleUser->email,
            'picture'    => $googleUser->avatar,
        ]);
    }
}
