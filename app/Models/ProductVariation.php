<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariation extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariationFactory> */
    use HasFactory;

    // relations
    // belongs to product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }


    protected function casts(): array
    {
        return [
            'attributes' => 'array',
        ];
    }
}
