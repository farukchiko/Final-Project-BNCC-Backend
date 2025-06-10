<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class OrderDetail extends Model
{
    use HasUuids;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    public $incrementing = false;
    protected $keyType = 'string';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}