<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query || !is_string($query)) {
            $products = Product::all();
        } else {
            $products = Product::where('name', 'ilike', '%' . $query . '%')->get();
        }

        return view('produk', compact('products', 'query'));
    }
}
