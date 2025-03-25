<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['name' => 'Breakfast', 'image' => 'imgs/breakfast.jpeg'],
            ['name' => 'Lunch', 'image' => 'imgs/lunch.jpeg'],
            ['name' => 'Dinner', 'image' => 'imgs/dinner.jpeg'],
            ['name' => 'Dessert', 'image' => 'imgs/dessert.jpeg'],
            ['name' => 'Snacks', 'image' => 'imgs/snacks.jpeg'],
        ];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'image' => $category['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
