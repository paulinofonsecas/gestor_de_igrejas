<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membros');
    }
};
