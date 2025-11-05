<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define os campos que podem ser preenchidos em massa
    // Isso permite criar ou atualizar registros usando arrays com esses campos
    protected $fillable = [
        'user_id',
        'nome_cliente',
        'email_cliente',
        'telefone_cliente',
        'observacoes',
        'total',
        'endereco'
    ];

    // Define a relação com os itens da encomenda
    // Cada encomenda pode ter vários itens, então usamos hasMany
    public function itens()
    {
        return $this->hasMany(EncomendaItem::class);
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'user_id'); // Ajuste 'user_id' conforme seu DB
    }

}
