<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['username' => 'owner'],
            [
                'nama' => 'Pemilik Toko',
                'password' => env('OWNER_INITIAL_PASSWORD', 'password'),
                'role' => 'owner',
            ],
        );
    }
}
