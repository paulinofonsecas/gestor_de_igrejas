<?php

namespace Database\Seeders;

use App\Models\MetodoPagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodoPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MetodoPagamento::create([
            'desc' => 'Dinheiro'
        ]);
        MetodoPagamento::create([
            'desc' => 'TPA'
        ]);
        MetodoPagamento::create([
            'desc' => 'Transfência Bancaria'
        ]);
        MetodoPagamento::create([
            'desc' => 'Cheque'
        ]);
    }
}
