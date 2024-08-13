<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductComment>
 */
class ProductCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence,
            'vote_start' => $this->faker->numberBetween(1, 5),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            'user_id' => User::all()->random()->id,
            'product_id' => Product::all()->random()->id,
        ];
    }
}
