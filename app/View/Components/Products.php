<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Number;
use Illuminate\View\Component;

class Products extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $products = Product::with('reviews')->withCount('reviews')->take(24)->get();

        $products->map(function (Product $product) {
            if ($product->type == 'simple') {
                if (isset($product->sale_price) && $product->sale_price > 0) {
                    $product->discount = Number::percentage((($product->sale_price * 100) / $product->price) - 100);
                    $product->sale_price = Number::currency($product->sale_price, 'KSH');
                }
                $product->price = Number::currency($product->price, 'KSH');

            } else {
                $minPrice = $product->variations->min('price');
                $maxPrice = $product->variations->max('price');
                $product->price = Number::currency($minPrice, 'ksh') . ' - ' . Number::currency($maxPrice, 'ksh');
            }

            if ($product->reviews_count > 0) {
                $product->average_rating = round($product->reviews->avg('rating'));
            }
            return $product;
        });
        return view('components.products', compact('products'));
    }
}
