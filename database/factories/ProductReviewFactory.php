<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductReview>
 */
class ProductReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentences(rand(1, 3), true),
            'rating' => fake()->numberBetween(1, 5),
            'message' => fake()->paragraph(rand(3, 6), true),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
