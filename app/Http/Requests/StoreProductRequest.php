<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Ubah menjadi true karena kita sudah mengatur otorisasi Gate di file web.php
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
        ];
    }

    /**
     * Custom pesan error (Opsional, agar bahasanya lebih mudah dipahami)
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama produk wajib diisi.',
            'quantity.required' => 'Jumlah produk wajib diisi.',
            'quantity.min' => 'Jumlah produk tidak boleh minus.',
            'price.required' => 'Harga produk wajib diisi.',
            'user_id.required' => 'Pemilik produk harus dipilih.',
        ];
    }
}