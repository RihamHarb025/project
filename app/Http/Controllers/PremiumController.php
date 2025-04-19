<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PremiumController extends Controller
{
    public function showPlans()
{
    $plans = [
        ['id' => 1, 'name' => '1-Month Plan', 'price' => 9.99],
        ['id' => 2, 'name' => '3-Month Plan', 'price' => 24.99],
    ];

    return view('premium.plans', compact('plans'));
}

public function paymentPage($plan)
{
    $selectedPlan = [
        1 => ['name' => '1-Month Plan', 'price' => 9.99],
        2 => ['name' => '3-Month Plan', 'price' => 24.99],
    ][$plan] ?? abort(404);

    return view('premium.payment', compact('selectedPlan'));
}

public function subscribe(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'stripeToken' => 'required',
        'plan' => 'required|numeric'
    ]);

    try {
        
        
        $user = auth()->user();
        $user->is_premium = true;
        $user->save();

        return redirect()->route('mealplan')->with('success', 'Payment successful! Welcome to Premium.');
    } catch (\Exception $e) {
        return back()->with('error', 'Payment failed: ' . $e->getMessage());
    }
}
}
