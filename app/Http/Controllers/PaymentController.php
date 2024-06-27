<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;   

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        require_once base_path('vendor/autoload.php');

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $YOUR_DOMAIN = 'http://localhost:8000';

        $items = json_decode($request->input('items'), true);

        $line_items = [];

        foreach ($items as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'idr',
                    'unit_amount' => $item['product']['price'] * 100, // Stripe requires amount in cents
                    'product_data' => [
                        'name' => $item['product']['name'],
                    ],
                ],
                'quantity' => $item['quantity'],
            ];
        }

        try {
            $checkout_session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [$line_items],
                'mode' => 'payment',
                'success_url' => $YOUR_DOMAIN . '/success',
                'cancel_url' => $YOUR_DOMAIN . '/cancel',
            ]);

            return redirect()->away($checkout_session->url);
        } catch (\Exception $e) {
            return back()->with('error', 'Error creating Stripe session: ' . $e->getMessage());
        }
    }
    public function checkout()
    {
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        // Proses setiap item cart
        $cartItems->each(function ($item) use ($userId) {
            // Menghitung total harga untuk item ini
            $totalPrice = $item->product->price * $item->quantity;

            // Membuat order baru
            $order = Order::create([
                'user_id' => $userId,
                'status' => 'pending',
                'total_price' => $totalPrice,
                'product_name' => $item->product->name, // Simpan nama produk
                'product_quantity' => $item->quantity, // Simpan jumlah produk
                'product_size' => $item->size, // Simpan ukuran produk
            ]);

            // Mengupdate cart item dengan order_id yang baru dibuat
            $item->update(['order_id' => $order->id]);

            // Mengurangi kuantitas produk
            $product = $item->product;
            $product->decrement('quantity', $item->quantity);
        });

        // Hapus cart items setelah checkout
        Cart::where('user_id', $userId)->delete();
        return redirect()->route('payments/success');


    }

    public function home(){
        // Redirect ke halaman profil atau halaman lain yang Anda inginkan
        return redirect()->route('cart.checkout');
    }
}
