<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Encomenda;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    // 🏠 Página Inicial (Home)
    public function home()
    {
        $categorias = Categoria::all();
        $produtos = Produto::all();
        $encomendas = Encomenda::with('itens.produto')->get();
        $produtosRecentes = Produto::orderBy('created_at', 'desc')->take(6)->get();

        return view('welcome', compact('categorias', 'produtos', 'encomendas', 'produtosRecentes'));
    }

    // 📋 Listar todos os produtos
    public function index(Request $request)
    {
        $query = Produto::query();

        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->categoria);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%$search%")
                  ->orWhere('descricao', 'like', "%$search%");
            });
        }

        $produtos = $query->with('categoria')->get();
        $categorias = Categoria::all();

        return view('produtos.index', compact('produtos', 'categorias'));
    }

    // 🔍 Mostrar detalhes de um produto
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    // ➕ Formulário para criar produto
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    // 💾 Salvar novo produto (com upload ou URL)
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:255',
            'descricao' => 'required',
            'preco' => 'required|numeric|min:0|max:9999999999999.99',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem_upload' => 'nullable|image|max:2048',
            'imagem' => 'nullable|url',
            'estoque' => 'nullable|numeric',
            'codigo' => 'nullable|string',
            'peso' => 'nullable|string',
            'dimensoes' => 'nullable|string',
            'tags' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        $dados = $request->only([
            'nome', 'descricao', 'preco', 'categoria_id',
            'imagem', 'estoque', 'codigo', 'peso', 'dimensoes', 'tags', 'observacoes'
        ]);

        if ($request->hasFile('imagem_upload')) {
            $path = $request->file('imagem_upload')->store('produtos', 'public');
            $dados['imagem'] = $path;
        }

        Produto::create($dados);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    // ✏️ Formulário para editar produto
    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    // 🔄 Atualizar produto
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|min:3|max:255',
            'descricao' => 'required',
            'preco' => 'required|numeric|min:0|max:9999999999999.99',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem_upload' => 'nullable|image|max:2048',
            'imagem' => 'nullable|url',
            'estoque' => 'nullable|numeric',
            'codigo' => 'nullable|string',
            'peso' => 'nullable|string',
            'dimensoes' => 'nullable|string',
            'tags' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        $dados = $request->only([
            'nome', 'descricao', 'preco', 'categoria_id',
            'imagem', 'estoque', 'codigo', 'peso', 'dimensoes', 'tags', 'observacoes'
        ]);

        if ($request->hasFile('imagem_upload')) {
            $path = $request->file('imagem_upload')->store('produtos', 'public');
            $dados['imagem'] = $path;
        }

        $produto->update($dados);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // ❌ Excluir produto
    public function destroy(Produto $produto)
    {
        if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
            Storage::disk('public')->delete($produto->imagem);
        }

        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
