<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{
    /** @use HasFactory<\Database\Factories\ProductReviewFactory> */
    use HasFactory;

    protected $fillable =
        [
            'title',
            'rating',
            'message',
            'anonymous',
            'user_id',
            'product_id',
            'item_id',
        ];

    // relationships
    // each review belongs to a product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class, 'item_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
