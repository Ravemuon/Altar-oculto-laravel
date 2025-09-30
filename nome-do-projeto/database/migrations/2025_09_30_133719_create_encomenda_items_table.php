<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration anônima para criar a tabela 'encomenda_items'
return new class extends Migration
{
    /**
     * Método que aplica a migration: cria a tabela
     */
    public function up(): void
    {
        Schema::create('encomenda_items', function (Blueprint $table) {
            $table->id();        // Cria a coluna 'id' como chave primária auto-increment
            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Método que desfaz a migration: remove a tabela
     */
    public function down(): void
    {
        Schema::dropIfExists('encomenda_items'); // Remove a tabela se ela existir
    }
};
