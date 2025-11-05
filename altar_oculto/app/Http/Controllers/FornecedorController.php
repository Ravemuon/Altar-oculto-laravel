<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Estoque;
use Illuminate\Support\Facades\Auth;

class FornecedorController extends Controller
{
    /**
     * Mostrar o estoque do fornecedor e todos os produtos do sistema.
     */
    public function estoque(Request $request)
    {
        $fornecedor = Auth::user();
        $search = $request->input('search');

        // Estoque do fornecedor
        $produtos = Estoque::where('user_id', $fornecedor->id)
            ->with('produto.categoria')
            ->when($search, function($query, $search) {
                $query->whereHas('produto', function($q) use ($search) {
                    $q->where('nome', 'like', "%{$search}%");
                });
            })
            ->get();

        // Todos os produtos do sistema
        $todosProdutos = Produto::with('categoria')
            ->when($search, function($query, $search) {
                $query->where('nome', 'like', "%{$search}%");
            })
            ->get();

        return view('fornecedores.estoque', compact('produtos', 'todosProdutos', 'search'));
    }

    /**
     * Formulário para editar quantidade de produto no estoque do fornecedor
     */
    public function editarEstoque(Produto $produto)
    {
        $fornecedor = Auth::user();
        $estoque = Estoque::where('user_id', $fornecedor->id)
            ->where('produto_id', $produto->id)
            ->firstOrFail();

        return view('fornecedores.editar-estoque', compact('produto', 'estoque'));
    }

    /**
     * Atualizar a quantidade de um produto no estoque do fornecedor
     */
    public function atualizarEstoque(Request $request, Produto $produto)
    {
        $request->validate([
            'quantidade' => 'required|integer|min:0',
        ]);

        $fornecedor = Auth::user();
        $estoque = Estoque::where('user_id', $fornecedor->id)
            ->where('produto_id', $produto->id)
            ->firstOrFail();

        $estoque->quantidade = $request->quantidade;
        $estoque->save();

        return redirect()->route('fornecedores.estoque')
                         ->with('success', 'Quantidade atualizada com sucesso!');
    }

    /**
     * Remover produto do estoque do fornecedor
     */
    public function removerEstoque(Estoque $estoque)
    {
        $fornecedor = Auth::user();
        if ($estoque->user_id !== $fornecedor->id) abort(403, 'Ação não autorizada.');

        $estoque->delete();

        return redirect()->route('fornecedores.estoque')
                         ->with('success', 'Produto removido do estoque!');
    }

    /**
     * Adicionar produto individualmente ao estoque do fornecedor
     */
    public function salvarEstoque(Request $request)
    {
        $fornecedor = Auth::user();
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        Estoque::updateOrCreate(
            ['user_id' => $fornecedor->id, 'produto_id' => $request->produto_id],
            ['quantidade' => \DB::raw("quantidade + {$request->quantidade}")]
        );

        return redirect()->route('fornecedores.estoque')
                         ->with('success', 'Produto adicionado ao estoque com sucesso!');
    }

    /**
     * Adicionar todos os produtos do fornecedor para a loja
     */
    public function adicionarEstoqueNaLoja()
    {
        $fornecedor = Auth::user();
        $estoques = Estoque::where('user_id', $fornecedor->id)->get();

        foreach ($estoques as $estoque) {
            $produto = $estoque->produto;
            if ($produto) {
                $produto->estoque = $produto->estoque + $estoque->quantidade;
                $produto->save();
            }
        }

        return redirect()->route('fornecedores.estoque')
                         ->with('success', 'Todos os produtos foram adicionados ao estoque da loja!');
    }
}
