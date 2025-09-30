<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory; // permite usar factories do Laravel

    // CAMPOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = [
        'nome',
        'descricao',
        'imagem',
        'linha',
        'cores',
        'dia_semana',
        'historia',
        'simbolos',
        'saudacoes',
        'personalidade',
        'animais',
        'elementos',
        'datas_rituais',
        'notas'
    ];

    // RELAÇÃO COM PRODUTOS (uma categoria tem muitos produtos)
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
