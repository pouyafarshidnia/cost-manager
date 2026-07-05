<?php

namespace App\Http\Controllers;

use Illuminate\View\View;


class AuthController
{
    public function __invoke(): View
    {
        return view('auth.index');
    }
}
