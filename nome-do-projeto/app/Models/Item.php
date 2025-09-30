<?php

namespace App\Item;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'encomenda_id',
        'produto_id',
        'quantidade',
        'preco_unitario'
    ];

    // Cada item pertence a uma encomenda
    public function encomenda()
    {
        return $this->belongsTo(Encomenda::class);
    }

    // Cada item também pertence a um produto
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
