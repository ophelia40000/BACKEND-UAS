<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

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
}
