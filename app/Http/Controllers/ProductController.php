<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('produk', compact('products'));
    }

    public function show($productId)
{
    $product = Product::findOrFail($productId);
    
    // Ambil 4 produk secara acak, kecuali produk yang sedang dilihat
    $relatedProducts = Product::where('id', '!=', $productId)->inRandomOrder()->limit(4)->get();

    return view('detail', compact('product', 'relatedProducts'));
}
}

