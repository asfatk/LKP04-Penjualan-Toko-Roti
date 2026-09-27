<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;
use App\Models\Product;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        Product::all()->each(function ($product) {
            Stock::create([
                'product_id' => $product->id,
                'jumlah' => fake()->numberBetween(10, 50),
                'satuan' => 'pcs',
                'keterangan' => 'Stok awal produk',
            ]);
        });
    }
}