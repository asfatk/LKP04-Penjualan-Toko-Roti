<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'nama_produk' => 'Roti Coklat',
                'harga' => 10000,
                'kategori' => 'Roti',
                'deskripsi' => 'Roti lembut dengan isian coklat.',
            ],
            [
                'nama_produk' => 'Roti Keju',
                'harga' => 12000,
                'kategori' => 'Roti',
                'deskripsi' => 'Roti lembut dengan topping keju.',
            ],
            [
                'nama_produk' => 'Roti Pisang',
                'harga' => 11000,
                'kategori' => 'Roti',
                'deskripsi' => 'Roti dengan isian pisang.',
            ],
            [
                'nama_produk' => 'Roti Sosis',
                'harga' => 13000,
                'kategori' => 'Roti',
                'deskripsi' => 'Roti lembut dengan isian sosis.',
            ],
            [
                'nama_produk' => 'Roti Abon',
                'harga' => 14000,
                'kategori' => 'Roti',
                'deskripsi' => 'Roti dengan topping abon.',
            ],
            [
                'nama_produk' => 'Donat Coklat',
                'harga' => 8000,
                'kategori' => 'Donat',
                'deskripsi' => 'Donat lembut dengan topping coklat.',
            ],
            [
                'nama_produk' => 'Donat Keju',
                'harga' => 9000,
                'kategori' => 'Donat',
                'deskripsi' => 'Donat dengan topping keju.',
            ],
            [
                'nama_produk' => 'Croissant',
                'harga' => 15000,
                'kategori' => 'Pastry',
                'deskripsi' => 'Pastry renyah dengan tekstur berlapis.',
            ],
            [
                'nama_produk' => 'Brownies',
                'harga' => 18000,
                'kategori' => 'Kue',
                'deskripsi' => 'Brownies coklat lembut dan lezat.',
            ],
            [
                'nama_produk' => 'Kue Sus',
                'harga' => 10000,
                'kategori' => 'Kue',
                'deskripsi' => 'Kue sus dengan isian krim lembut.',
            ],
        ];

        foreach ($products as $index => $data) {
            Product::updateOrCreate(
                ['id' => $index + 1],
                $data
            );
        }
    }
}