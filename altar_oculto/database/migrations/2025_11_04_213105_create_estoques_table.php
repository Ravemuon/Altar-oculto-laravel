<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // referência ao usuário (fornecedor)
            $table->unsignedBigInteger('produto_id'); // referência ao produto
            $table->integer('quantidade')->default(0);
            $table->timestamps();

            // Corrigir a foreign key para a tabela correta
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};
