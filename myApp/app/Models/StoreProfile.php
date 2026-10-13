<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreProfile extends Model
{
    protected $table = 'store_profiles';

    protected $fillable = [
        'nama_toko',
        'alamat',
        'no_telepon',
    ];
}
