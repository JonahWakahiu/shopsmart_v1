<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use App\View\Components\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $prevNumber = $request->query('prevNumber', 24);
        $number = Product::count() <= $prevNumber ? Product::count() : $prevNumber + 24;

        $products = Product::with('reviews')->withCount('reviews')->take($number)->get();

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

        return response()->json(['products' => $products, 'currNumber' => $number], 200);
    }

    public function listing(Product $product)
    {
        $product_details = $this->getProductVariation($product->id);
        // dd($product_details);
        return view('customer.product-details', compact('product_details'));
    }


    public function changeProductVariation(Request $request)
    {
        $productId = $request->query('product_id', 0);
        $variationAttributes = $request->query('variation_attributes', []);

        $product_details = $this->getProductVariation($productId, $variationAttributes);

        return response()->json($product_details);
    }

    protected function getProductVariation($productId, $variationAttributes = null)
    {
        $product = Product::where('id', $productId)->with('images', 'reviews.user', 'variations')->withCount('reviews', 'variations')->first();

        if ($product->reviews_count > 0) {
            $product->average_rating = round($product->reviews->avg('rating'), 1);

            $product->reviews->map(function (ProductReview $review) {
                $review->formatted_created_date = Carbon::parse($review->created_at)->toFormattedDateString();
            });
        }

        if ($product->type == 'simple') {
            if (isset($product->sale_price) && $product->sale_price > 0) {
                $product->discount = Number::percentage((($product->sale_price * 100) / $product->price) - 100);
                $product->sale_price = Number::currency($product->sale_price, 'KSH');
            }
            $product->price = Number::currency($product->price, 'KSH');


        } else {
            if ($product->variations_count > 0) {
                foreach ($product->variations as $variation) {
                    foreach ($variation->attributes as $key => $value) {
                        $attributes[$key][] = $value;
                    }
                }

                foreach ($attributes as $key => $value) {
                    $attributes[$key] = array_unique($value);
                }

                if ($variationAttributes) {
                    $variation = $product->variations()->whereJsonContains('attributes', $variationAttributes)->first();

                } else {
                    $variation = $product->defaultVariation();
                }

                if (isset($variation->sale_price) && $variation->sale_price > 0) {
                    $variation->discount = Number::percentage((($variation->sale_price * 100) / $variation->price) - 100);
                    $variation->sale_price = Number::currency($variation->sale_price, 'KSH');
                }
                $variation->price = Number::currency($variation->price, 'KSH');
            }
        }


        return [
            'product' => $product,
            'variation' => $variation ?? null,
            'attributes' => $attributes ?? null,
        ];
    }
}
