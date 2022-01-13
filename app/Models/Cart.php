<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'produk_id',
        'produk_qty',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id','id');
    }
}
