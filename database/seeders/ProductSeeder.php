<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory()
            ->has(ProductImage::factory()->count(rand(9, 15)), 'images')
            ->count(50)->create();

        $products->random(10)->each(function (Product $product) {
            ProductReview::factory()->count(rand(5, 15))->create([
                'product_id' => $product->id
            ]);
        });
    }
}
