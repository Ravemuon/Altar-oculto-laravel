@extends('layouts.app')
@section('title', $ponto->nome)

@section('content')
<div class="container py-4">

    {{-- Título --}}
    <h2 class="fw-bold text-umbanda mb-4 text-center">{{ $ponto->nome }}</h2>

    {{-- Informações principais --}}
    <div class="row mb-4">
        <div class="col-12 col-md-6">
            <ul class="list-group list-group-flush shadow-sm rounded-4">
                <li class="list-group-item"><strong>Tipo:</strong> {{ ucfirst($ponto->tipo) }}</li>
                <li class="list-group-item"><strong>Função:</strong> {{ $ponto->funcao ?? 'Sem função' }}</li>
                <li class="list-group-item"><strong>Entidade:</strong> {{ $ponto->entidade ?? 'Desconhecida' }}</li>
                <li class="list-group-item"><strong>Categoria:</strong> {{ $ponto->categoria->nome ?? 'Sem categoria' }}</li>
            </ul>
        </div>

        <div class="col-12 col-md-6">
            @if($ponto->audio)
                <div class="card shadow-sm rounded-4 p-3 h-100">
                    <h5 class="card-title text-center fw-bold">Áudio</h5>
                    <audio controls autoplay preload="auto" class="w-100 mt-2">
                        <source src="{{ asset('storage/' . $ponto->audio) }}" type="audio/mpeg">
                        Seu navegador não suporta áudio.
                    </audio>
                    <small class="text-muted d-block text-center mt-2">O ponto será reproduzido automaticamente.</small>
                </div>
            @endif
        </div>
    </div>

    {{-- Descrição --}}
    <div class="mb-4">
        <h5 class="fw-bold text-umbanda">Descrição</h5>
        <p class="text-muted">{{ $ponto->descricao ?? 'Nenhuma descrição disponível.' }}</p>
    </div>

    {{-- Letra --}}
    @if($ponto->letra)
        <div class="mb-4">
            <h5 class="fw-bold text-umbanda">Letra</h5>
            <div class="card shadow-sm rounded-4 p-3 bg-light">
                <pre class="mb-0" style="white-space: pre-wrap; word-wrap: break-word;">{{ $ponto->letra }}</pre>
            </div>
        </div>
    @endif

    {{-- Símbolo --}}
    @if($ponto->simbolo)
        <div class="mb-4">
            <h5 class="fw-bold text-umbanda">Símbolo</h5>
            <div class="card shadow-sm rounded-4 p-3 bg-light text-center">
                <p class="mb-0">{{ $ponto->simbolo }}</p>
            </div>
        </div>
    @endif

    {{-- Botão de voltar --}}
    <div class="mt-4 text-center">
        <a href="{{ route('pontos.index') }}" class="btn btn-umbanda px-4 py-2">← Voltar para Lista</a>
    </div>
</div>

{{-- Estilos adicionais --}}
<style>
.card {
    transition: transform 0.2s, box-shadow 0.2s;
}
.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 24px rgba(107,63,160,0.15);
}
</style>
@endsection
