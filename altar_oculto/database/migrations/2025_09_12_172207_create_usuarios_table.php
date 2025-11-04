<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');

            // Relacionamento opcional com fornecedor
            $table->foreignId('fornecedor_id')
                  ->nullable()
                  ->constrained('fornecedores')
                  ->nullOnDelete();

            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('usuarios');
    }
};
