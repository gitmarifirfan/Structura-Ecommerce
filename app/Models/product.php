<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'image',
        'product_name',
        'description',
        'price',
        'category_id',
    ];

    // Relasi: Produk hanya punya satu Kategori
    public function categories()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

}
