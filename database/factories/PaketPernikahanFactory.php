<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaketPernikahan>
 */
class PaketPernikahanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_paket'        => fake()->name(),
            'venue'             => fake()->company(),
            'dekorasi'          => fake()->company(),
            'tata_rias'         => fake()->company(),
            'staff_acara'       => fake()->numberBetween(1, 15),
            'catering'          => fake()->company(),
            'kue_pernikahan'    => fake()->company(),
            'fotografer'        => fake()->company(),
            'entertaiment'      => fake()->company(),
            'hargaDP_paket'     => fake()->randomFloat(2, 100000000, 999999999),
            'hargaLunas_paket'  => fake()->randomFloat(2, 100000000, 999999999),
            'status_paket'      => fake()->randomElement(['Tersedia', 'Tidak tersedia', 'Exclusive']),
        ];
    }
}
