<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'fornecedor_id', // precisa estar aqui
        'imagem',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    // Relacionamento com Fornecedor
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
