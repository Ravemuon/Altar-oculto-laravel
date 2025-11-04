<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory; // permite usar factories do Laravel

    // CAMPOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem',
        'categoria_id',
        'estoque',
        'codigo',
        'peso',
        'dimensoes',
        'tags',
        'popular',
        'ativo',
        'observacoes'

    ];

    // RELAÇÃO COM CATEGORIA (cada produto pertence a uma categoria)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function itens()
        {
            return $this->hasMany(Item::class);
        }

    public function fornecedores()
    {
        return $this->belongsToMany(Fornecedor::class)
                    ->withPivot('quantidade')
                    ->withTimestamps();
    }
}
