<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    public function index(Request $request)
    {
        $ongoing_delivered_items = OrderItem::whereHas('order', function ($query) use ($request) {
            $query->where('user_id', $request->user()->id);
        })->whereNot('status', 'cancelled')->with('product', 'variation', 'order')->get();

        $ongoing_delivered_items->map(function ($item) {
            $item->formatted_created_at = Carbon::parse($item->created_at)->toFormattedDateString();
        });

        $cancelled_items = OrderItem::whereHas('order', function ($query) use ($request) {
            $query->where('user_id', $request->user()->id);
        })->where('status', 'cancelled')->with('product', 'variation', 'order')->get();

        $cancelled_items->map(function ($item) {
            $item->formatted_created_at = Carbon::parse($item->created_at)->toFormattedDateString();
        });

        return view('customer.order.index', compact('ongoing_delivered_items', 'cancelled_items'));
    }
}
