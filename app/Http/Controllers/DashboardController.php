<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController
{
    public function index(Request $request): View
    {
        $categoriesCount = $request->user()->categories->count();
        $costsCount = $request->user()->costs->count();
        return view('dashboard.index', compact('categoriesCount', 'costsCount'));
    }
}
