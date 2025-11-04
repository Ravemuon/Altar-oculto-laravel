<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\EncomendaItem;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use DB;

class RelatorioController extends Controller
{
    // === Gráfico 1: Produtos mais vendidos ===
    public function graficoProdutosMaisVendidos()
    {
        $dados = EncomendaItem::select('produto_id', DB::raw('SUM(quantidade) as total'))
            ->groupBy('produto_id')
            ->orderByDesc('total')
            ->take(5)
            ->with('produto')
            ->get();

        $nomes = $dados->pluck('produto.nome')->toArray();
        $quantidades = $dados->pluck('total')->toArray();

        $chart = (new LarapexChart)->barChart()
            ->setTitle('Top 5 Produtos Mais Vendidos')
            ->setSubtitle('Baseado nas encomendas')
            ->addData('Quantidade Vendida', $quantidades)
            ->setXAxis($nomes);

        return $chart;
    }

    // === Gráfico 2: Faturamento Mensal ===
    public function graficoFaturamentoMensal()
    {
        $dados = EncomendaItem::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('SUM(subtotal) as total')
        )
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $meses = $dados->pluck('mes')->map(function ($m) {
            return Carbon::create()->month($m)->translatedFormat('F');
        })->toArray();

        $totais = $dados->pluck('total')->toArray();

        $chart = (new LarapexChart)->areaChart()
            ->setTitle('Faturamento Mensal')
            ->setSubtitle('Total em R$ por mês')
            ->addData('Faturamento', $totais)
            ->setXAxis($meses);

        return $chart;
    }
}
