<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    // Permite usar factories do Laravel para criar registros de teste
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    // Facilita criar ou atualizar registros usando arrays com esses campos
    protected $fillable = [
        'nome',
        'email',
        'mensagem'
    ];
}
