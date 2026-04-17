<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Ubah menjadi true karena kita sudah mengatur otorisasi Policy di Controller
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'quantity' => 'sometimes|required|integer|min:0',
            'price' => 'sometimes|required|numeric|min:0',
            'user_id' => 'sometimes|required|exists:users,id',
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'Nama produk tidak boleh dikosongkan.',
            'quantity.required' => 'Jumlah produk tidak boleh dikosongkan.',
            'price.required' => 'Harga produk tidak boleh dikosongkan.',
        ];
    }
}