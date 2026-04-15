<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)
            ->where('is_available', true)
            ->take(6)
            ->get();

        $categories = Category::where('is_active', true)->get();

        $latestProducts = Product::where('is_available', true)
            ->latest()
            ->take(8)
            ->get();

        return view('home', compact('featuredProducts', 'categories', 'latestProducts'));
    }
}
