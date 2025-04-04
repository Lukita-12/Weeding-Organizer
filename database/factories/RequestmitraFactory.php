<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Requestmitra>
 */
class RequestmitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pelanggan_id' => Pelanggan::factory(),
            'nama_usaha' => fake()->company(),
            'jenis_usaha' => fake()->randomElement(['Dekorasi', 'Tata rias', 'Kue pernikahan']),
            'nama_pemilik' => fake()->name(),
        ];
    }
}
