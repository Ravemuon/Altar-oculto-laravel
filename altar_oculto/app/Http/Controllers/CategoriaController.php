<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // LISTAGEM PÚBLICA DE ENTIDADES (linhas e orixás)
    public function publicIndex()
    {
        $linhas = Categoria::where('linha', 'linha')->get(); // pega categorias da linha
        $orixas = Categoria::where('linha', 'orixa')->get(); // pega categorias de orixá

        return view('categorias.public', compact('linhas', 'orixas')); // manda pro front
    }

    // MOSTRAR DETALHES DE UMA CATEGORIA
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria')); // exibe detalhes de uma categoria
    }

    // LISTAGEM COMPLETA (CRUD, pesquisa)
    public function index(Request $request)
    {
        $search = $request->input('search'); // pega termo de pesquisa

        $query = Categoria::query(); // inicia query

        if ($search) {
            $query->where('nome', 'like', "%{$search}%")
                  ->orWhere('descricao', 'like', "%{$search}%"); // filtra por nome ou descrição
        }

        $categorias = $query->orderBy('linha')->get(); // ordena por linha

        return view('categorias.index', compact('categorias')); // manda pro front
    }

    // FORMULÁRIO DE CRIAÇÃO
    public function create()
    {
        return view('categorias.create'); // mostra formulário
    }

    // SALVAR NOVA CATEGORIA
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:2',
            'descricao' => 'nullable',
            'imagem' => 'nullable|url',
            'linha' => 'nullable',
            'cores' => 'nullable',
            'dia_semana' => 'nullable',
            'historia' => 'nullable',
        ]); // valida dados

        Categoria::create($request->all()); // cria no banco

        return redirect()->route('categorias.index')->with('success', 'Categoria criada!'); // volta e mostra msg
    }

    // FORMULÁRIO DE EDIÇÃO
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria')); // mostra formulário com dados atuais
    }

    // ATUALIZAR CATEGORIA
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|min:2',
            'descricao' => 'nullable',
            'imagem' => 'nullable|url',
            'linha' => 'nullable',
            'cores' => 'nullable',
            'dia_semana' => 'nullable',
            'historia' => 'nullable',
        ]); // valida dados

        $categoria->update($request->all()); // atualiza no banco

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada!'); // volta e mostra msg
    }

    // DELETAR CATEGORIA
    public function destroy(Categoria $categoria)
    {
        $categoria->delete(); // remove do banco
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída!'); // volta e mostra msg
    }
}
