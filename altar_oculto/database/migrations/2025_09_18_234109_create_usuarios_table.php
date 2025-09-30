<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // CRIA TABELA USUÁRIOS
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // id automático
            $table->string('name'); // nome do usuário
            $table->string('email')->unique(); // email único
            $table->string('password'); // senha criptografada
            $table->enum('tipo', ['cliente','admin'])->default('cliente'); // tipo de usuário
            $table->rememberToken(); // token para lembrar login
            $table->timestamps(); // created_at e updated_at
        });
    }

    // REMOVE TABELA USUÁRIOS
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
