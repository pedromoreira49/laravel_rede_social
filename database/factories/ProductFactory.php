<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => fake()->word(),
            'user_id' => fake()->randomNumber(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 10000)
        ];
    }
}