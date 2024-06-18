<?php

namespace Database\Factories;

use App\Models\EstadoCivil;
use App\Models\Genero;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membro>
 */
class MembroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
        $table->string('nome')->max(255);
            $table->string('email')->max(50);
            $table->string('bi')->max(14);
            $table->date('data_nascimento');
            $table->string('nome_do_pai');
            $table->string('nome_da_mae');
            $table->string('contacto')->nullable();
            $table->string('residencia')->nullable();
            $table->string('nome_do_conjunge')->nullable();
            $table->string('habitacoes_literarias')->nullable();
            $table->string('profissao')->nullable();
            $table->string('ocupacao_atual')->nullable();
            $table->string('data_conversao')->nullable();

            $table->bigInteger('estado_civil_id')->unsigned();
            $table->foreign('estado_civil_id')->references('id')->on('estado_civils');
            $table->bigInteger('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('generos');
            */
        return [
            'nome' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'bi' => fake()->unique()->numerify('######BE###'),
            'data_nascimento' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'nome_do_pai' => fake()->name(),
            'nome_da_mae' => fake()->name(),
            'contacto' => fake()->phoneNumber(),
            'residencia' => fake()->address(),
            'nome_do_conjunge' => fake()->name(),
            'habitacoes_literarias' => fake()->address(),
            'profissao' => fake()->address(),
            'ocupacao_atual' => fake()->address(),
            'data_conversao' => fake()->address(),
            'estado_civil_id' => EstadoCivil::all()->random()->id,
            'genero_id' => Genero::all()->random()->id,
        ];
    }
}
