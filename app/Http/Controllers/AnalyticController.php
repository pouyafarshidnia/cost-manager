<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticController
{
    public function index()
    {
        return view('analytics.index');
    }
}
