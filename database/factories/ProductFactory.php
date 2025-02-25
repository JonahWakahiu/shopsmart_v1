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
            $attributes = [
                'size' => ['Small', 'Medium', 'Large', 'XL'],
                'color' => ['Yellow', 'Blue', 'Green', 'Violet', 'Red', 'Gold'],
            ];

            $selectedAttributes = collect($attributes)->map(fn($values) => collect($values)->random(rand(1, count($values)))->all())->toArray();

            if ($product->type == 'variable') {
                $product->attributes = $selectedAttributes;
                $product->save();

                // generate random variation based on selected attributes
                $combinations = $this->randomCombinations($selectedAttributes);

                foreach ($combinations as $combination) {
                    ProductVariation::factory()->create([
                        'product_id' => $product->id,
                        'attributes' => json_encode($combination),
                    ]);
                }
            }

            ProductImage::factory()->count(rand(4, 7))->create([
                'product_id' => $product->id,
            ]);

        });
    }

    protected function randomCombinations(array $attributes)
    {
        $keys = array_keys($attributes);
        $values = array_values($attributes);

        $combinations = [[]];

        foreach ($values as $index => $valueSet) {
            $temp = [];

            foreach ($combinations as $combination) {
                foreach ($valueSet as $value) {
                    $combination[$keys[$index]] = $value;
                    $temp[] = $combination;
                }
            }
            $combinations = $temp;
        }

        return collect($combinations)->random(rand(1, count($combinations)))->all();
    }

}
