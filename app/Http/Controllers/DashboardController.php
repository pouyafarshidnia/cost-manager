<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController
{
    public function index(): View
    {
        return view('dashboard.index');
    }
}
