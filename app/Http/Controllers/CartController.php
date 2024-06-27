<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Order; 

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
{
    $product = Product::findOrFail($productId);
    $userId = auth()->id(); // Mendapatkan ID pengguna yang saat ini masuk

    if (!$userId) {
        return redirect()->route('login')->with('error', 'Silakan login untuk menambahkan produk ke keranjang.');
    }

    if (auth()->user()->isAdmin()) {
        return back()->withErrors([
            'email' => 'Anda Admin Tidak Bisa Tambah Produk',
        ]);
    }

    $size = $request->input('size', 'M'); // Ambil ukuran dari request, default ke 'M' jika tidak ada
    $quantity = $request->input('quantity', 1);

    // Cek apakah jumlah total produk di cart sudah mencapai limit
    $totalCartQuantity = Cart::where('user_id', $userId)
                             ->where('product_id', $productId)
                             ->sum('quantity');

    if ($totalCartQuantity + $quantity > $product->quantity) {
        return back()->withErrors([
            'email' => 'Jumlah Produk Melebihi Yang Tersedia.',
        ]);
    }

    // ... (sisanya kode Anda)

    $existingCart = Cart::where('user_id', $userId)
                        ->where('product_id', $productId)
                        ->where('size', $size)
                        ->first();

    if ($existingCart) {
        // Jika produk sudah ada di keranjang dengan ukuran yang sama, tambahkan jumlahnya
        $existingCart->increment('quantity', $quantity);
    } else {
        // Jika produk belum ada di keranjang, buat entri baru
        Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'size' => $size,
        ]);
    }

    // Simpan pesan sukses ke dalam session
    Session::flash('success', 'Produk berhasil ditambahkan ke keranjang.');

    // Redirect kembali ke halaman produk
    return back();
}

    public function index()
{
    $userId = auth()->id(); // Ambil ID user yang sedang login
    $cartItems = Cart::where('user_id', $userId)->with('product')->get();

    // Menghitung total harga
    $totalPrice = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return view('cart', compact('cartItems', 'totalPrice'));
}

    public function remove(Cart $cart)
    {
        $userId = auth()->id();

        if ($cart->user_id != $userId) {
            return redirect()->route('cart');
        }

        $cart->delete();

        // Simpan pesan sukses ke dalam session
        Session::flash('success', 'Produk berhasil dihapus dari keranjang.');

        return redirect()->route('cart');
    }



    public function checkout()
    {
        // $userId = auth()->id();
        // $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        // // Proses setiap item cart
        // $cartItems->each(function ($item) use ($userId) {
        //     // Menghitung total harga untuk item ini
        //     $totalPrice = $item->product->price * $item->quantity;

        //     // Membuat order baru
        //     $order = Order::create([
        //         'user_id' => $userId,
        //         'status' => 'pending',
        //         'total_price' => $totalPrice,
        //         'product_name' => $item->product->name, // Simpan nama produk
        //         'product_quantity' => $item->quantity, // Simpan jumlah produk
        //         'product_size' => $item->size, // Simpan ukuran produk
        //     ]);

        //     // Mengupdate cart item dengan order_id yang baru dibuat
        //     $item->update(['order_id' => $order->id]);

        //     // Mengurangi kuantitas produk
        //     $product = $item->product;
        //     $product->decrement('quantity', $item->quantity);
        // });

        // // Hapus cart items setelah checkout
        // Cart::where('user_id', $userId)->delete();

        // Simpan pesan sukses ke dalam session
        Session::flash('success', 'Checkout berhasil! Anda dapat melihat detail pesanan di profil Anda.');

        // Redirect ke halaman profil atau halaman lain yang Anda inginkan
        return redirect()->route('home');
    }
}

