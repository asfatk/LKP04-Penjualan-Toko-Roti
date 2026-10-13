<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Admin Kasir',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin_kasir',
        ]);

        User::create([
            'nama' => 'Owner',
            'username' => 'owner',
            'password' => Hash::make('owner123'),
            'role' => 'owner',
        ]);
    }
}