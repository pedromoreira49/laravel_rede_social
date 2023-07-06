<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => fake()->word(),
            'user_id' => fake()->randomNumber(),
            'content' => fake()->paragraph(),
        ];
    }
}