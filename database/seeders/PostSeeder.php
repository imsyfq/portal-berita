<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()
            ->has(Category::factory()->count(rand(1, 4)))
            ->count(5)->create();

        // trending post seeder
        Post::factory(40)
            // ->hasCategories(rand(1, 4))
            ->has(Category::factory()->count(rand(1, 4)))
            ->create(['views' => rand(100, 1500)]);
    }
}
