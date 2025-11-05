<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produto;
use App\Models\Estoque;
use App\Models\EncomendaItem;
use App\Models\Categoria;
use App\Models\Usuario;
use App\Models\Ponto;

class RelatorioController extends Controller
{
    // Página principal com iframes
    public function index()
    {
        return view('relatorios.index');
    }

    // Redirecionamento genérico
    public function abrir($tipo)
    {
        switch ($tipo) {
            case 'estoque':
                return redirect()->route('relatorio.preview-estoque-fornecedor');
            case 'produtos':
                return redirect()->route('relatorio.preview-produtos');
            case 'encomendas':
                return redirect()->route('relatorio.preview-encomendas');
            case 'categorias':
                return redirect()->route('relatorio.preview-categorias');
            case 'pontos':
                return redirect()->route('relatorio.preview-pontos');
            default:
                abort(404);
        }
    }

    // Preview Estoque do fornecedor
    public function previewEstoqueFornecedor()
    {
        $fornecedor = auth()->user();
        $produtos = Estoque::where('user_id', $fornecedor->id)
            ->with('produto.categoria')
            ->get();

        return Pdf::loadView('relatorios.estoque-fornecedor', compact('produtos', 'fornecedor'))->stream();
    }

    // Preview Produtos
    public function previewProdutos()
    {
        $produtos = Produto::with('categoria')->get();
        return Pdf::loadView('relatorios.produtos', compact('produtos'))->stream();
    }

    // Preview Encomendas
    public function previewEncomendas()
    {
        $encomendas = EncomendaItem::with(['encomenda', 'produto'])
            ->orderBy('created_at', 'desc')
            ->get();

        return Pdf::loadView('relatorios.encomendas', compact('encomendas'))->stream();
    }

    // Preview Categorias
    public function previewCategorias()
    {
        $categorias = Categoria::withCount('produtos')->get();
        return Pdf::loadView('relatorios.categorias', compact('categorias'))->stream();
    }

    // ✅ Preview Pontos — corrigido para não depender de usuario_id
    public function previewPontos()
    {
        $pontos = Ponto::with('categoria')->orderBy('nome')->get();

        return Pdf::loadView('relatorios.pontos', compact('pontos'))->stream();
    }

    // ✅ Download PDF — ajustado para enviar os dados certos à view
    public function downloadPDF($tipo)
    {
        switch ($tipo) {
            case 'estoque':
                $fornecedor = auth()->user();
                $dados = ['produtos' => Estoque::where('user_id', $fornecedor->id)->with('produto.categoria')->get(), 'fornecedor' => $fornecedor];
                $view = 'relatorios.estoque-fornecedor';
                break;

            case 'produtos':
                $dados = ['produtos' => Produto::with('categoria')->get()];
                $view = 'relatorios.produtos';
                break;

            case 'encomendas':
                $dados = ['encomendas' => EncomendaItem::with(['encomenda', 'produto'])->orderBy('created_at', 'desc')->get()];
                $view = 'relatorios.encomendas';
                break;

            case 'categorias':
                $dados = ['categorias' => Categoria::withCount('produtos')->get()];
                $view = 'relatorios.categorias';
                break;

            case 'pontos':
                $dados = ['pontos' => Ponto::with('categoria')->orderBy('nome')->get()];
                $view = 'relatorios.pontos';
                break;

            default:
                abort(404);
        }

        $pdf = Pdf::loadView($view, $dados);
        return $pdf->download("relatorio_{$tipo}.pdf");
    }
}
