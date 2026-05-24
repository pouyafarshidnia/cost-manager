<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnalyticController
{
    public function index(Request $request)
    {


        $dateRange = match ($request->date) {
            'monthly',  => DB::raw("SUBSTRING_INDEX(spent_at,'-',2) as date"),
            'yearly',   => DB::raw("SUBSTRING_INDEX(spent_at,'-',1) as date"),
            'daily',    => DB::raw("SUBSTRING_INDEX(spent_at,'-',3) as date"),
            default     => DB::raw("SUBSTRING_INDEX(spent_at,'-',1) as date"),
        };

        $costs =  $request->user()->costs()->select($dateRange, DB::raw('SUM(price) as total'))
            ->groupBy('date')
            ->get();

        $data = $costs->pluck('total', 'date');
        return view('analytics.index', compact('data'));
    }
}
