<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use App\Models\Produto;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class EncomendaController extends Controller
{
    public function encomendas()
    {
        $usuarios = User::with('encomendas.itens.produto')->get();
        $pdf = Pdf::loadView('relatorios.encomendas', compact('usuarios'));
        return $pdf->stream('relatorio_encomendas.pdf');
    }
    
    // LISTA ENCOMENDAS COM OPÇÃO DE BUSCA
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


    // FORMULÁRIO PARA CRIAR ENCOMENDA
    public function create()
    {
        $produtos = Produto::all();
        return view('encomendas.create', compact('produtos'));
    }

    // SALVAR NOVA ENCOMENDA
    public function store(Request $request)
    {
        $request->validate([
            'nome_cliente' => 'required|min:3',
            'email_cliente' => 'required|email',
            'produtos' => 'required|array|min:1',
            'produtos.*.produto_id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
        ]);

        $encomenda = Encomenda::create([
            'nome_cliente' => $request->nome_cliente,
            'email_cliente' => $request->email_cliente,
            'telefone_cliente' => $request->telefone_cliente,
            'endereco' => $request->endereco,
            'observacoes' => $request->observacoes,
            'total' => 0,
        ]);

        $total = 0;

        foreach ($request->produtos as $item) {
            $produto = Produto::findOrFail($item['produto_id']);
            $subtotal = $produto->preco * $item['quantidade'];

            $encomenda->itens()->create([
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $produto->preco,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        $encomenda->update(['total' => $total]);
            // ✅ Limpa o carrinho da sessão
                session()->forget('carrinho');


        return redirect()->route('encomendas.index')->with('success', 'Encomenda cadastrada com sucesso!');
    }

    // FORMULÁRIO PARA EDITAR ENCOMENDA
    public function edit(Encomenda $encomenda)
    {
        $encomenda->load('itens.produto'); // apenas para exibir os itens
        return view('encomendas.edit', compact('encomenda'));
    }

    // ATUALIZAR INFORMAÇÕES DO CLIENTE (SEM ALTERAR ITENS)
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
