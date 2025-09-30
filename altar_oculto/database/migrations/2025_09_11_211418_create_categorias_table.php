<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    // CRIA TABELA CATEGORIAS
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // id automático
            $table->string('nome')->unique(); // nome único
            $table->text('descricao')->nullable(); // descrição opcional
            $table->string('imagem')->nullable(); // link da imagem
            $table->string('linha')->nullable(); // linha ourixá/linha
            $table->string('cores')->nullable();
            $table->string('dia_semana')->nullable();
            $table->text('historia')->nullable();
            $table->text('simbolos')->nullable();
            $table->text('saudacoes')->nullable();
            $table->text('personalidade')->nullable();
            $table->text('animais')->nullable();
            $table->text('elementos')->nullable();
            $table->text('datas_rituais')->nullable();
            $table->text('notas')->nullable();
            $table->timestamps(); // created_at e updated_at
        });
    }

    // REMOVE TABELA CATEGORIAS
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
