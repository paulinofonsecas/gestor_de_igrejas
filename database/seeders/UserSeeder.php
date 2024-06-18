<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@igreja.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'Secretario',
            'email' => 'secretario@igreja.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'Membro',
            'email' => 'membro@igreja.com',
            'password' => Hash::make('password'),
        ]);
    }
}
