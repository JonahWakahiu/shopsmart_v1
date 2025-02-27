<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    // relationships
    // one to Many relations with variations
    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    // one to many relations with ProductImage
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    // one to many relationship with Product reviews
    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    // get the default variation
    public function defaultVariation()
    {
        return $this->variations()->where('default', true)->first() ?? $this->variations()->first();
    }
}
