<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use App\Models\Requestmitra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kerjasama>
 */
class KerjasamaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'requestmitra_id' => Requestmitra::factory(),
            'pelanggan_id' => Pelanggan::factory(),
            'noTelp_usaha' => fake()->phoneNumber(),
            'email_usaha' => fake()->unique()->safeEmail(),
            'alamat_usaha' => fake()->address(),
            'harga01' => fake()->randomFloat(2, 100000000, 999999999),
            'ket_harga01' => fake()->sentence(),
            'harga02' => fake()->randomFloat(2, 100000000, 999999999),
            'ket_harga02' => fake()->sentence(),
        ];
    }
}
