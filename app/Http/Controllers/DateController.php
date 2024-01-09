<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Plugin;
use Carbon\Carbon;

class DateController extends Controller
{
    public function dateIndex()
    {
        $plugins = Plugin::all(['name', 'created_at']); // Fetch plugins with creation date

        $events = $plugins->map(function ($plugin) {
            return [
                'title' => $plugin->name,
                'start' => Carbon::parse($plugin->created_at)->toDateString(),
            ];
        });

        return Inertia::render('Date', [
            'events' => $events,
        ]);
    }
}
