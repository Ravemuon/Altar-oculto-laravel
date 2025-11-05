@extends('layouts.app')

@section('title', 'Relatórios')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">📄 Relatórios</h2>

    <div class="row g-4">
        @php
            $relatorios = [
                'Estoque do Fornecedor' => 'preview-estoque-fornecedor',
                'Produtos' => 'preview-produtos',
                'Encomendas' => 'preview-encomendas',
                'Categorias' => 'preview-categorias',
                'Pontos' => 'preview-pontos',
            ];
        @endphp

        @foreach($relatorios as $nome => $rota)
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">{{ $nome }}</h4>
                    <div class="mb-3">
                        {{-- Corrigido: prefixo plural "relatorios." --}}
                        <a href="{{ route("relatorios.$rota") }}" target="_blank" class="btn btn-primary me-2 mb-2">👁️ Visualizar PDF</a>
                        <a href="{{ route('relatorios.download-pdf', explode('-', $rota)[1]) }}" class="btn btn-success mb-2">📥 Download PDF</a>
                    </div>
                    <iframe src="{{ route("relatorios.$rota") }}" style="width: 100%; height: 350px; border-radius: 8px;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
