<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Product;

class SaleDetailSeeder extends Seeder
{
    public function run(): void
    {
        $sales = Sale::all();
        $products = Product::all();

        foreach ($sales as $sale) {
            $product = $products->random();
            $jumlah = 2;
            $harga = $product->harga;
            $subtotal = $jumlah * $harga;

            $sale->update([
                'total' => $subtotal,
            ]);

            $sale->saleDetails()->create([
                'product_id' => $product->id,
                'jumlah' => $jumlah,
                'harga' => $harga,
                'subtotal' => $subtotal,
            ]);
        }
    }
}