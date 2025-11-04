<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pontos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo', ['cantado', 'riscado']);
            $table->string('entidade')->nullable();
            $table->string('funcao')->nullable();
            $table->text('letra')->nullable();
            $table->text('simbolo')->nullable();
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->text('descricao')->nullable();
            $table->string('audio')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pontos');
    }
};
