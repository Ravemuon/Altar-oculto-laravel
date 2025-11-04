<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * CRIA A TABELA PRODUTOS
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // ID automático
            $table->string('nome')->unique(); // Nome único
            $table->text('descricao'); // Descrição obrigatória
            $table->decimal('preco', 8, 2); // Preço com duas casas decimais
            $table->string('imagem')->nullable(); // Caminho do arquivo de imagem
            $table->foreignId('categoria_id')
                  ->constrained('categorias')
                  ->onDelete('cascade'); // se categoria for deletada, remove os produtos
                  
            $table->integer('estoque')->default(0); // Quantidade em estoque
            $table->string('codigo')->nullable(); // Código interno do produto
            $table->boolean('ativo')->default(true);
            $table->boolean('popular')->default(false);
            $table->decimal('peso', 8, 2)->nullable(); // Peso em gramas ou kg
            $table->string('dimensoes')->nullable();
            $table->text('tags')->nullable(); // busca
            $table->text('observacoes')->nullable();

            // 🕓 REGISTROS DE CRIAÇÃO/ATUALIZAÇÃO
            $table->timestamps(); // created_at e updated_at
        });
    }
    public function down(): void

    {
        Schema::dropIfExists('produtos');
    }
};
