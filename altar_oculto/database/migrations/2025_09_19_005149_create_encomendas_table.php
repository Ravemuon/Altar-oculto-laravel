<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration para criar as tabelas 'encomendas' e 'encomenda_itens'
return new class extends Migration
{
    // Método que aplica a migration
    public function up(): void
    {
        // Tabela de encomendas (dados do cliente e do pedido)
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id(); // id da encomenda (chave primária)
            $table->string('nome_cliente'); // nome do cliente
            $table->string('email_cliente'); // email do cliente
            $table->string('telefone_cliente')->nullable(); // telefone opcional
            $table->decimal('total', 10, 2)->nullable(); // total do pedido, permite nulo
            $table->text('observacoes')->nullable(); // observações adicionais do pedido
            $table->timestamps(); // created_at e updated_at
        });

        // Tabela de itens da encomenda
        Schema::create('encomenda_itens', function (Blueprint $table) {
            $table->id(); // id do item (chave primária)
            $table->foreignId('encomenda_id')
                  ->constrained('encomendas') // referencia a tabela encomendas
                  ->onDelete('cascade'); // se a encomenda for deletada, os itens também
            $table->foreignId('produto_id')
                  ->constrained('produtos') // referencia a tabela produtos
                  ->onDelete('cascade'); // se o produto for deletado, o item também
            $table->integer('quantidade')->default(1); // quantidade do item
            $table->decimal('preco_unitario', 10, 2); // preço unitário do item
            $table->decimal('subtotal', 10, 2); // subtotal (quantidade * preço)
            $table->timestamps(); // created_at e updated_at
        });
    }

    // Método que desfaz a migration
    public function down(): void
    {
        // Remove as tabelas na ordem correta (itens primeiro, depois encomendas)
        Schema::dropIfExists('encomenda_itens');
        Schema::dropIfExists('encomendas');
    }
};
