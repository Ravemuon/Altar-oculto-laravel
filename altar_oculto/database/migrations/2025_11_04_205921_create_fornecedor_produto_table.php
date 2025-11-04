<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('fornecedor_produto', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('fornecedor_id');
        $table->unsignedBigInteger('produto_id');
        $table->integer('quantidade')->default(0);
        $table->timestamps();

        // Foreign keys corretas
        $table->foreign('fornecedor_id')->references('id')->on('usuarios')->onDelete('cascade');
        $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
    });
}

};
