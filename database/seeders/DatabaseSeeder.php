<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(MetodoPagamentoSeeder::class);
        $this->call(MembroSeeder::class);
    }
}
