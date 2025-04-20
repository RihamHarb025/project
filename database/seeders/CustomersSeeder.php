<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Customer;
class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Customer::create([
                'username' => $faker->userName,
                'is_admin' => $faker->boolean,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), 
                'bio' => $faker->paragraph,
                'image-profile' => $faker->imageUrl(640, 480, 'people'),
                'preference' => $faker->randomElement(['Vegetarian', 'Non-Vegetarian', 'Vegan']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
