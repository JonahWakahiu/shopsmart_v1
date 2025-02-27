<?php

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('users.{id}', function (User $user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('cart.{cartId}', function (User $user, $cartId) {
    return (int) $user->id === (int) Cart::findOrNew($cartId)->user_id;
});
