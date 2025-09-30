<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    protected $model = \App\Models\Pedido::class; // define o modelo que a factory cria

    // DADOS FALSOS PARA TESTE
    public function definition()
    {
        return [
            'id_usuario' => \App\Models\User::inRandomOrder()->first()->id, // usuário aleatório
            'status' => $this->faker->randomElement(['pendente','concluido','cancelado']), // status aleatório
            'total' => 0, // será atualizado depois com os itens do pedido
            'data' => $this->faker->dateTimeBetween('-1 month', 'now'), // data aleatória no último mês
        ];
    }
}
