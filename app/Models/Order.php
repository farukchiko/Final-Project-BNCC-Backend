<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Order extends Model
{
    use HasUuids;

    protected $fillable = ['user_id', 'total_price'];

    public $incrementing = false;
    protected $keyType = 'string';

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke order_detail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}