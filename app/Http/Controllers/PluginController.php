<?php

namespace App\Http\Controllers;


use App\Models\Plugin;
use App\Models\Discount;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PluginController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $query = Plugin::query();

        // Add date filter logic if start and end dates are provided
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $plugins = $query->get();
        $discounts = Discount::all();

        return Inertia::render('Index', [
            'plugins' => $plugins,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'discounts' => $discounts
        ]);
    }




    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'daws' => 'required',
            'price' => 'required',

        ]);

        Plugin::create($request->all());

        return redirect()->route('index');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'daws' => 'required',
            'price' => 'required',
        ]);

        $plugin = Plugin::findOrFail($id);
        $plugin->update($request->all());

        return redirect()->route('index');
    }
    public function destroy($id)
    {
        $plugin = Plugin::findOrFail($id);
        $plugin->delete();

        return redirect()->route('index');
    }


}
