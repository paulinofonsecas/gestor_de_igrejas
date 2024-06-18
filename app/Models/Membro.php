<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    use HasFactory;

    public function estado_civil()
    {
        return $this->belongsTo(EstadoCivil::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}
