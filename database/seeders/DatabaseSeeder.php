<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Support;
use App\Models\Category;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        User::factory(1)
        ->state(['username' => 'diaz'])
        ->state(['password' => '123123'])
        ->state(['isAdmin' => false])
        ->create();

        Support::factory(10)->create();
        Brand::factory(1)->create();
        Category::factory(1)->create();
        Product::factory(1)->create();
        Product::factory(1)
        ->state(['product_name' => 'RakitPC (7 Hari)'])
        ->state(['price' => 400000])->create();
    }
}
