<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class; // define o modelo que a factory cria

    // DADOS FALSOS PARA TESTE
    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->words(2, true), // nome aleatório único
            'descricao' => $this->faker->sentence, // descrição aleatória
        ];
    }
}
