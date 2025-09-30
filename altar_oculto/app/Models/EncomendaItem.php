<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EncomendaItem extends Model
{
    // Define explicitamente a tabela no banco de dados
    protected $table = 'encomenda_itens';

    // Campos que podem ser preenchidos em massa
    // Permite criar ou atualizar registros usando arrays com esses campos
    protected $fillable = [
        'encomenda_id',
        'produto_id',
        'quantidade',
        'preco_unitario',
        'subtotal',
        'endereco'
    ];

    // Define a relação com o produto
    // Cada item de encomenda pertence a um produto
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
