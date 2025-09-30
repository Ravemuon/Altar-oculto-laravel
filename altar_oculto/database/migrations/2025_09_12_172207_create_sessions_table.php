<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // CRIA TABELA SESSIONS
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // id da sessão
            $table->foreignId('user_id')->nullable()->index(); // id do usuário (opcional)
            $table->string('ip_address', 45)->nullable(); // IP do usuário
            $table->text('user_agent')->nullable(); // info do navegador
            $table->longText('payload'); // dados da sessão
            $table->integer('last_activity')->index(); // último acesso
        });
    }

    // REMOVE TABELA SESSIONS
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
