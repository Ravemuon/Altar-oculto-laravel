@extends('layouts.app')
@section('title', $ponto->nome)

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-umbanda mb-4">{{ $ponto->nome }}</h2>

    <p><strong>Tipo:</strong> {{ ucfirst($ponto->tipo) }}</p>
    <p><strong>Função:</strong> {{ $ponto->funcao ?? 'Sem função' }}</p>
    <p><strong>Entidade:</strong> {{ $ponto->entidade ?? 'Desconhecida' }}</p>
    <p><strong>Categoria:</strong> {{ $ponto->categoria->nome ?? 'Sem categoria' }}</p>
    <p><strong>Descrição:</strong> {{ $ponto->descricao ?? 'Nenhuma descrição' }}</p>

    @if($ponto->letra)
        <h5>Letra</h5>
        <p>{{ $ponto->letra }}</p>
    @endif

    @if($ponto->simbolo)
        <h5>Símbolo</h5>
        <p>{{ $ponto->simbolo }}</p>
    @endif

    @if($ponto->audio)
        <h5>Áudio</h5>
        <audio controls>
            <source src="{{ asset('storage/' . $ponto->audio) }}" type="audio/mpeg">
            Seu navegador não suporta áudio.
        </audio>
    @endif

    <div class="mt-4">
        <a href="{{ route('pontos.index') }}" class="btn btn-umbanda">← Voltar</a>
    </div>
</div>
@endsection
