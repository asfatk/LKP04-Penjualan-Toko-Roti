<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalesReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode_mulai',
        'periode_selesai',
        'total_penjualan',
        'file_laporan',
    ];

    protected $casts = [
        'periode_mulai' => 'date',
        'periode_selesai' => 'date',
        'total_penjualan' => 'decimal:2',
    ];
}