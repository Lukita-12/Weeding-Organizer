<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tgl_pembayaran' => fake()->date(),
            'bukti_pembayaran' => 'bukti_pembayaran/' . Str::random(10) . '.jpg',
            'bayar_dp' => fake()->randomElement(['Dibayar', 'Belum dibayar']),
            'bayar_lunas' => fake()->randomElement(['Dibayar', 'Belum dibayar']),
        ];
    }
}
