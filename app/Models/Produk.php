<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'cate_id',
        'nama',
        'deskripsi_singkat',
        'deskripsi',
        'harga',
        'harga_jual',
        'image',
        'qty',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'cate_id','id');
    }

}
