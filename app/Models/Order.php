<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'payment_status_id',
        'total_amount',
        'orders_status',
    ];

    public function user(){
        return $this->belongsTo(user::class,'user_id','id');
    }

    public function paymentStatus(){
        return $this->belongsTo(paymentStatus::class,'payment_status_id','id');
    }
}
