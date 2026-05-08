<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryApiController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Success', 'data' => Category::all()], 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate(['name' => 'required|string|max:255|unique:categories']);
            $category = Category::create($validated);
            return response()->json(['message' => 'Kategori berhasil ditambahkan!', 'data' => $category], 201);
        } catch (\Throwable $e) {
            Log::error('Error tambah kategori API', ['msg' => $e->getMessage()]);
            return response()->json(['message' => 'Error server'], 500);
        }
    }

    public function show(int $id)
    {
        $category = Category::find($id);
        if (!$category) return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        return response()->json(['message' => 'Success', 'data' => $category], 200);
    }

    public function update(Request $request, int $id)
    {
        try {
            $category = Category::find($id);
            if (!$category) return response()->json(['message' => 'Kategori tidak ditemukan'], 404);

            $validated = $request->validate(['name' => 'required|string|max:255|unique:categories,name,' . $id]);
            $category->update($validated);
            return response()->json(['message' => 'Kategori berhasil diupdate!', 'data' => $category], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error server'], 500);
        }
    }

    public function destroy(int $id)
    {
        $category = Category::find($id);
        if (!$category) return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        $category->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus!'], 200);
    }
}