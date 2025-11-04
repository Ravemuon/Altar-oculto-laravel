<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Estoque;
use Illuminate\Support\Facades\Auth;

class FornecedorController extends Controller
{
    // Mostrar estoque do fornecedor
    public function estoque()
    {
        $fornecedor = Auth::user();

        // Produtos que o fornecedor adicionou
        $produtos = Estoque::where('user_id', $fornecedor->id)->with('produto')->get();

        // Todos os produtos do sistema
        $todosProdutos = Produto::with('categoria')->get();

        return view('fornecedores.estoque', compact('fornecedor', 'produtos', 'todosProdutos'));
    }

    // Formulário para adicionar produto ao estoque
    public function adicionarEstoque()
    {
        $fornecedor = Auth::user();
        $produtos = Produto::all(); // lista de todos os produtos do sistema
        return view('fornecedores.adicionar-estoque', compact('fornecedor', 'produtos'));
    }

    // Salvar produto no estoque
    public function salvarEstoque(Request $request)
    {
        $fornecedor = Auth::user();

        // Validar
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Verificar se já existe no estoque
        $estoque = Estoque::where('user_id', $fornecedor->id)
                          ->where('produto_id', $request->produto_id)
                          ->first();

        if ($estoque) {
            // Atualiza a quantidade
            $estoque->quantidade += $request->quantidade;
            $estoque->save();
        } else {
            // Cria novo registro no estoque
            Estoque::create([
                'user_id' => $fornecedor->id,
                'produto_id' => $request->produto_id,
                'quantidade' => $request->quantidade,
            ]);
        }

        return redirect()->route('fornecedores.estoque')->with('success', 'Produto adicionado ao estoque!');
    }

    // Formulário para editar quantidade
    public function editarEstoque(Estoque $estoque)
    {
        $fornecedor = Auth::user();

        // Garante que o estoque pertence ao fornecedor
        if ($estoque->user_id !== $fornecedor->id) {
            abort(403);
        }

        return view('fornecedores.editar-estoque', compact('fornecedor', 'estoque'));
    }

    // Atualizar quantidade
    public function atualizarEstoque(Request $request, Estoque $estoque)
    {
        $fornecedor = Auth::user();
        if ($estoque->user_id !== $fornecedor->id) abort(403);

        $request->validate([
            'quantidade' => 'required|integer|min:0',
        ]);

        $estoque->quantidade = $request->quantidade;
        $estoque->save();

        return redirect()->route('fornecedores.estoque')->with('success', 'Estoque atualizado!');
    }

    // Remover produto do estoque
    public function removerEstoque(Estoque $estoque)
    {
        $fornecedor = Auth::user();
        if ($estoque->user_id !== $fornecedor->id) abort(403);

        $estoque->delete();

        return redirect()->route('fornecedores.estoque')->with('success', 'Produto removido do estoque!');
    }
}
