<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

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
        'plan' => 'required|string',
        'card_number' => 'required|string',
    ]);

    $user = auth()->user();
    $user->is_premium = true;
    $user->save();

    $amount = 0;

   
    if ($request->plan === '1-Month Plan') {
        $amount = 9.99;
    } elseif ($request->plan === '3-Month Plan') {
        $amount = 24.99;
    }

    Payment::create([
        'user_id' => $user->id,
        'plan' => $request->plan,
        'amount' => $amount,
    ]);

    return redirect()->route('mealplan')->with('success', 'Payment successful! You are now a premium member!');

  
   
    }
}
