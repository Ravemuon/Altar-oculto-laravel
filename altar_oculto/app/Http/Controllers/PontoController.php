<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ponto;
use App\Models\Categoria;

class PontoController extends Controller
{
    /**
     * Exibe a lista de pontos.
     */
    public function index(Request $request)
    {
        // Pegando todas as categorias para o filtro
        $categorias = Categoria::orderBy('nome')->get();

        // Query base para pontos, já com categoria carregada
        $query = Ponto::with('categoria')->orderBy('nome');

        // Filtro por categoria
        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        // Pesquisa por nome
        if ($request->filled('search')) {
            $query->where('nome', 'like', '%' . $request->search . '%');
        }

        // Paginação opcional ou get()
        $pontos = $query->get();

        return view('pontos.index', compact('pontos', 'categorias'));
    }

    /**
     * Exibe um ponto específico.
     */
    public function show($id)
    {
        $ponto = Ponto::with('categoria')->findOrFail($id);

        return view('pontos.show', compact('ponto'));
    }

    /**
     * Formulário de criação de ponto.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('pontos.create', compact('categorias'));
    }

    /**
     * Armazena o ponto criado.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'funcao' => 'nullable|string|max:255',
            'entidade' => 'nullable|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
            'descricao' => 'nullable|string',
            'letra' => 'nullable|string',
            'simbolo' => 'nullable|string',
            'audio' => 'nullable|file|mimes:mp3,wav',
        ]);

        // Upload do áudio, se houver
        if ($request->hasFile('audio')) {
            $validated['audio'] = $request->file('audio')->store('pontos', 'public');
        }

        Ponto::create($validated);

        return redirect()->route('pontos.index')->with('success', 'Ponto criado com sucesso!');
    }

    /**
     * Formulário de edição de ponto.
     */
    public function edit($id)
    {
        $ponto = Ponto::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('pontos.edit', compact('ponto', 'categorias'));
    }

    /**
     * Atualiza o ponto.
     */
    public function update(Request $request, $id)
    {
        $ponto = Ponto::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'funcao' => 'nullable|string|max:255',
            'entidade' => 'nullable|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
            'descricao' => 'nullable|string',
            'letra' => 'nullable|string',
            'simbolo' => 'nullable|string',
            'audio' => 'nullable|file|mimes:mp3,wav',
        ]);

        if ($request->hasFile('audio')) {
            $validated['audio'] = $request->file('audio')->store('pontos', 'public');
        }

        $ponto->update($validated);

        return redirect()->route('pontos.index')->with('success', 'Ponto atualizado com sucesso!');
    }

    /**
     * Deleta o ponto.
     */
    public function destroy($id)
    {
        $ponto = Ponto::findOrFail($id);
        $ponto->delete();

        return redirect()->route('pontos.index')->with('success', 'Ponto excluído com sucesso!');
    }
}
