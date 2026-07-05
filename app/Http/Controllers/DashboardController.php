<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\View\View;

class DashboardController
{
    public function index(#[CurrentUser] User $user): View
    {
        $categoriesCount = $user->categories->count();
        $costsCount = $user->costs->count();
        $totalCostPrice = '$' . $user->costs()->select('price')->sum('price');

        return view('dashboard.index', compact('categoriesCount', 'costsCount', 'totalCostPrice'));
    }
}
