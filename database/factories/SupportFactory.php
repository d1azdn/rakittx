<?php

namespace Database\Factories;

use App\Models\Support;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(mt_rand(2,9)),
            'slug' => fake()->slug(),
            'text' => fake()->paragraph(mt_rand(5,10)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
