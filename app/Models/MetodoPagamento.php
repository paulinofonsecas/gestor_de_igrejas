<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPagamento extends Model
{
    use HasFactory;

    public const Dinheiro = 'Dinheiro';
    public const TPA = 'TPA';
    public const Tranferencia = 'Transfência Bancaria';
    public const Cheque = 'Cheque';

}
