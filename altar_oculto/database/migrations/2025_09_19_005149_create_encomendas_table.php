<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id();

            // 🔗 Relacionamento com usuário
            $table->foreignId('user_id')->nullable()->constrained('usuarios')->onDelete('cascade');

            // Dados do cliente (redundância útil, caso ele altere depois)
            $table->string('nome_cliente');
            $table->string('email_cliente')->nullable();
            $table->string('telefone_cliente')->nullable();
            $table->string('endereco')->nullable();

            // Informações da encomenda
            $table->decimal('total', 8, 2)->default(0);
            $table->text('observacoes')->nullable();
            $table->string('status')->default('pendente'); // pendente, enviado, concluído etc.
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encomendas');
    }
};
