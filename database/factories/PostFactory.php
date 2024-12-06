<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(4);

        $rand = rand(1, 1000);

        return [
            'admin_id' => Admin::factory(),
            'title' => $title,
            'content' => $this->faker->paragraphs(3, true),
            'image' => "https://picsum.photos/640/400?randotrand-right-imgm=$rand",
            'slug' => Str::slug($title),
            'yt_embed' => $this->faker->word(),
            'views' => $this->faker->randomNumber(),
        ];
    }
}
