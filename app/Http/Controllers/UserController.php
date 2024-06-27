<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Mengambil data dari database dan tampilkan
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Buat user baru
    public function create()
    {
        return view('users.create');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('users.index');
    }
}
