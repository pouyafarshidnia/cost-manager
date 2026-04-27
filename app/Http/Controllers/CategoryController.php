<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController
{
    public function index(Request $request): View
    {
        $categories = $request->user()->categories;
        return view('categories.index', compact('categories'));
    }
}
