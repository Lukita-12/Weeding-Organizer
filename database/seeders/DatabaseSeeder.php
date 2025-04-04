<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

        User::factory()->create([
            'name' => 'Rie',
            'email' => 'rie@example.com',
            'password' => 'qwertyui',
            'role' => 'admin',
        ]);

        Pelanggan::factory(15)->create();
    }
}
