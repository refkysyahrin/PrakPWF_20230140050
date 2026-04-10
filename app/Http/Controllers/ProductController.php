<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // Wajib ditambahkan untuk memanggil Policy

class ProductController extends Controller
{
    public function index()
    {
        // PERBAIKAN: Menggunakan paginate() menggantikan all().
        // Karena di index.blade.php kamu memanggil {{ $products->links() }}, 
        // jika memakai all() akan terjadi error "Method links does not exist".
        $products = Product::paginate(10); 
        return view('product.index', compact('products'));
    }

    public function create()
    {
        // PERBAIKAN: Memperbaiki typo dari 'ordeyBy' menjadi 'orderBy'
        $users = User::orderBy('name')->get(); 
        return view('product.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'user_id' => 'required|exists:users,id', 
        ]);

        Product::create($validated);
        
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    // PERBAIKAN: Menggunakan Route Model Binding (Product $product) menggantikan $id
    public function show(Product $product)
    {
        // Memastikan nama file view sesuai dengan yang kamu buat (view.blade.php atau show.blade.php)
        // Di modul sebelumnya tertulis view.blade.php
        return view('product.view', compact('product'));
    }

    public function edit(Product $product)
    {
        // IMPLEMENTASI POLICY: Cek apakah user berhak mengedit produk ini
        Gate::authorize('update', $product);

        $users = User::orderBy('name')->get(); 
        return view('product.edit', compact('product', 'users'));
    }

    public function update(Request $request, Product $product)
    {
        // IMPLEMENTASI POLICY: Cek apakah user berhak mengedit produk ini
        Gate::authorize('update', $product);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'quantity' => 'sometimes|integer',
            'price' => 'sometimes|numeric',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        $product->update($validated);
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    // PERBAIKAN: Mengganti nama method 'delete' menjadi 'destroy' agar sesuai dengan standar route resource dan file web.php
    public function destroy(Product $product)
    {
        // IMPLEMENTASI POLICY: Cek apakah user berhak menghapus produk ini
        Gate::authorize('delete', $product);

        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}