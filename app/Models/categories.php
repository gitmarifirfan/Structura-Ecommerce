<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'category_name',
    ];

    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }
}
