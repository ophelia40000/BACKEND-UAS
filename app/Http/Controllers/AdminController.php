<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    // Method to show all users
    public function showAllUsers()
    {
        $users = User::all(); // Ambil semua user dari model User

        return view('admin.user', compact('users')); // Kembalikan view dengan data user
    }

    // Method to delete user
    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found.');
        }

        if ($user->role === 'admin') {
            return back()->withErrors([
                'email' => 'Tidak bisa Hapus Akun Admin',
            ]);
        }

        $user->delete();

        return redirect()->route('admin.users')->wither('success', 'User deleted successfully.');
    }
    public function index()
    {
        $products = Product::all();
        return view('admin.produk', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'price' => 'required|numeric',
            'stripeId' => 'required'
        ]);

        Product::create($request->all());
        return redirect()->route('admin.produk')->with('success', 'Product added successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'stripeId' => 'required'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json(['message' => 'Product updated successfully.']);
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully.']);
    }
    public function approveOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->update(['status' => 'approved']);

        return redirect()->route('admin.orders')->with('success', 'Order approved successfully.');
    }

    public function rejectOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->update(['status' => 'rejected']);

        return redirect()->route('admin.orders')->with('success', 'Order rejected successfully.');
    }
    public function showOrders()
    {
        $orders = Order::with('user')->latest()->get(); // Ambil semua order, serta data user

        return view('admin.order', compact('orders')); // Kembalikan view dengan data orders
    }
}

