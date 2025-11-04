<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores'; // garante o nome correto da tabela

    protected $fillable = ['nome', 'email', 'telefone', 'endereco'];

    // Relacionamento com produtos (pivot)
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'fornecedor_produto')
                    ->withPivot('quantidade')
                    ->withTimestamps();
    }
}
