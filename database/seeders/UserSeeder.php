<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $images = [
            'imgs/defaultGreen.jpeg',
            'imgs/defaultRed.jpeg',
            'imgs/defaultPurple.jpeg',
            'imgs/defaultPink.jpeg',
            'imgs/defaultBrown.jpeg',
            'imgs/defaultSage.jpeg',
            'imgs/defaultOrange.jpeg',
            'imgs/defaultBlue.jpeg',
                    
        ];
        // User::create([
        //     'name' => 'adminuser',
        //     'username' => 'adminuser',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('adminpassword'), 
        //     'bio' => $faker->sentence(),
        //     'image_profile' => 'https://via.placeholder.com/640x480.png/004422?text=admin',
        //     'preference' => 'none',
        //     'is_admin' => true,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        
        $tags = Tag::pluck('name')->toArray(); 
        for ($i = 0; $i < 10; $i++) { 
            $user = User::create([
                'name'=>$faker->name,
                'username' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'), 
                'bio' => $faker->sentence(),
                'image_profile' => $faker->randomElement($images),
                'preference' => $faker->randomElement($tags),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
