<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            // Adiciona coluna imagem se não existir
            if (!Schema::hasColumn('usuarios', 'imagem')) {
                $table->string('imagem')->nullable()->after('senha');
            }

            // Adiciona coluna fornecedor_id se não existir
            if (!Schema::hasColumn('usuarios', 'fornecedor_id')) {
                $table->unsignedBigInteger('fornecedor_id')->nullable()->after('imagem');

                // Adiciona foreign key somente se tabela fornecedores existir
                if (Schema::hasTable('fornecedores')) {
                    $table->foreign('fornecedor_id')
                          ->references('id')
                          ->on('fornecedores')
                          ->onDelete('set null');
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            if (Schema::hasColumn('usuarios', 'imagem')) {
                $table->dropColumn('imagem');
            }
            if (Schema::hasColumn('usuarios', 'fornecedor_id')) {
                $table->dropForeign(['fornecedor_id']);
                $table->dropColumn('fornecedor_id');
            }
        });
    }
};
