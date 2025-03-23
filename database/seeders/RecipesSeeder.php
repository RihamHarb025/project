<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Recipe;
use App\Models\Customer;
class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all customer IDs to ensure valid foreign keys
        $customerIDs = Customer::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Recipe::create([ 
                'customerID' => $faker->randomElement($customerIDs), // Use valid customer IDs
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => $faker->imageUrl(640, 480, 'food'),
               // 'categories' => $faker->randomElement(['Dessert', 'Main Course', 'Appetizer', 'Breakfast']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    }

