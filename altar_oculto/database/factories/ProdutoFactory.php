<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produto;
use App\Models\Categoria; 

class ProdutoFactory extends Factory
{
    protected $model = Produto::class; // define o modelo que a factory cria

    // DADOS FALSOS PARA TESTE
    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->words(2, true), // nome aleatório único
            'descricao' => $this->faker->sentence, // descrição aleatória
            'preco' => $this->faker->randomFloat(2, 10, 200), // preço aleatório
            'imagem' => 'https://source.unsplash.com/400x300/?mystic,magic', // imagem aleatória fixa
            'categoria_id' => Categoria::inRandomOrder()->first()->id, // categoria aleatória
        ];
    }
}
