<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration anônima para adicionar um novo campo na tabela 'encomendas'
return new class extends Migration
{
    // Método que aplica a migration
    public function up(): void
    {
        Schema::table('encomendas', function (Blueprint $table) {
            // Adiciona a coluna 'endereco' do tipo string
            // Permite valor nulo e será adicionada após a coluna 'telefone_cliente'
            $table->string('endereco')->nullable()->after('telefone_cliente');
        });
    }

    // Método que desfaz a migration
    public function down(): void
    {
        Schema::table('encomendas', function (Blueprint $table) {
            // Remove a coluna 'endereco'
            $table->dropColumn('endereco');
        });
    }
};
