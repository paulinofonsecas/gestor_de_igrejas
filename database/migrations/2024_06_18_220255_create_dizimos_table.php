<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::create('dizimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('membro_id')->nullable()->constrained('membros')->onDelete('set null');
            $table->double('valor', 10, 2);
            $table->date('data');
            $table->foreignId('metodo_pagamento_id')->nullable()->constrained('metodo_pagamentos')->onDelete('set null');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dizimos');
    }
};
