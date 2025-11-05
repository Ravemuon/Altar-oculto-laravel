<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->decimal('preco', 10, 2);
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('imagem')->nullable(); // caminho da imagem (upload ou URL)
            $table->integer('estoque')->default(0);
            $table->string('codigo')->nullable();
            $table->decimal('peso', 8, 2)->nullable();
            $table->string('dimensoes')->nullable();
            $table->string('tags')->nullable();
            $table->boolean('popular')->default(false);
            $table->boolean('ativo')->default(true);
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
