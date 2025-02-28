<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    /** @use HasFactory<\Database\Factories\CartItemFactory> */
    use HasFactory;

    protected $fillable = ['product_id', 'variation_id', 'quantity'];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function variation(): BelongsTo
    {
        return $this->belongsTo(ProductVariation::class);
    }

    protected static function booted(): void
    {
        static::saving(function (CartItem $cartItem) {
            $product = Product::find($cartItem->product_id);
            $variation = ProductVariation::find($cartItem->variation_id);

            $price = 0;
            $subdiscount = 0;

            if ($variation) {
                $price = $variation->price;
                $subdiscount = $variation->sale_price ? $variation->price - $variation->sale_price : 0;
            } else {
                $price = $product->price;
                $subdiscount = $product->sale_price ? $product->price - $product->sale_price : 0;
            }

            $total = ($price - $subdiscount) * $cartItem->quantity;

            $cartItem->price = $price;
            $cartItem->discount = $subdiscount;
            $cartItem->sale_price = $price - $subdiscount;
            $cartItem->total = $total;
        });
    }
}
