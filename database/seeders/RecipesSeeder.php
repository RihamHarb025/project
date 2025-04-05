<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Tag;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the recipes
        $recipes = [
            [
                'title' => 'Vegan Avocado Toast',
                'description' => 'A creamy, nutrient-packed breakfast option. Perfect for a quick bite with healthy fats and protein.',
                'category_name' => 'Breakfast',
                'image' => 'imgs/avocado_toast.jpeg',
                'tags' => ['Vegan', 'Gluten-Free', 'Dairy-Free', 'Low-Carb', 'High-Protein'],
                'calories' => 220,
                'servings' => 2,
                'prep_time' => '10 minutes',
            ],
            [
                'title' => 'Quinoa Salad with Roasted Vegetables',
                'description' => 'A colorful and filling salad with quinoa as the base. Packed with fiber and protein for a nutritious meal.',
                'category_name' => 'Lunch',
                'image' => 'imgs/quinoa_salad.jpeg',
                'tags' => ['Vegan', 'Gluten-Free', 'Low-Carb', 'High-Protein', 'High-Fiber'],
                'calories' => 300,
                'servings' => 4,
                'prep_time' => '20 minutes',
            ],
            [
                'title' => 'Keto Chicken Salad Lettuce Wraps',
                'description' => 'A creamy, protein-rich chicken salad served in crunchy lettuce wraps for a low-carb, keto-friendly lunch.',
                'category_name' => 'Lunch',
                'image' => 'imgs/chicken_salad_wraps.jpeg',
                'tags' => ['Keto', 'Gluten-Free', 'Low-Carb', 'High-Protein'],
                'calories' => 350,
                'servings' => 2,
                'prep_time' => '15 minutes',
            ],
            [
                'title' => 'Paleo Sweet Potato Hash',
                'description' => 'A satisfying and nutrient-dense breakfast hash with the sweetness of potatoes and the richness of eggs.',
                'category_name' => 'Breakfast',
                'image' => 'imgs/sweet_potato_hash.jpeg',
                'tags' => ['Paleo', 'Dairy-Free', 'Gluten-Free', 'High-Protein'],
                'calories' => 250,
                'servings' => 2,
                'prep_time' => '25 minutes',
            ],
            [
                'title' => 'Vegan Zucchini Noodles with Pesto',
                'description' => 'Light yet flavorful zucchini noodles with a rich and creamy pesto sauce.',
                'category_name' => 'Dinner',
                'image' => 'imgs/zucchini_noodles_pesto.jpeg',
                'tags' => ['Vegan', 'Gluten-Free', 'Low-Carb', 'Nut-Free'],
                'calories' => 180,
                'servings' => 4,
                'prep_time' => '15 minutes',
            ],
            [
                'title' => 'Chia Pudding with Almond Butter',
                'description' => 'A creamy, dairy-free dessert with chia seeds packed with omega-3s and protein.',
                'category_name' => 'Dessert',
                'image' => 'imgs/chia_pudding.jpeg',
                'tags' => ['Vegan', 'Gluten-Free', 'Dairy-Free', 'Sugar-Free', 'High-Protein'],
                'calories' => 150,
                'servings' => 2,
                'prep_time' => '5 minutes (plus 2-3 hours chill time)',
            ],
            [
                'title' => 'Low-Carb Veggie Stir Fry',
                'description' => 'A quick, colorful stir fry that is keto-friendly and packed with nutrients.',
                'category_name' => 'Dinner',
                'image' => 'imgs/veggie_stir_fry.jpeg',
                'tags' => ['Keto', 'Gluten-Free', 'Low-Carb', 'Vegetarian', 'High-Fiber'],
                'calories' => 200,
                'servings' => 3,
                'prep_time' => '15 minutes',
            ],
            [
                'title' => 'Sugar-Free Coconut Macaroons',
                'description' => 'A chewy, sweet treat without the sugar—perfect for satisfying your dessert cravings!',
                'category_name' => 'Dessert',
                'image' => 'imgs/coconut_macaroons.jpeg',
                'tags' => ['Sugar-Free', 'Gluten-Free', 'Dairy-Free', 'Paleo'],
                'calories' => 120,
                'servings' => 8,
                'prep_time' => '20 minutes',
            ],
            [
                'title' => 'Raw Energy Bites',
                'description' => 'A super simple and nutritious snack, perfect for a post-workout energy boost or an afternoon pick-me-up.',
                'category_name' => 'Snacks',
                'image' => 'imgs/raw_energy_bites.jpeg',
                'tags' => ['Raw', 'Vegan', 'Gluten-Free', 'Nut-Free', 'Sugar-Free', 'High-Protein'],
                'calories' => 120,
                'servings' => 12,
                'prep_time' => '10 minutes',
            ],
            [
                'title' => 'Low-Sodium Chickpea and Avocado Wraps',
                'description' => 'Fresh, creamy, and protein-packed wraps that are perfect for a healthy, sodium-conscious meal.',
                'category_name' => 'Lunch',
                'image' => 'imgs/chickpea_avocado_wraps.jpeg',
                'tags' => ['Vegan', 'Gluten-Free', 'Low-Sodium', 'High-Protein'],
                'calories' => 350,
                'servings' => 2,
                'prep_time' => '10 minutes',
            ]
        ];
        $user = \App\Models\User::first();
        // Iterate through each recipe
        foreach ($recipes as $data) {
            // Create the recipe first
            $recipe = Recipe::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $data['image'],
                'calories' => $data['calories'],
                'servings' => $data['servings'],
                'prep_time' => $data['prep_time'],
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $category = Category::firstOrCreate(
                ['name' => $data['category_name']],  // Find or create the category
                ['image' => 'imgs/' . strtolower(str_replace(' ', '_', $data['category_name'])) . '.jpeg']  // You can customize image logic if needed
            );
    
            // Step 3: Attach the category to the recipe using the pivot table
            $recipe->categories()->syncWithoutDetaching([$category->id]); // syncWithoutDetaching ensures the relationship is added
    
            // Step 4: Ensure the tags exist (create if not)
            foreach ($data['tags'] as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);  // Find or create each tag
                $recipe->tags()->attach($tag->id);  // Attach the tag to the recipe
            }
            // Attach tags to the recipe
            // $tags = Tag::whereIn('name', $data['tags'])->pluck('id'); // Get tag IDs
            // $recipe->tags()->attach($tags); 
        }
    }
}
