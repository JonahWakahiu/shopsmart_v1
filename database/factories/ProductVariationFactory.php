<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariation>
 */
class ProductVariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->randomFloat(2, 100, 2000);
        $manageStock = fake()->boolean(30);

        return [
            'image' => 'https://picsum.photos/500/500?random=' . rand(1, 1000),
            'sku' => fake()->boolean(30) ? strtoupper(Str::random(10)) : null,
            'price' => $price,
            'sale_price' => fake()->boolean(30) ? fake()->randomFloat(2, $price * 0.1, $price * 0.5) : null,
            'manage_stock' => $manageStock,
            'stock' => $manageStock ? fake()->numberBetween(1, 30) : null,
            'description' => fake()->paragraph(rand(3, 5), true),
        ];
    }
}
