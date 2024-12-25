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
        $categories = Category::factory()->count(20)->create();

        // random posts
        Post::factory()
            ->count(5)
            ->create()
            ->each(function ($post) use ($categories) {
                $post->categories()->attach(
                    $categories->random(rand(1, 4))->pluck('id')->toArray()
                );
            });

        // trending post
        Post::factory()
            ->count(40)
            ->create(['views' => rand(100, 1500)])
            ->each(function ($post) use ($categories) {
                $post->categories()->attach(
                    $categories->random(rand(1, 4))->pluck('id')->toArray()
                );
            });
    }
}
