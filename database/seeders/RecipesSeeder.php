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
            ]
        ];

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
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Find the category by name (this is assuming your categories already exist)
            $category = Category::where('name', $data['category_name'])->first();

            // Link the recipe to the category using the pivot table (many-to-many relationship)
            if ($category) {
                $recipe->categories()->attach($category->id); // Assuming you have a categories() method in the Recipe model
            }

            // Attach tags to the recipe
            $tags = Tag::whereIn('name', $data['tags'])->pluck('id'); // Get tag IDs
            $recipe->tags()->attach($tags); // Assuming you have a tags() method in the Recipe model
        }
    }
}
