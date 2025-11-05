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
        switch($tipo) {
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
        $encomendas = EncomendaItem::with(['encomenda', 'produto'])->orderBy('created_at', 'desc')->get();
        return Pdf::loadView('relatorios.encomendas', compact('encomendas'))->stream();
    }

    // Preview Categorias
    public function previewCategorias()
    {
        $categorias = Categoria::withCount('produtos')->get();
        return Pdf::loadView('relatorios.categorias', compact('categorias'))->stream();
    }

    // Preview Pontos
    public function previewPontos()
    {
        $usuarios = Usuario::with('pontos')->get();
        return Pdf::loadView('relatorios.pontos', compact('usuarios'))->stream();
    }

    // Download PDF
    public function downloadPDF($tipo)
    {
        switch($tipo) {
            case 'estoque': $view = 'relatorios.estoque-fornecedor'; break;
            case 'produtos': $view = 'relatorios.produtos'; break;
            case 'encomendas': $view = 'relatorios.encomendas'; break;
            case 'categorias': $view = 'relatorios.categorias'; break;
            case 'pontos': $view = 'relatorios.pontos'; break;
            default: abort(404);
        }

        $pdf = Pdf::loadView($view);
        return $pdf->download("relatorio_{$tipo}.pdf");
    }
}
