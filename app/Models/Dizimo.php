<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dizimo extends Model
{
    use HasFactory;

    public function membro()
    {
        return $this->belongsTo(Membro::class, 'membro_id');
    }

    public function metodoPagamento()
    {
        return $this->belongsTo(MetodoPagamento::class, 'metodo_pagamento_id');
    }
}
