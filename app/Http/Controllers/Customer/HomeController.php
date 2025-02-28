<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->take(20)->get();
        return view('customer.home', compact('categories'));
    }



}
