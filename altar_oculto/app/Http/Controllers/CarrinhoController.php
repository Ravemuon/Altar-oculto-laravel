<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
        public function home()
    {
        $categorias = Categoria::all();
        $produtos = Produto::all();
        $encomendas = Encomenda::with('itens.produto')->get(); // ou filtrar por usuário se tiver login

        return view('welcome', compact('categorias', 'produtos', 'encomendas'));
    }

    // Adicionar produto ao carrinho
    public function adicionar(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']++;
        } else {
            $carrinho[$id] = [
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'quantidade' => 1
            ];
        }

        session()->put('carrinho', $carrinho);

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    // Remover produto do carrinho
    public function remover($id)
    {
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$id])) {
            unset($carrinho[$id]);
            session()->put('carrinho', $carrinho);
        }

        return redirect()->back()->with('success', 'Produto removido do carrinho!');
    }

    // Limpar carrinho inteiro
    public function limpar()
    {
        session()->forget('carrinho');
        return redirect()->back()->with('success', 'Carrinho esvaziado!');
    }
}
