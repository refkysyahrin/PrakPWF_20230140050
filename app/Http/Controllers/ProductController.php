<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        // Menggunakan paginate() menggantikan all() agar fitur pagination berfungsi
        $products = Product::paginate(10); 
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get(); 
        return view('product.create', compact('users'));
    }

    // TUGAS 6: Mengganti parameter menjadi StoreProductRequest
    public function store(StoreProductRequest $request)
    {
        // Validasi sudah otomatis berjalan di background melalui StoreProductRequest.
        // Kita cukup memanggil $request->validated() untuk mengambil data yang sudah dijamin benar dan aman.
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
        return view('product.edit', compact('product', 'users'));
    }

    // TUGAS 6: Mengganti parameter menjadi UpdateProductRequest
    public function update(UpdateProductRequest $request, Product $product)
    {
        // IMPLEMENTASI POLICY: Cek apakah user berhak mengedit produk ini
        Gate::authorize('update', $product);

        // Validasi sudah otomatis berjalan melalui UpdateProductRequest.
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