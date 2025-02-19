<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'image',
        'product_name',
        'description',
        'price',
        'stok',
        'category_id',
    ];

    // Relasi: Produk hanya punya satu Kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    // Relasi: 1 Produk bisa ada di banyak cart
    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
    }
}
