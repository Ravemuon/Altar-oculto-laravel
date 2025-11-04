<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use Illuminate\Http\Request;
use App\Models\EncomendaItem;

class PontoController extends Controller
{

    public function vendasMensais()
    {
        $dados = Encomenda::selectRaw('MONTH(created_at) as mes, SUM(total) as total')
            ->groupBy('mes')
            ->pluck('total', 'mes');

        $chart = (new LarapexChart)->barChart()
            ->setTitle('Vendas Mensais')
            ->addData('Total em R$', $dados->values()->toArray())
            ->setXAxis($dados->keys()->map(fn($m) => date("M", mktime(0,0,0,$m,1)))->toArray());

        return view('graficos.vendas', compact('chart'));
    }
    public function produtosMaisVendidos()
    {
    $dados = EncomendaItem::selectRaw('produto_id, SUM(quantidade) as total')
        ->groupBy('produto_id')
        ->with('produto')
        ->get();

    $chart = (new LarapexChart)->pieChart()
        ->setTitle('Produtos Mais Vendidos')
        ->addData($dados->pluck('total')->toArray())
        ->setLabels($dados->pluck('produto.nome')->toArray());

    return view('graficos.produtos', compact('chart'));
    }


}


