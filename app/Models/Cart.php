<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $fillable = ['user_id'];

    //  relationships
    // cart belong to one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // cart has many items (product / variation)
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

}
