<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\User;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users->take(3) as $user) {
            Sale::create([
                'user_id' => $user->id,
                'tanggal' => now(),
                'total' => 50000,
                'metode_bayar' => 'Cash',
                'status' => 'Selesai',
            ]);
        }
    }
}