<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => "RakitTX Specialist",
            'slug' => "rakittx-specialist",
            'url' => "https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1565021324739-7493c5a74a13",
        ];
    }
}
