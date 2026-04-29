<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category; // WAJIB DITAMBAHKAN: Import model Category
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        // PERBAIKAN: Menggunakan with() agar relasi user dan category diambil bersamaan
        // Ini mencegah masalah N+1 query dan membuat aplikasi lebih cepat
        $products = Product::with(['user', 'category'])->paginate(10); 
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get(); 
        $categories = Category::all(); // Mengambil semua data kategori untuk dropdown
        
        return view('product.create', compact('users', 'categories'));
    }

    // Menggunakan parameter StoreProductRequest dari modul 6
    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('product.view', compact('product'));
    }

    public function edit(Product $product)
    {
        // IMPLEMENTASI POLICY: Cek apakah user berhak mengedit produk ini
        Gate::authorize('update', $product);

        $users = User::orderBy('name')->get(); 
        $categories = Category::all(); // Mengambil data kategori untuk dropdown saat diedit

        return view('product.edit', compact('product', 'users', 'categories'));
    }

    // Menggunakan parameter UpdateProductRequest dari modul 6
    public function update(UpdateProductRequest $request, Product $product)
    {
        // IMPLEMENTASI POLICY: Cek apakah user berhak mengedit produk ini
        Gate::authorize('update', $product);

        $product->update($request->validated());
        
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // IMPLEMENTASI POLICY: Cek apakah user berhak menghapus produk ini
        Gate::authorize('delete', $product);

        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}