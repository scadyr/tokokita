<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_order';
    protected $fillable = [
        'order_id',
        'produk_id',
        'price',
        'qty',
    ];
}
