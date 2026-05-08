<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProductApiController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Success', 'data' => Product::with('category')->get()], 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
                'category_id' => 'required|exists:categories,id'
            ]);

            $validated['user_id'] = Auth::id();
            $product = Product::create($validated);

            return response()->json(['message' => 'Produk berhasil ditambahkan!!', 'data' => $product], 201);
        } catch (\Throwable $e) {
            Log::error('Error tambah produk', ['msg' => $e->getMessage()]);
            return response()->json(['message' => 'Error server'], 500);
        }
    }

    public function show(int $id)
    {
        $product = Product::with('category')->find($id);
        if (!$product) return response()->json(['message' => 'Product tidak ditemukan'], 404);
        return response()->json(['message' => 'Product retrieved successfully', 'data' => $product], 200);
    }

    public function update(Request $request, int $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) return response()->json(['message' => 'Product tidak ditemukan'], 404);

            $validated = $request->validate([
                'name' => 'required|string',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
                'category_id' => 'required|exists:categories,id'
            ]);

            $product->update($validated);
            return response()->json(['message' => 'Produk berhasil diupdate!', 'data' => $product], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error server'], 500);
        }
    }

    public function destroy(int $id)
    {
        $product = Product::find($id);
        if (!$product) return response()->json(['message' => 'Product tidak ditemukan'], 404);
        $product->delete();
        return response()->json(['message' => 'Produk berhasil dihapus!'], 200);
    }
}