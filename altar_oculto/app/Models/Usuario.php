<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Authenticatable
{
    protected $fillable = ['nome', 'email', 'senha'];
    protected $hidden = ['senha'];
    protected $table = 'usuarios';

    // Indica para Laravel que a coluna de senha é 'senha'
    public function getAuthPassword()
    {
        return $this->senha;
    }

    // Relação: um usuário tem muitas encomendas
    public function encomendas(): HasMany
    {
        return $this->hasMany(Encomenda::class, 'user_id');
    }
}
