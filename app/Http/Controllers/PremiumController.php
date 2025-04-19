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

    // Handle the subscription after payment
    public function subscribe(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'plan' => 'required|string',  // Plan is a string, no need for numeric validation here
            'card_number' => 'required|string', // Assuming you are not using Stripe, you can handle card number here if needed
        ]);

        try {
            // Get the authenticated user
            $user = auth()->user();

            // Update user's is_premium status to true
            $user->is_premium = true;
            $user->save();

            // Redirect to meal plan premium page
            return redirect()->route('mealplan.premium')->with('success', 'Payment successful! Welcome to Premium.');
        } catch (\Exception $e) {
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}
