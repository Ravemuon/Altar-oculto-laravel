<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CategoriaController,
    ProdutoController,
    ContatoController,
    EncomendaController,
    CarrinhoController,
    RelatorioController,
    UsuarioController,
    PontoController
};

// -----------------------------
// HOME
// -----------------------------
Route::get('/', [ProdutoController::class, 'home'])->name('home');

// -----------------------------
// USUARI
// -----------------------------

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

Route::get('/login', [UsuarioController::class, 'login'])->name('usuarios.login');
Route::post('/login', [UsuarioController::class, 'loginSubmit'])->name('usuarios.login.submit');

Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('usuarios.perfil')->middleware('auth');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('usuarios.logout');

Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit')->middleware('auth');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update')->middleware('auth');


// Login / Logout / Perfil
Route::get('/login', [UsuarioController::class, 'login'])->name('usuarios.login');
Route::post('/login', [UsuarioController::class, 'loginSubmit'])->name('usuarios.login.submit');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('usuarios.logout');
Route::get('/perfil', [UsuarioController::class, 'perfil'])->middleware('auth')->name('usuarios.perfil');

// -----------------------------
// CATEGORIAS / PRODUTOS / PONTOS
// -----------------------------
Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);
Route::get('/pontos/orixas', [PontoController::class, 'orixas'])->name('pontos.orixas');

// -----------------------------
// CONTATO
// -----------------------------
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');

// -----------------------------
// ENCOMENDAS
// -----------------------------
Route::resource('encomendas', EncomendaController::class);
Route::delete('/encomendas/{encomenda}/item/{produto}', [EncomendaController::class, 'removerItem'])
    ->name('encomendas.removerItem');

// -----------------------------
// RELATÓRIOS
// -----------------------------
Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
Route::get('/relatorios/estoque', [RelatorioController::class, 'estoque'])->name('relatorios.estoque');
Route::get('/relatorios/encomendas', [RelatorioController::class, 'encomendas'])->name('relatorios.encomendas');

// -----------------------------
// CARRINHO
// -----------------------------
// Produtos - Acesso público
Route::prefix('produtos')->name('produtos.')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('index');
    Route::get('/{id}', [ProdutoController::class, 'show'])->name('show');
});

Route::prefix('carrinho')->name('carrinho.')->group(function () {
    Route::get('/', [CarrinhoController::class, 'index'])->name('index');
    Route::post('/adicionar/{id}', [CarrinhoController::class, 'adicionar'])->name('adicionar');
    Route::post('/remover/{id}', [CarrinhoController::class, 'remover'])->name('remover');
    Route::post('/limpar', [CarrinhoController::class, 'limpar'])->name('limpar');
    Route::post('/atualizar/{id}', [CarrinhoController::class, 'atualizarItem'])->name('atualizarItem');
    Route::delete('/removerItem/{id}', [CarrinhoController::class, 'removerItem'])->name('removerItem');
});
