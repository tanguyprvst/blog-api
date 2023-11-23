<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(9)->create();

        Category::factory(6)->create();

        User::factory()->has(
                Post::factory(),
         )->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);
    }
}
