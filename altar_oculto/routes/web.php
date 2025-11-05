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
    PontoController,
    FornecedorController,
    DashboardController
};

// -----------------------------
// HOME
// -----------------------------
Route::get('/', [ProdutoController::class, 'home'])->name('home');

// -----------------------------
// USUÁRIOS (Cadastro, Login, Perfil, Fornecedor)
// -----------------------------
Route::get('/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/fornecedor', [UsuarioController::class, 'fornecedorForm'])->name('usuarios.fornecedorForm');
Route::post('/fornecedor', [UsuarioController::class, 'storeFornecedor'])->name('usuarios.storeFornecedor');
Route::get('/login', [UsuarioController::class, 'login'])->name('usuarios.login');
Route::post('/login', [UsuarioController::class, 'loginSubmit'])->name('usuarios.login.submit');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('usuarios.logout');

// Upload de imagem (com middleware auth)
Route::post('/usuarios/upload-imagem', [UsuarioController::class, 'uploadImagem'])
    ->name('usuarios.upload_imagem')
    ->middleware('auth');

// Rotas protegidas para usuários logados
Route::middleware('auth')->group(function() {
    Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('usuarios.perfil');
    Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
});

// -----------------------------
// FORNECEDORES
// -----------------------------
Route::prefix('fornecedores')->middleware('auth')->group(function () {
    Route::get('/', [FornecedorController::class, 'index'])->name('fornecedores.index');
    Route::get('/create', [FornecedorController::class, 'create'])->name('fornecedores.create');
    Route::post('/', [FornecedorController::class, 'store'])->name('fornecedores.store');
    Route::get('/{fornecedor}/edit', [FornecedorController::class, 'edit'])->name('fornecedores.edit');
    Route::put('/{fornecedor}', [FornecedorController::class, 'update'])->name('fornecedores.update');
    Route::delete('/{fornecedor}', [FornecedorController::class, 'destroy'])->name('fornecedores.destroy');

    // Perfil do fornecedor
    Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('fornecedores.perfil');

    // Estoque do fornecedor
    Route::get('/estoque', [FornecedorController::class, 'estoque'])->name('fornecedores.estoque');
    Route::get('/estoque/adicionar', [FornecedorController::class, 'adicionarEstoque'])->name('fornecedores.adicionar-estoque');
    Route::post('/estoque', [FornecedorController::class, 'salvarEstoque'])->name('fornecedores.salvar-estoque');
    Route::get('/estoque/{produto}/editar', [FornecedorController::class, 'editarEstoque'])->name('fornecedores.editar-estoque');
    Route::put('/estoque/{produto}', [FornecedorController::class, 'atualizarEstoque'])->name('fornecedores.atualizar-estoque');
    Route::delete('/estoque/{estoque}', [FornecedorController::class, 'removerEstoque'])->name('fornecedores.remover-estoque');

    // Produtos do sistema (para adicionar ao estoque)
    Route::get('/produtos', [FornecedorController::class, 'produtosSistema'])->name('fornecedores.produtos');

    // Adicionar todos os produtos do fornecedor ao estoque da loja
    Route::post('/estoque/adicionar-loja', [FornecedorController::class, 'adicionarEstoqueNaLoja'])->name('fornecedores.adicionar-estoque-loja');
});

// -----------------------------
// CATEGORIAS / PRODUTOS
// -----------------------------
Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);
Route::get('/produtos/tabela', [ProdutoController::class, 'tabela'])->name('c');

// -----------------------------
// PONTOS
// -----------------------------
Route::prefix('pontos')->name('pontos.')->group(function () {
    Route::get('/', [PontoController::class, 'index'])->name('index');
    Route::get('/create', [PontoController::class, 'create'])->name('create');
    Route::post('/', [PontoController::class, 'store'])->name('store');
    Route::get('/{ponto}', [PontoController::class, 'show'])->name('show');
    Route::get('/{ponto}/edit', [PontoController::class, 'edit'])->name('edit');
    Route::put('/{ponto}', [PontoController::class, 'update'])->name('update');
    Route::delete('/{ponto}', [PontoController::class, 'destroy'])->name('destroy');
    Route::get('/categoria/{categoria}', [PontoController::class, 'categoria'])->name('categoria');
});

// -----------------------------
// CONTATO
// -----------------------------
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');

// -----------------------------
// ENCOMENDAS
// -----------------------------
Route::prefix('encomendas')->group(function () {
    Route::get('/', [EncomendaController::class, 'index'])->name('encomendas.index');
    Route::get('/create', [EncomendaController::class, 'create'])->name('encomendas.create');
    Route::post('/', [EncomendaController::class, 'store'])->name('encomendas.store');
    Route::get('/{encomenda}/edit', [EncomendaController::class, 'edit'])->name('encomendas.edit');
    Route::put('/{encomenda}', [EncomendaController::class, 'update'])->name('encomendas.update');
    Route::delete('/{encomenda}', [EncomendaController::class, 'destroy'])->name('encomendas.destroy');
});

// -----------------------------
// RELATÓRIOS
// -----------------------------
Route::prefix('relatorios')->name('relatorios.')->group(function() {
    Route::get('/', [RelatorioController::class, 'index'])->name('index');
    Route::get('/abrir/{tipo}', [RelatorioController::class, 'abrir'])->name('abrir');

    // Previews
    Route::get('/estoque-fornecedor', [RelatorioController::class, 'previewEstoqueFornecedor'])->name('preview-estoque-fornecedor');
    Route::get('/produtos', [RelatorioController::class, 'previewProdutos'])->name('preview-produtos');
    Route::get('/encomendas', [RelatorioController::class, 'previewEncomendas'])->name('preview-encomendas');
    Route::get('/categorias', [RelatorioController::class, 'previewCategorias'])->name('preview-categorias');
    Route::get('/pontos', [RelatorioController::class, 'previewPontos'])->name('preview-pontos');

    // Download PDFs
    Route::get('/download/{tipo}', [RelatorioController::class, 'downloadPDF'])->name('download-pdf');
});

// -----------------------------
// CARRINHO
// -----------------------------
Route::prefix('carrinho')->group(function () {
    Route::get('/', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/adicionar/{id}', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
    Route::post('/remover/{id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');
    Route::post('/limpar', [CarrinhoController::class, 'limpar'])->name('carrinho.limpar');
    Route::post('/atualizar/{id}', [CarrinhoController::class, 'atualizarItem'])->name('carrinho.atualizarItem');
    Route::delete('/removerItem/{id}', [CarrinhoController::class, 'removerItem'])->name('carrinho.removerItem');
});

// Dashboard
Route::prefix('dashboard')->name('dashboard.')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/vendas-mensais', [DashboardController::class, 'vendasMensais'])->name('vendas-mensais');
    Route::get('/produtos-mais-vendidos', [DashboardController::class, 'produtosMaisVendidos'])->name('produtos-mais-vendidos');
});

// Relatórios (preview)
Route::prefix('relatorios')->name('relatorios.')->group(function() {
    Route::get('/estoque-fornecedor', [RelatorioController::class, 'previewEstoqueFornecedor'])->name('preview-estoque-fornecedor');
    Route::get('/produtos', [RelatorioController::class, 'previewProdutos'])->name('preview-produtos');
    Route::get('/encomendas', [RelatorioController::class, 'previewEncomendas'])->name('preview-encomendas');
});
