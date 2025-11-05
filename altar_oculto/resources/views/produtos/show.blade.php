@extends('layouts.app')

@section('title', $produto->nome)

@section('content')
<div class="container my-4">
    <h1 class="text-umbanda mb-4 text-center">{{ $produto->nome }}</h1>

    {{-- Botão voltar --}}
    <div class="mb-4 d-flex justify-content-center gap-2 flex-wrap">
        <a href="{{ url()->previous() }}" class="btn btn-umbanda btn-lg">← Voltar</a>
    </div>

    <div class="row g-4">
        {{-- Coluna da imagem --}}
        <div class="col-md-6 text-center">
            @php
                $img = $produto->imagem;
                if ($img && file_exists(public_path('storage/' . $img))) {
                    $src = asset('storage/' . $img);
                } elseif ($img) {
                    $src = $img;
                } else {
                    $src = 'https://via.placeholder.com/400x300.png?text=' . urlencode($produto->nome);
                }
            @endphp
            <img src="{{ $src }}" class="img-fluid rounded shadow" alt="{{ $produto->nome }}">
        </div>

        {{-- Coluna de informações --}}
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</li>
                <li class="list-group-item"><strong>Categoria:</strong> {{ $produto->categoria->nome ?? 'Sem categoria' }}</li>
                <li class="list-group-item"><strong>Estoque:</strong> {{ $produto->estoque ?? '-' }}</li>
                <li class="list-group-item"><strong>Código:</strong> {{ $produto->codigo ?? '-' }}</li>
                <li class="list-group-item"><strong>Peso:</strong> {{ $produto->peso ?? '-' }} kg</li>
                <li class="list-group-item"><strong>Dimensões:</strong> {{ $produto->dimensoes ?? '-' }}</li>
                <li class="list-group-item"><strong>Tags:</strong> {{ $produto->tags ?? '-' }}</li>
                <li class="list-group-item"><strong>Popular:</strong> {{ $produto->popular ? 'Sim' : 'Não' }}</li>
                <li class="list-group-item"><strong>Ativo:</strong> {{ $produto->ativo ? 'Sim' : 'Não' }}</li>

                @if($produto->observacoes)
                    <li class="list-group-item"><strong>Observações:</strong> {{ $produto->observacoes }}</li>
                @endif

                <li class="list-group-item"><strong>Descrição:</strong><br>{{ $produto->descricao }}</li>

                {{-- Botão adicionar ao carrinho --}}
                <li class="list-group-item">
                    <form action="{{ route('carrinho.adicionar', $produto->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm text-dark" style="background-color: #FFD700; font-weight:bold;">
                            ➕ Carrinho
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
