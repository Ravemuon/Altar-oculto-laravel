@extends('layouts.app')

@section('title', 'Entidades e Orixás')

@section('content')
<div class="container">
    <!-- Título -->
    <h1 class="mb-4 text-light">Categorias Públicas</h1>

    <div class="row">
        <!-- LINHAS -->
        <div class="col-md-6">
            <h3 class="text-light mb-3">Linhas</h3>
            @forelse($linhas as $categoria)
                <div class="card card-dark mb-4">
                    <div class="card-body text-center">
                        @if($categoria->imagem)
                            <img src="{{ $categoria->imagem }}" alt="{{ $categoria->nome }}" class="mb-3" style="max-width:150px;">
                        @endif
                        <h5>{{ $categoria->nome }}</h5>
                        <p>{{ $categoria->descricao ?? 'Sem descrição' }}</p>
                        <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-purple btn-sm">Ver detalhes</a>
                    </div>
                </div>
            @empty
                <p class="text-light">Nenhuma linha cadastrada.</p>
            @endforelse
        </div>

        <!-- ORIXÁS -->
        <div class="col-md-6">
            <h3 class="text-light mb-3">Orixás</h3>
            @forelse($orixas as $categoria)
                <div class="card card-dark mb-4">
                    <div class="card-body text-center">
                        @if($categoria->imagem)
                            <img src="{{ $categoria->imagem }}" alt="{{ $categoria->nome }}" class="mb-3" style="max-width:150px;">
                        @endif
                        <h5>{{ $categoria->nome }}</h5>
                        <p>{{ $categoria->descricao ?? 'Sem descrição' }}</p>
                        <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-purple btn-sm">Ver detalhes</a>
                    </div>
                </div>
            @empty
                <p class="text-light">Nenhum orixá cadastrado.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
