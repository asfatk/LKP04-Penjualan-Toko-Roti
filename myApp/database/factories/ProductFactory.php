<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_produk' => fake()->words(2, true),
            'harga' => fake()->randomFloat(2, 5000, 50000),
            'kategori' => fake()->randomElement([
                'Roti',
                'Kue',
                'Donat',
                'Pastry',
            ]),
            'deskripsi' => fake()->sentence(),
        ];
    }
}