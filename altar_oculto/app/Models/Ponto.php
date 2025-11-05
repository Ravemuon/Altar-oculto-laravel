<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo',
        'funcao',
        'entidade',
        'categoria_id',
        'descricao',
        'letra',
        'simbolo',
        'audio',
    ];

    /**
     * Relacionamento com a categoria.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Retorna a URL da imagem da categoria/linha.
     * Se for URL externa, retorna direto. Caso seja arquivo local, usa storage.
     * Se não houver imagem, retorna placeholder.
     */
    public function categoriaImagem()
    {
        if (!$this->categoria || !$this->categoria->imagem) {
            return 'https://via.placeholder.com/300x200.png?text=Sem+Imagem';
        }

        // Verifica se já é uma URL completa
        if (filter_var($this->categoria->imagem, FILTER_VALIDATE_URL)) {
            return $this->categoria->imagem;
        }

        // Senão, assume que é arquivo armazenado localmente
        return asset('storage/' . $this->categoria->imagem);
    }
}
