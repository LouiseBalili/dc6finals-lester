<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use Inertia\Inertia;

class DiscountController extends Controller
{

    public function indexDiscount()
    {
        $discounts = Discount::all();
        return Inertia::render('Discount', ['discounts' => $discounts]);
    }

    public function storeDiscount(Request $request)
    {
        $request->validate([
            'discount' => 'required',
        ]);

        // Check if a discount record already exists
        $existingDiscount = Discount::first();

        if ($existingDiscount) {
            // If a record exists, update it
            $existingDiscount->update($request->all());
        } else {
            // If no record exists, create a new one
            Discount::create($request->all());
        }

        return redirect()->route('indexDiscount');
    }

}
