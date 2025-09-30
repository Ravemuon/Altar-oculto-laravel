<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Encomenda;

class ProdutoController extends Controller
{
    // PÁGINA INICIAL (HOME)
    public function home()
    {
        $categorias = Categoria::all(); // pega todas categorias
        $produtos = Produto::all(); // pega todos produtos
        $encomendas = Encomenda::with('itens.produto')->get(); // pega encomendas com produtos
        $produtosRecentes = Produto::orderBy('created_at', 'desc')->take(6)->get(); // últimos 6 produtos

        return view('welcome', compact('categorias', 'produtos', 'encomendas','produtosRecentes'));
    }

    // LISTAR TODOS OS PRODUTOS
    public function index(Request $request)
    {
        $query = Produto::query(); // inicia query

        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->categoria); // filtra por categoria
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%$search%")
                  ->orWhere('descricao', 'like', "%$search%"); // filtra por nome ou descrição
            });
        }

        $produtos = $query->with('categoria')->get(); // pega produtos filtrados
        $categorias = Categoria::all(); // pega todas categorias

        return view('produtos.index', compact('produtos', 'categorias')); // envia pra view
    }

    // MOSTRAR DETALHES DE UM PRODUTO
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto')); // exibe detalhes
    }

    // FORMULÁRIO PARA CRIAR PRODUTO
    public function create()
    {
        $categorias = Categoria::all(); // pega todas categorias
        return view('produtos.create', compact('categorias')); // mostra formulário
    }

    // SALVAR NOVO PRODUTO
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|url',
            'estoque' => 'nullable|numeric',
            'codigo' => 'nullable|string',
            'peso' => 'nullable|string',
            'dimensoes' => 'nullable|string',
            'tags' => 'nullable|string',
            'popular' => 'nullable|boolean',
            'ativo' => 'nullable|boolean',
            'observacoes' => 'nullable|string',
        ]); // valida dados

        Produto::create($request->all()); // cria produto no banco

        return redirect()->route('produtos.index')->with('success', 'Produto criado!');
    }

    // FORMULÁRIO PARA EDITAR PRODUTO
    public function edit(Produto $produto)
    {
        $categorias = Categoria::all(); // pega todas categorias
        return view('produtos.edit', compact('produto', 'categorias')); // mostra formulário com dados atuais
    }

    // ATUALIZAR PRODUTO
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|url',
            'estoque' => 'nullable|numeric',
            'codigo' => 'nullable|string',
            'peso' => 'nullable|string',
            'dimensoes' => 'nullable|string',
            'tags' => 'nullable|string',
            'popular' => 'nullable|boolean',
            'ativo' => 'nullable|boolean',
            'observacoes' => 'nullable|string',
        ]); // valida dados

        $produto->update($request->all()); // atualiza produto no banco

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
    }

    // EXCLUIR PRODUTO
    public function destroy(Produto $produto)
    {
        $produto->delete(); // remove produto
        return redirect()->route('produtos.index')->with('success', 'Produto excluído!');
    }
}
