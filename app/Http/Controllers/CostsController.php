<?php

namespace App\Http\Controllers;

use App\Actions\Cost\DeleteCostAction;
use App\Actions\Cost\StoreCostAction;
use App\Actions\Cost\UpdateCostAction;
use App\Http\Requests\Cost\StoreCostRequest;
use App\Http\Requests\Cost\UpdateCostRequest;
use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CostsController
{
    public function index(Request $request): View
    {
        $categories = $request->user()->categories;
        $costs = $request->user()->costs()->filter($request->all())->paginate($request->perPage)->withQueryString();
        return view('costs.index', compact('costs', 'categories'));
    }


    public function store(StoreCostRequest $request, StoreCostAction $action): RedirectResponse
    {
        $action->handle($request->user(), $request->except('_token'));
        return to_route('costs.index')->with('success', 'The cost has been created');
    }



    public function update(UpdateCostRequest $request, Cost $cost, UpdateCostAction $action): RedirectResponse
    {
        Gate::authorize('update', $cost);

        $action->handle($cost, $request->except('_token', '_method'));
        return to_route('costs.index')->with('success', 'The cost has been updated');
    }


    public function destroy(Cost $cost, DeleteCostAction $action): RedirectResponse
    {
        Gate::authorize('delete', $cost);

        $action->handle($cost);
        return to_route('costs.index')->with('success', 'The cost has been deleted');
    }
}
