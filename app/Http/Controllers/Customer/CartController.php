<?php

namespace App\Http\Controllers\Customer;

use App\Events\CartUpdated;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        $cart = $this->getItems($cart);


        return view('customer.cart', compact('cart'));
    }

    public function items(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        $cart = $this->getItems($cart);


        return response()->json(['cart' => $cart]);
    }

    protected function getItems($cart)
    {
        $items = [];
        $subtotal = 0;
        $discount = 0;
        $delivery_charge = 0;
        $estimated_tax = 0;
        $total = 0;

        $items = $cart->items;
        $items->load('product', 'variation');

        // cart summary
        $subtotal = $items->sum(function (CartItem $item) {
            $price = 0;
            if ($item->product->type == 'simple') {
                $price = isset($item->product->price) && $item->product->price > 0
                    ? $item->product->price
                    : 0;
            } else {
                $price = isset($item->variation->price) && $item->variation->price > 0
                    ? $item->variation->price
                    : 0;
            }
            return $price * $item->quantity;
        });

        $discount = $items->sum(function (CartItem $item) {
            $discount = 0;
            if ($item->product->type == 'simple') {
                $discount = isset($item->product->sale_price) && $item->product->sale_price > 0
                    ? ($item->product->price - $item->product->sale_price)
                    : 0;
            } else {
                $discount = isset($item->variation->sale_price) && $item->variation->sale_price > 0
                    ? ($item->variation->price - $item->variation->sale_price)
                    : 0;
            }
            return $discount * $item->quantity;
        });

        $total = round($subtotal - $discount, 2);

        $subtotal = Number::currency($subtotal, 'KSH');
        $discount = Number::currency($discount, 'KSH');
        $delivery_charge = Number::currency(0, 'KSH');
        $estimated_tax = Number::currency(0, 'KSH');
        $total = Number::currency($total, 'KSH');
        // end of cart summary

        // looping through items to change some things to a more readable format
        $items->map(function (CartItem $item) {

            if ($item->variation) {

                // cart item with variations
                $price = 0;
                if ($item->variation->sale_price) {
                    $price = $item->variation->sale_price;
                } else {
                    $price = $item->variation->price;
                }
                $item->total = $price * $item->quantity;

                $item->variation->price = Number::currency($item->variation->price ?? 0, 'KSH');
                $item->variation->sale_price = $item->variation->sale_price ? Number::currency($item->variation->sale_price, 'KSH') : null;
                $item->total = Number::currency($item->total, 'KSH');
            } else {
                // cart item without variation
                $price = 0;
                if ($item->product->sale_price) {
                    $price = $item->product->sale_price;
                } else {
                    $price = $item->product->price;
                }
                $item->total = $price * $item->quantity;

                $item->product->price = Number::currency($item->product->price ?? 0, 'KSH');
                $item->product->sale_price = $item->product->sale_price ? Number::currency($item->product->sale_price, 'KSH') : null;
                $item->total = Number::currency($item->total, 'KSH');
            }

        });


        return [
            'items' => $items,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'delivery_charge' => $delivery_charge,
            'estimated_tax' => $estimated_tax,
            'total' => $total,
        ];
    }
    public function update(Request $request)
    {
        $user = $request->user();

        $cart = Cart::where('user_id', $user->id)->first();

        $productId = $request->product_id;
        $variationId = $request->variation_id;
        $quantity = $request->quantity;

        if ($cart) {
            $cart->items()->updateOrCreate(
                ['product_id' => $productId, 'variation_id' => $variationId],
                ['quantity' => $quantity]
            );

            $message = 'Cart updated';
        } else {
            $cart = Cart::create([
                'user_id' => $user->id
            ]);

            $cart->items()->create([
                ['product_id' => $productId, 'variation_id' => $variationId, 'quantity' => $quantity],
            ]);

            $message = 'Item added to the cart';
        }

        broadcast(new CartUpdated($cart));

        return response()->json(['message' => $message], 200);
    }

    public function destroy(Request $request)
    {
        $itemId = $request->item;

        if ($itemId) {
            CartItem::destroy($itemId);

            $message = 'Item has been deleted';
        } else {
            $request->user()->cart->items()->delete();

            $message = 'Cart cleared';
        }

        broadcast(new CartUpdated($request->user()->cart));

        return response()->json(['message' => $message], 200);
    }
}
