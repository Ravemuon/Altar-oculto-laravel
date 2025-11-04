<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\Encomenda;
use App\Models\EncomendaItem;
use App\Models\Categoria;

class CarrinhoController extends Controller
{
    // Página inicial / home mostrando categorias e produtos
    public function home()
    {
        $categorias = Categoria::all();
        $produtos = Produto::all();

        $encomendas = collect();
        if (Auth::check()) {
            $usuario = Auth::user();
            $encomendas = $usuario->encomendas()->with('itens.produto')->get();
        }

        return view('welcome', compact('categorias', 'produtos', 'encomendas'));
    }

    // Exibir carrinho
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('usuarios.login')
                ->with('error', 'Você precisa estar logado para acessar o carrinho.');
        }

        $usuario = Auth::user();
        $encomenda = $usuario->encomendas()->where('status', 'aberta')->first();
        $itens = $encomenda ? $encomenda->itens : collect([]);

        return view('carrinho.index', compact('itens', 'encomenda'));
    }

    // Adicionar produto ao carrinho
    public function adicionar(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('usuarios.login')
                ->with('error', 'Você precisa estar logado para adicionar ao carrinho!');
        }

        $usuario = Auth::user();
        $produto = Produto::findOrFail($id);

        // Cria ou pega encomenda aberta do usuário
        $encomenda = $usuario->encomendas()->firstOrCreate(['status' => 'aberta'], ['total' => 0]);

        // Verifica se o item já existe na encomenda
        $item = $encomenda->itens()->where('produto_id', $produto->id)->first();
        if ($item) {
            $item->quantidade++;
            $item->save();
        } else {
            $encomenda->itens()->create([
                'produto_id' => $produto->id,
                'quantidade' => 1,
                'preco' => $produto->preco
            ]);
        }

        // Atualiza total da encomenda
        $encomenda->total = $encomenda->itens->sum(fn($i) => $i->quantidade * $i->preco);
        $encomenda->save();

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    // Atualizar quantidade de um item
    public function atualizarItem(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('usuarios.login')
                ->with('error', 'Você precisa estar logado para atualizar o carrinho.');
        }

        $usuario = Auth::user();
        $encomenda = $usuario->encomendas()->where('status', 'aberta')->first();

        if (!$encomenda) {
            return redirect()->back()->with('error', 'Nenhuma encomenda ativa encontrada.');
        }

        $item = $encomenda->itens()->where('id', $id)->first();
        if ($item) {
            $quantidade = max(1, (int)$request->input('quantidade', 1));
            $item->quantidade = $quantidade;
            $item->save();

            // Atualiza total
            $encomenda->total = $encomenda->itens->sum(fn($i) => $i->quantidade * $i->preco);
            $encomenda->save();
        }

        return redirect()->back()->with('success', 'Quantidade atualizada com sucesso!');
    }

    // Remover item específico do carrinho
    public function removerItem($id)
    {
        if (!Auth::check()) {
            return redirect()->route('usuarios.login')
                ->with('error', 'Você precisa estar logado para remover produtos do carrinho.');
        }

        $usuario = Auth::user();
        $encomenda = $usuario->encomendas()->where('status', 'aberta')->first();

        if ($encomenda) {
            $encomenda->itens()->where('id', $id)->delete();
            $encomenda->total = $encomenda->itens->sum(fn($i) => $i->quantidade * $i->preco);
            $encomenda->save();
        }

        return redirect()->back()->with('success', 'Item removido do carrinho!');
    }

    // Limpar carrinho
    public function limpar()
    {
        if (!Auth::check()) {
            return redirect()->route('usuarios.login')
                ->with('error', 'Você precisa estar logado para limpar o carrinho.');
        }

        $usuario = Auth::user();
        $encomenda = $usuario->encomendas()->where('status', 'aberta')->first();

        if ($encomenda) {
            $encomenda->itens()->delete();
            $encomenda->total = 0;
            $encomenda->save();
        }

        return redirect()->back()->with('success', 'Carrinho esvaziado com sucesso!');
    }
}
