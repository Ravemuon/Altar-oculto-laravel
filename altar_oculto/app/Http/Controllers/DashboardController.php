<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use App\Models\EncomendaItem;
use App\Models\Produto;
use App\Models\Categoria;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Vendas Mensais
        $dadosVendas = Encomenda::selectRaw('MONTH(created_at) as mes, SUM(total) as total')
            ->groupBy('mes')
            ->pluck('total', 'mes');

        $chartVendas = (new LarapexChart)->barChart()
            ->setTitle('Vendas Mensais')
            ->addData('Total em R$', $dadosVendas->values()->toArray())
            ->setXAxis($dadosVendas->keys()->map(fn($m) => date("M", mktime(0,0,0,$m,1)))->toArray());

        // 2. Produtos Mais Vendidos
        $dadosProdutos = EncomendaItem::with('produto')
            ->selectRaw('produto_id, SUM(quantidade) as total')
            ->groupBy('produto_id')
            ->get()
            ->filter(fn($item) => $item->produto); // filtra itens sem produto

        $chartProdutos = (new LarapexChart)->pieChart()
            ->setTitle('Produtos Mais Vendidos')
            ->addData($dadosProdutos->pluck('total')->toArray())
            ->setLabels($dadosProdutos->pluck('produto.nome')->toArray());

        // 3. Categorias com mais produtos
        $dadosCategorias = Categoria::withCount('produtos')->get();
        $chartCategorias = (new LarapexChart)->barChart()
            ->setTitle('Produtos por Categoria')
            ->addData('Produtos', $dadosCategorias->pluck('produtos_count')->toArray())
            ->setXAxis($dadosCategorias->pluck('nome')->toArray());

        // 4. Produtos por Linha (join com categorias)
        $dadosLinhas = Produto::selectRaw('categorias.linha, COUNT(produtos.id) as total')
            ->join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
            ->groupBy('categorias.linha')
            ->get();

        $chartLinhas = (new LarapexChart)->barChart()
            ->setTitle('Produtos por Categoria')
            ->addData('Produtos', $dadosLinhas->pluck('total')->toArray())
            ->setXAxis($dadosLinhas->pluck('linha')->toArray());

        // 5. Encomendas por Status
        $dadosStatus = Encomenda::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->get();

        $chartStatus = (new LarapexChart)->pieChart()
            ->setTitle('Encomendas por Status')
            ->addData($dadosStatus->pluck('total')->toArray())
            ->setLabels($dadosStatus->pluck('status')->toArray());

        return view('Dashboard.index', compact(
            'chartVendas',
            'chartProdutos',
            'chartCategorias',
            'chartLinhas',
            'chartStatus'
        ));
    }
}
