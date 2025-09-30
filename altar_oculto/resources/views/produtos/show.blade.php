@extends('layouts.app')

@section('title', $produto->nome) <!-- Define o título da página como o nome do produto -->

@section('content')
<div class="container my-4">
    <!-- Título principal da página -->
    <h1 class="text-umbanda mb-4 text-center">{{ $produto->nome }}</h1>

    <!-- Botões de ação para o produto -->
    <div class="mb-4 d-flex justify-content-center gap-2 flex-wrap">

        {{-- Botão voltar --}}
        <div class="text-center mt-5">
            <a href="{{ url()->previous() }}" class="btn btn-umbanda btn-lg">
                ← Voltar
            </a>
    </div>

    </div>

    <!-- Seção principal: imagem e detalhes do produto -->
    <div class="row g-4">
        <!-- Coluna da imagem -->
        <div class="col-md-6 text-center">
            <img src="{{ $produto->imagem ?? 'https://via.placeholder.com/400x300.png?text='.$produto->nome }}"
                 class="img-fluid rounded shadow" alt="{{ $produto->nome }}">
        </div>

        <!-- Coluna de informações detalhadas -->
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <!-- Exibição dos principais atributos do produto -->
                <li class="list-group-item"><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</li>
                <li class="list-group-item"><strong>Categoria:</strong> {{ $produto->categoria->nome ?? 'Sem categoria' }}</li>
                <li class="list-group-item"><strong>Estoque:</strong> {{ $produto->estoque }}</li>
                <li class="list-group-item"><strong>Código:</strong> {{ $produto->codigo ?? '-' }}</li>
                <li class="list-group-item"><strong>Peso:</strong> {{ $produto->peso ?? '-' }} kg</li>
                <li class="list-group-item"><strong>Dimensões:</strong> {{ $produto->dimensoes ?? '-' }}</li>
                <li class="list-group-item"><strong>Tags:</strong> {{ $produto->tags ?? '-' }}</li>
                <li class="list-group-item"><strong>Popular:</strong> {{ $produto->popular ? 'Sim' : 'Não' }}</li>
                <li class="list-group-item"><strong>Ativo:</strong> {{ $produto->ativo ? 'Sim' : 'Não' }}</li>

                <!-- Exibição condicional de observações, se houver -->
                @if($produto->observacoes)
                    <li class="list-group-item"><strong>Observações:</strong> {{ $produto->observacoes }}</li>
                @endif

                <!-- Descrição completa do produto -->
                <li class="list-group-item"><strong>Descrição:</strong><br>{{ $produto->descricao }}</li>

                 <!-- Formulário para adicionar o produto ao carrinho -->
                <li>
                    <form action="{{ route('carrinho.adicionar', $produto->id) }}" method="POST" class="list-group-item">
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
