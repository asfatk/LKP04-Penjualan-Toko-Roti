<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_toko',
        'alamat',
        'no_telepon',
    ];
}