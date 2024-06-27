<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna dengan daftar pesanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Ambil semua pesanan pengguna yang terautentikasi
        $orders = auth()->user()->orders()->latest('created_at')->get();

        // Terapkan sorting berdasarkan parameter query 'sort'
        $sortOption = $request->query('sort');
        if ($sortOption) {
            if ($sortOption === 'date-asc') {
                $orders = $orders->sortBy('created_at');
            } elseif ($sortOption === 'price-asc') {
                $orders = $orders->sortBy('total_price');
            } elseif ($sortOption === 'price-desc') {
                $orders = $orders->sortByDesc('total_price');
            }
        }

        // Render view profil dengan data pesanan
        return view('profil', compact('orders'));
    }
}