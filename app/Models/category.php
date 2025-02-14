<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'image',
        'category_id',
        'category_name',
    ];

    // Relasi: Satu Kategori punya banyak Produk
    public function products()
    {
        return $this->hasMany(product::class);
    }
}
