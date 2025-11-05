<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use App\Models\EncomendaItem;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

class EncomendaController extends Controller
{
    // LISTA ENCOMENDAS
    public function index(Request $request)
    {
        $query = Encomenda::with('itens.produto');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nome_cliente', 'like', "%{$search}%")
                  ->orWhere('email_cliente', 'like', "%{$search}%");
            });
        }

        $encomendas = $query->get();
        $produtos = Produto::take(4)->get();

        return view('encomendas.index', compact('encomendas', 'produtos'));
    }

    // FORMULÁRIO DE CRIAÇÃO (finalização do carrinho)
    public function create()
    {
        $produtos = Produto::all();
        return view('encomendas.create', compact('produtos'));
    }

    // SALVAR NOVA ENCOMENDA A PARTIR DO CARRINHO
    public function store(Request $request)
    {
        $carrinho = session('carrinho', []);

        if (empty($carrinho)) {
            return redirect()->back()->with('error', 'O carrinho está vazio.');
        }

        // Validação básica do cliente
        $request->validate([
            'nome_cliente' => 'required|string|min:3',
            'email_cliente' => 'required|email',
            'telefone_cliente' => 'nullable|string',
            'endereco' => 'required|string',
            'observacoes' => 'nullable|string',
        ]);

        // Cria a encomenda
        $encomenda = Encomenda::create([
            'usuario_id' => Auth::id(),
            'nome_cliente' => $request->nome_cliente,
            'email_cliente' => $request->email_cliente,
            'telefone_cliente' => $request->telefone_cliente,
            'endereco' => $request->endereco,
            'observacoes' => $request->observacoes,
            'total' => 0, // será atualizado depois
        ]);

        $total = 0;

        // Adiciona itens do carrinho
        foreach ($carrinho as $id => $item) {
            $produto = Produto::find($id);
            if (!$produto) continue;

            $subtotal = $produto->preco * $item['quantidade'];

            $encomenda->itens()->create([
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $produto->preco,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        // Atualiza o total da encomenda
        $encomenda->update(['total' => $total]);

        // Limpa o carrinho da sessão
        session()->forget('carrinho');

        return redirect()->route('encomendas.index')->with('success', 'Encomenda cadastrada com sucesso!');
    }

    // FORMULÁRIO PARA EDITAR ENCOMENDA
    public function edit(Encomenda $encomenda)
    {
        $encomenda->load('itens.produto');
        return view('encomendas.edit', compact('encomenda'));
    }

    // ATUALIZA INFORMAÇÕES DO CLIENTE
    public function update(Request $request, Encomenda $encomenda)
    {
        $request->validate([
            'nome_cliente' => 'required|min:3',
            'email_cliente' => 'required|email',
            'telefone_cliente' => 'nullable',
            'endereco' => 'required',
            'observacoes' => 'nullable',
        ]);

        $encomenda->update([
            'nome_cliente' => $request->nome_cliente,
            'email_cliente' => $request->email_cliente,
            'telefone_cliente' => $request->telefone_cliente,
            'endereco' => $request->endereco,
            'observacoes' => $request->observacoes,
        ]);

        return redirect()->route('encomendas.index')->with('success', 'Informações do pedido atualizadas com sucesso!');
    }

    // EXCLUIR ENCOMENDA COMPLETA
    public function destroy(Encomenda $encomenda)
    {
        $encomenda->itens()->delete();
        $encomenda->delete();

        return redirect()->route('encomendas.index')->with('success', 'Encomenda excluída com sucesso!');
    }
}
