<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    // CRIA TABELA PRODUTOS
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // id automático
            $table->string('nome')->unique(); // nome único
            $table->string('descricao'); // descrição obrigatória
            $table->decimal('preco', 8, 2); // preço com duas casas decimais
            $table->string('imagem')->nullable(); // link da imagem
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); // chave estrangeira
            $table->timestamps(); // created_at e updated_at
            $table->integer('estoque')->default(0); // quantidade em estoque
            $table->string('codigo')->nullable(); // código do produto
            $table->decimal('peso', 8, 2)->nullable(); // peso do produto
            $table->string('dimensoes')->nullable(); // dimensões do produto
            $table->text('tags')->nullable(); // tags
            $table->boolean('popular')->default(false); // marca se é popular
            $table->boolean('ativo')->default(true); // marca se está ativo
            $table->text('observacoes')->nullable(); // observações adicionais
        });
    }

    // REMOVE TABELA PRODUTOS
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
