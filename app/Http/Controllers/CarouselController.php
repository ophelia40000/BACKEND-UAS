<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        // Ambil semua data carousel dari database
        $carousels = Carousel::all();

        // Kirim data ke view
        return view('home', compact('carousels'));
    }
}
