<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'harga',
        'kategori',
        'deskripsi',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }
}