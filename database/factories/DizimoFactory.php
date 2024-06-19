<?php

namespace Database\Factories;

use App\Models\Membro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dizimo>
 */
class DizimoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data' => $this->faker->date(),
            'valor' => $this->faker->numberBetween(0, 100000),
            'descricao' => $this->faker->sentence(),
            'membro_id' => Membro::all()->random()->id,
            'metodo_pagamento_id' => $this->faker->numberBetween(1, 3),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
