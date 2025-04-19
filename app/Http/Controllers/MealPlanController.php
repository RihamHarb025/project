<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function index()
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    if (auth()->user()->is_premium) {
        $chefPlans = [
            [
                'name' => "Chef's Signature",
                'description' => "Gourmet meals designed by our executive chef",
                'image' => "https://images.unsplash.com/photo-1546069901-ba9599a7e63c",
                'features' => [
                    '5-course dinner options',
                    'Wine pairing suggestions',
                    'Step-by-step video guides'
                ]
            ],
            [
                'name' => "Healthy Gourmet",
                'description' => "Nutritious meals that don't compromise on taste",
                'image' => "https://images.unsplash.com/photo-1512621776951-a57141f2eefd",
                'features' => [
                    'Dietitian-approved',
                    'Macro-balanced',
                    '30-minute prep time'
                ]
            ],
            [
                'name' => "Global Cuisine",
                'description' => "Travel the world through your tastebuds",
                'image' => "https://images.unsplash.com/photo-1490645935967-10de6ba17061",
                'features' => [
                    '3 international dishes',
                    'Authentic ingredients guide',
                    'Cultural background notes'
                ]
            ]
        ];

        return view('mealplan.premium', compact('chefPlans'));
    }

    return view('mealplan.standard');
}}

