<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Cart extends Model
{
    use HasUuids;

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public $incrementing = false;
    protected $keyType = 'string';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}