<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Product;

class CarouselController extends Controller
{
    public function index()
    {
        // Ambil semua data carousel dari database
        $carousels = Carousel::all();

        // Ambil semua data produk dari database
        $products = Product::all();

        // Kirim data ke view home.blade.php dalam folder views
        return view('home', compact('carousels', 'products'));
    }
}

