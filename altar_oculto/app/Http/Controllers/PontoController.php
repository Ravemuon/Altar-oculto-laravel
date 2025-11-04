<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ponto;
use App\Models\Categoria;

class PontoController extends Controller
{
    // LISTAGEM DE PONTOS (com filtro opcional por categoria e pesquisa)
    public function index(Request $request)
    {
        $query = Ponto::with('categoria'); // eager loading da categoria

        // Filtra por categoria se informado na query string
        if ($request->query('categoria_id')) {
            $query->where('categoria_id', $request->query('categoria_id'));
        }

        // Filtra por busca no nome
        if ($request->query('search')) {
            $search = $request->query('search');
            $query->where('nome', 'like', "%{$search}%");
        }

        $pontos = $query->orderBy('nome')->get(); // ordena por nome
        $categorias = Categoria::all();

        return view('pontos.index', compact('pontos', 'categorias'));
    }

    // MOSTRAR PONTOS DE UMA CATEGORIA ESPECÍFICA
    public function categoria(Categoria $categoria)
    {
        $pontos = $categoria->pontos()->orderBy('nome')->get();
        return view('pontos.categoria', compact('categoria', 'pontos'));
    }

    // FORMULÁRIO DE CRIAÇÃO
    public function create()
    {
        $categorias = Categoria::all();
        return view('pontos.create', compact('categorias'));
    }

    // SALVAR NOVO PONTO
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|in:cantado,riscado',
            'entidade' => 'nullable|string|max:255',
            'funcao' => 'nullable|string|max:255',
            'letra' => 'nullable|string',
            'simbolo' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'nullable|string',
            'audio' => 'nullable|file|mimes:mp3,wav',
        ]);

        if ($request->hasFile('audio')) {
            $data['audio'] = $request->file('audio')->store('audios', 'public');
        }

        Ponto::create($data);

        return redirect()->route('pontos.index')->with('success', 'Ponto criado com sucesso!');
    }

    // FORMULÁRIO DE EDIÇÃO
    public function edit(Ponto $ponto)
    {
        $categorias = Categoria::all();
        return view('pontos.edit', compact('ponto', 'categorias'));
    }

    // ATUALIZAR PONTO
    public function update(Request $request, Ponto $ponto)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|in:cantado,riscado',
            'entidade' => 'nullable|string|max:255',
            'funcao' => 'nullable|string|max:255',
            'letra' => 'nullable|string',
            'simbolo' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'nullable|string',
            'audio' => 'nullable|file|mimes:mp3,wav',
        ]);

        if ($request->hasFile('audio')) {
            $data['audio'] = $request->file('audio')->store('audios', 'public');
        }

        $ponto->update($data);

        return redirect()->route('pontos.index')->with('success', 'Ponto atualizado com sucesso!');
    }

    // EXCLUIR PONTO
    public function destroy(Ponto $ponto)
    {
        $ponto->delete();
        return redirect()->route('pontos.index')->with('success', 'Ponto excluído com sucesso!');
    }

    // MOSTRAR DETALHES DO PONTO
    public function show(Ponto $ponto)
    {
        return view('pontos.show', compact('ponto'));
    }
}
