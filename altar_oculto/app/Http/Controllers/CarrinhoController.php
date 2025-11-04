<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    // Adicionar produto ao carrinho
    public function adicionar(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $carrinho = session('carrinho', []);

        if(isset($carrinho[$id])){
            $carrinho[$id]['quantidade'] += 1;
        } else {
            $carrinho[$id] = [
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'quantidade' => 1,
            ];
        }

        session(['carrinho' => $carrinho]);

        return back()->with('success', "{$produto->nome} adicionado ao carrinho!");
    }

    // Remover produto do carrinho
    public function remover(Request $request, $id)
    {
        $carrinho = session('carrinho', []);
        if(isset($carrinho[$id])){
            unset($carrinho[$id]);
            session(['carrinho' => $carrinho]);
        }

        return back()->with('success', "Produto removido do carrinho.");
    }

    // Limpar carrinho
    public function limpar()
    {
        session()->forget('carrinho');
        return back()->with('success', "Carrinho limpo!");
    }

    // Página do carrinho
    public function index()
    {
        $carrinho = session('carrinho', []);
        $produtos = Produto::take(4)->get(); // Sugestões
        return view('carrinho.index', compact('carrinho', 'produtos'));
    }
}
