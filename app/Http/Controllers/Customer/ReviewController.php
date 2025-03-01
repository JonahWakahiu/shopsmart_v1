<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductReview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(Request $request): View
    {
        $pendingReviews = OrderItem::doesntHave('review')
            ->whereHas('order', function ($query) use ($request) {
                $query->where('user_id', $request->user()->id);
            })->where('status', 'delivered')->with('product', 'variation', 'order', 'review')->get();

        $pendingReviews->map(function ($item) {
            $item->formatted_created_at = Carbon::parse($item->created_at)->toFormattedDateString();
        });

        return view('customer.pending-reviews', compact('pendingReviews'));
    }

    public function create(Request $request, OrderItem $item): View
    {
        $item->load('product', 'variation', 'order');
        $item->formatted_created_at = Carbon::parse($item->created_at)->toFormattedDateString();
        return view('customer.create-review', compact('item'));
    }

    public function store(Request $request, OrderItem $item)
    {
        $request->validate([
            'title' => 'nullable|string|min:2',
            'message' => 'required|string|min:2',
        ]);

        try {
            $anonymous = $request->boolean('anonymous');

            $review = ProductReview::create([
                'rating' => $item->id,
                'title' => $request->title,
                'message' => $request->message,
                'anonymous' => $anonymous,
                'item_id' => $item->id,
                'product_id' => $item->product->id,
            ]);

            if (!$anonymous) {
                $review->user()->associate($request->user());
                $review->save();
            }

            return redirect()->route('customer.reviews.index');

        } catch (\Throwable $th) {
            dd($th->getMessage());
            abort(500);
        }
    }
}
