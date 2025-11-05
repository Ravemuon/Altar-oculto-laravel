@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container py-4">
    {{-- Breadcrumb / Navegação rápida --}}
    <div class="mb-4 d-flex justify-content-between flex-wrap gap-2">
        <a href="{{ route('produtos.index') }}" class="btn btn-outline-dark shadow-sm">
            ← Voltar para Produtos
        </a>
        <a href="{{ route('relatorios.preview-estoque-fornecedor') }}" class="btn btn-outline-primary shadow-sm">
            📈 Ver Relatório de Estoque
        </a>
    </div>

    {{-- Título --}}
    <h1 class="text-center mb-4 display-6 fw-bold text-umbanda">📊 Dashboard</h1>

    {{-- Cards de gráficos --}}
    <div class="row g-4">

        {{-- Vendas Mensais --}}
        <div class="col-12 col-md-6">
            <div class="card shadow-sm rounded-4 p-3 h-100">
                <h5 class="card-title text-center fw-bold">Vendas Mensais</h5>
                {!! $chartVendas->container() !!}
            </div>
        </div>

        {{-- Produtos Mais Vendidos --}}
        <div class="col-12 col-md-6">
            <div class="card shadow-sm rounded-4 p-3 h-100">
                <h5 class="card-title text-center fw-bold">Produtos Mais Vendidos</h5>
                {!! $chartProdutos->container() !!}
            </div>
        </div>

        {{-- Produtos por Categoria --}}
        <div class="col-12 col-md-6">
            <div class="card shadow-sm rounded-4 p-3 h-100">
                <h5 class="card-title text-center fw-bold">Produtos por Categoria</h5>
                {!! $chartCategorias->container() !!}
            </div>
        </div>

        {{-- Produtos por Linha --}}
        <div class="col-12 col-md-6">
            <div class="card shadow-sm rounded-4 p-3 h-100">
                <h5 class="card-title text-center fw-bold">Produtos por Linha</h5>
                {!! $chartLinhas->container() !!}
            </div>
        </div>

        {{-- Encomendas por Status --}}
        <div class="col-12">
            <div class="card shadow-sm rounded-4 p-3 h-100">
                <h5 class="card-title text-center fw-bold">Encomendas por Status</h5>
                {!! $chartStatus->container() !!}
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{!! $chartVendas->script() !!}
{!! $chartProdutos->script() !!}
{!! $chartCategorias->script() !!}
{!! $chartLinhas->script() !!}
{!! $chartStatus->script() !!}
@endpush

<style>
.card {
    background-color: #fff;
    transition: transform 0.2s, box-shadow 0.2s;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.15);
}
</style>
@endsection
