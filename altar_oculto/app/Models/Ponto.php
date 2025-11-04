<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    use HasFactory;

    // CAMPOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = [
        'nome',          // Nome do ponto
        'tipo',          // Ex.: cantado, riscado
        'entidade',      // Ex.: Orixá, linha ou entidade espiritual
        'funcao',        // Função do ponto (ex.: abertura, fechamento)
        'letra',         // Letra do ponto cantado
        'simbolo',       // Símbolo do ponto riscado
        'audio',         // Arquivo de áudio do ponto
        'categoria_id',  // Relacionamento com Categoria
        'descricao'      // Observações ou descrição adicional
    ];

    // RELACIONAMENTO COM CATEGORIA
    // Cada ponto pertence a uma categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // MÉTODO OPCIONAL: para formatar tipo exibido
    public function tipoFormatado()
    {
        return ucfirst($this->tipo);
    }
}
