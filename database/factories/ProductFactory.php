<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => "RakitPC (1 Hari)",
            'brand_id' => 1,
            'category_id' => 1,
            'desc' => "RakitTX Special Guest Premium",
            'price' => 200000,
            'stock' => 1,
            'discount' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
