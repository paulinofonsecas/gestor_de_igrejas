<?php

namespace Database\Seeders;

use App\Models\Dizimo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DizimoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dizimo::factory(2000)->create();
    }
}
