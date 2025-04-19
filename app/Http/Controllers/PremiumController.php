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

    // Display the payment page for the selected plan
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
        'plan' => 'required|string',
        'card_number' => 'required|string', // We're not validating card numbers seriously
    ]);

    $user = auth()->user();
    $user->is_premium = true;
    $user->save();

    return redirect()->route('mealplan')->with('success', 'Payment successful! You are now a premium member!');

    // Handle the subscription after payment
   
    }
}
