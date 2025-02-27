<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->randomFloat(2, 100, 2000);
        $status = fake()->randomElement(['sheduled', 'published', 'out of stock', 'inactive']);
        $manageStock = fake()->boolean(30);

        return [
            'name' => fake()->words(rand(2, 15), true),
            'sku' => strtoupper(Str::random(10)),
            'type' => fake()->randomElement(['simple', 'variable']),
            'price' => $price,
            'sale_price' => fake()->boolean(30) ? fake()->randomFloat(2, $price * 0.1, $price * 0.5) : null,
            'manage_stock' => $manageStock,
            'stock' => $status === 'out of stock' ? null : ($manageStock ? fake()->numberBetween(1, 30) : null),
            'image' => 'https://picsum.photos/500/500?random=' . rand(1, 1000),
            'description' => fake()->paragraphs(rand(3, 5), true),
            'short_description' => fake()->paragraph(rand(3, 5), true),
            'status' => $status,
            'publish_on' => $status === 'sheduled' ? fake()->dateTimeBetween('today', '+ 3 weeks') : null,
            'visibility' => fake()->randomElement(['public', 'private']),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Product $product) {
            if ($product->type == 'variable') {

                $attributes = [
                    'size' => ['Small', 'Medium', 'Large', 'XL'],
                    'color' => ['Yellow', 'Blue', 'Green', 'Violet', 'Red', 'Gold'],
                ];

                // Step 2: Convert to Collection and randomly select values for each attribute
                foreach ($attributes as $key => $values) {
                    shuffle($values); // Shuffle the values
                    $randomCount = rand(1, count($values)); // Pick a random count
                    $groupedCombinations[$key] = array_slice($values, 0, $randomCount); // Take a subset
                }

                $keys = array_keys($groupedCombinations);
                $values = array_values($groupedCombinations);

                $combinations = [[]];
                foreach ($values as $array) {
                    $newResult = [];

                    foreach ($combinations as $res) {
                        foreach ($array as $value) {
                            $newResult[] = array_merge($res, [$value]);
                        }
                    }
                    $combinations = $newResult;
                }

                foreach ($combinations as $combination) {
                    $attributeAssoc = array_combine($keys, $combination);

                    ProductVariation::factory()->create([
                        'product_id' => $product->id,
                        'attributes' => $attributeAssoc,
                    ]);
                }

            }
        });
    }



}
