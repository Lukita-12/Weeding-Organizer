<?php

namespace Database\Factories;

use App\Models\PaketPernikahan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesanan>
 */
class PesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'paket_pernikahan_id' => PaketPernikahan::factory(),
            'tgl_pesanan' => fake()->date(),
            'pengantin_pria' => fake()->name(),
            'pengantin_wanita' => fake()->name(),
            'tanggal_acara' => fake()->date(),
            'tanggal_diskusi' => fake()->date(),
        ];
    }
}
