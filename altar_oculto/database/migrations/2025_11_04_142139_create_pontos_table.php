<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pontos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Nome do ponto
            $table->text('letra'); // Letra completa do ponto
            $table->string('categoria')->nullable(); // Linha, entidade ou orixá
            $table->string('autor')->nullable(); // Quem compôs o ponto
            $table->string('audio')->nullable(); // Link para o áudio (YouTube, etc)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pontos');
    }
};
