<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tags = [
            'Gluten-Free',
            'Dairy-Free',
            'Keto',
            'Paleo',
            'Low-Carb',
            'Nut-Free',
            'Vegetarian',
            'Sugar-Free',
            'Whole30',
            'Raw',
            'Low-Sodium',
            'High-Protein',
            'High-Fiber',
        ];
        foreach ($tags as $tag) {
            // Check if the tag already exists
            if (!Tag::where('name', $tag)->exists()) {
                Tag::create(['name' => $tag]);
            }
        }
    }
}
