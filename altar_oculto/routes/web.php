<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EncomendaController;
use App\Http\Controllers\CarrinhoController;


// -----------------------------
// HOME
// -----------------------------
Route::get('/', [ProdutoController::class, 'home'])->name('home');

// -----------------------------
// CATEGORIAS (CRUD)
// -----------------------------
Route::resource('categorias', CategoriaController::class);

// -----------------------------
// PRODUTOS (CRUD)
// -----------------------------
Route::resource('produtos', ProdutoController::class);

// -----------------------------
// CONTATO
// -----------------------------
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');

// -----------------------------
// ENCOMENDAS (CRUD)
// -----------------------------
Route::resource('encomendas', EncomendaController::class);

// Rota para remover um item da encomenda
Route::delete('/encomendas/{encomenda}/item/{produto}', [EncomendaController::class, 'removerItem'])
     ->name('encomendas.removerItem');
     
// -----------------------------
// CARRINHO (sessão)
// -----------------------------
Route::prefix('carrinho')->name('carrinho.')->group(function () {
    Route::post('/adicionar/{id}', [CarrinhoController::class, 'adicionar'])->name('adicionar');
    Route::post('/remover/{id}', [CarrinhoController::class, 'remover'])->name('remover');
    Route::post('/limpar', [CarrinhoController::class, 'limpar'])->name('limpar');

    // Atualizar item do carrinho
    Route::post('/atualizar/{id}', [CarrinhoController::class, 'atualizarItem'])->name('atualizarItem');

    // Remover item específico do carrinho
    Route::delete('/removerItem/{id}', [CarrinhoController::class, 'removerItem'])->name('removerItem');
});
