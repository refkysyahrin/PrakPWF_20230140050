<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * INI ADALAH BAGIAN YANG PALING PENTING UNTUK MEMPERBAIKI ERROR!
     * * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'user_id',
    ];

    /**
     * Get the user that owns the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}