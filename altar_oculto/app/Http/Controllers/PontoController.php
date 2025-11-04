<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use Illuminate\Http\Request;

class PontoController extends Controller
{
    // LISTA todos os pontos
    public function index()
    {
        $pontos = Ponto::all();
        return view('pontos.index', compact('pontos'));
    }

    // EXIBE o formulário de criação
    public function create()
    {
        return view('pontos.create');
    }

    // SALVA um novo ponto
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'letra' => 'required|string',
            'categoria' => 'nullable|string|max:100',
            'autor' => 'nullable|string|max:100',
            'audio' => 'nullable|url',
        ]);

        Ponto::create($request->all());
        return redirect()->route('pontos.index')
                         ->with('success', 'Ponto cadastrado com sucesso!');
    }

    // EXIBE um ponto específico
    public function show(Ponto $ponto)
    {
        return view('pontos.show', compact('ponto'));
    }

    // EXIBE formulário de edição
    public function edit(Ponto $ponto)
    {
        return view('pontos.edit', compact('ponto'));
    }

    // ATUALIZA um ponto existente
    public function update(Request $request, Ponto $ponto)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'letra' => 'required|string',
            'categoria' => 'nullable|string|max:100',
            'autor' => 'nullable|string|max:100',
            'audio' => 'nullable|url',
        ]);

        $ponto->update($request->all());
        return redirect()->route('pontos.index')
                         ->with('success', 'Ponto atualizado com sucesso!');
    }

    // EXCLUI um ponto
    public function destroy(Ponto $ponto)
    {
        $ponto->delete();
        return redirect()->route('pontos.index')
                         ->with('success', 'Ponto excluído com sucesso!');
    }
    public function orixas()
    {
        $categorias = \App\Models\Categoria::all();
        return view('pontos.orixas', compact('categorias'));
    }

}
