<?php

namespace Database\Seeders;

use App\Models\EstadoCivil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadoCivil::create([
            'desc' => 'Solteiro',
        ]);
        EstadoCivil::create([
            'desc' => 'Casado',

        ]);
        EstadoCivil::create([
            'desc' => 'Divorciado',

        ]);
        EstadoCivil::create([
            'desc' => 'União de factos',

        ]);
        EstadoCivil::create([
            'desc' => 'Outro',
        ]);
    }
}
