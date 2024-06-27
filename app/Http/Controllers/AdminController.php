<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Carousel; // Import model Carousel

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
                'email' => 'Cannot delete admin account.',
            ]);
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // Method to show all products
    public function index()
    {
        $products = Product::all();
        return view('admin.produk', compact('products'));
    }

    // Method to store a new product
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

    // Method to update a product
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

    // Method to delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully.']);
    }

    // Method to approve an order
    public function approveOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->update(['status' => 'approved']);

        return redirect()->route('admin.orders')->with('success', 'Order approved successfully.');
    }

    // Method to reject an order
    public function rejectOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->update(['status' => 'rejected']);

        return redirect()->route('admin.orders')->with('success', 'Order rejected successfully.');
    }

    // Method to show all orders
    public function showOrders()
    {
        $orders = Order::with('user')->latest()->get(); // Ambil semua order, serta data user

        return view('admin.order', compact('orders')); // Kembalikan view dengan data orders
    }

    // Method to show all carousel items
    public function showCarouselItems()
    {
        $carouselItems = Carousel::all();

        return view('admin.carousel', compact('carouselItems'));
    }

    // Method to store a new carousel item
    public function storeCarouselItem(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        Carousel::create($request->all());

        return redirect()->route('admin.carousel')->with('success', 'Carousel item added successfully.');
    }

    // Method to update a carousel item
    public function updateCarouselItem(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $carouselItem = Carousel::findOrFail($id);
        $carouselItem->update($request->all());

        return response()->json(['message' => 'Carousel item updated successfully.']);
    }

    // Method to delete a carousel item
    public function deleteCarouselItem($id)
    {
        $carouselItem = Carousel::findOrFail($id);
        $carouselItem->delete();

        return response()->json(['message' => 'Carousel item deleted successfully.']);
    }
}
