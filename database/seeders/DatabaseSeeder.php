<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReview;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->count(20)->create();

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
