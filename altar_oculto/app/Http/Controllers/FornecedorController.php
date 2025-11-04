<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Produto;

class FornecedorController extends Controller
{
    // Listar fornecedores
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('fornecedores.index', compact('fornecedores'));
    }

    // Formulário de criação
    public function create()
    {
        return view('fornecedores.create');
    }

    // Salvar novo fornecedor
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
        ]);

        Fornecedor::create($data);

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor criado com sucesso!');
    }

    // Formulário de edição
    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedores.edit', compact('fornecedor'));
    }

    // Atualizar fornecedor
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
        ]);

        $fornecedor->update($data);

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    // Excluir fornecedor
    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor excluído com sucesso!');
    }

    // Adicionar produtos ao estoque do fornecedor
    public function adicionarEstoque(Request $request, Fornecedor $fornecedor)
    {
        $data = $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Atualiza o estoque do fornecedor (pivot table)
        $fornecedor->produtos()->syncWithoutDetaching([
            $data['produto_id'] => ['quantidade' => $data['quantidade']]
        ]);

        // Atualiza a quantidade do produto no estoque geral
        $produto = Produto::findOrFail($data['produto_id']);
        $produto->quantidade += $data['quantidade'];
        $produto->save();

        return redirect()->back()->with('success', 'Estoque atualizado com sucesso!');
    }

    // Página do estoque do fornecedor
    public function estoque(Fornecedor $fornecedor)
    {
        $produtos = Produto::all(); // todos os produtos disponíveis
        $estoque = $fornecedor->produtos()->get(); // produtos já fornecidos por ele

        return view('fornecedores.estoque', compact('fornecedor', 'produtos', 'estoque'));
    }
    // Mostrar detalhes de um fornecedor
    public function show(Fornecedor $fornecedor)
    {
        return view('fornecedores.show', compact('fornecedor'));
    }

}
