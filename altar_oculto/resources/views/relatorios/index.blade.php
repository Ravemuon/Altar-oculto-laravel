@extends('layouts.app')
@section('title', 'Relatórios')

@section('content')
<div class="container text-center">
    <h1 class="text-umbanda mb-5">📊 Relatórios de Vendas e Faturamento</h1>

    <div class="row justify-content-center">
        <div class="col-md-6 mb-5">
            {!! $graficoProdutos->container() !!}
        </div>
        <div class="col-md-6 mb-5">
            {!! $graficoFaturamento->container() !!}
        </div>
    </div>
</div>

<script src="{{ $graficoProdutos->cdn() }}"></script>
{{ $graficoProdutos->script() }}
{{ $graficoFaturamento->script() }}
@endsection
