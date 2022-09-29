<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Produk::class;

    public function definition()
    {
        return [
            [
                'nama' => 'Cat Air',
                'merk' => 'Dunclop',
                'produk_image' => 'https://images.unsplash.com/photo-1585676737728-432f58d5fdba?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80',
                'harga' => '60.000',
            ],
            [
                'nama' => 'Cat Putih',
                'merk' => 'Dunclop',
                'produk_image' => 'https://images.unsplash.com/photo-1559507628-40a52a5e7081?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80',
                'harga' => '40.000'
            ],
            [
                'nama' => 'Cat Besi',
                'merk' => 'Dunclop',
                'produk_image' => 'https://images.unsplash.com/photo-1530669244764-0909211cd8e8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzB8fHBhaW50fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
                'harga' => '50.000'
            ],
        ];
    }
}
