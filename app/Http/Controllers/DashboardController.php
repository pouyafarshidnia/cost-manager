<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController
{
    public function index(Request $request): View
    {
        $categoryCount = $request->user()->categories->count();
        return view('dashboard.index', compact('categoryCount'));
    }
}
