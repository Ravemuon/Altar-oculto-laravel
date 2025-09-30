<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemPedidoFactory extends Factory
{
    protected $model = \App\Models\ItemPedido::class; // define o modelo que a factory cria

    // DADOS FALSOS PARA TESTE
    public function definition()
    {
        $produto = \App\Models\Produto::inRandomOrder()->first(); // pega produto aleatório
        $quantidade = $this->faker->numberBetween(1, 5); // quantidade aleatória

        return [
            'id_pedido' => \App\Models\Pedido::inRandomOrder()->first()->id, // pedido aleatório
            'id_produto' => $produto->id, // produto escolhido
            'quantidade' => $quantidade,
            'subtotal' => $produto->preco * $quantidade, // calcula subtotal
        ];
    }
}
