@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Categorias -->
<section class="mb-5">
    <h2 class="text-umbanda mb-4 section-title">Categorias</h2>
    <div class="d-flex flex-wrap gap-3 justify-content-center">
        @foreach($categorias as $categoria)
            <a href="{{ route('produtos.index') }}?categoria={{ $categoria->id }}"
               class="btn btn-outline-umbanda fw-bold px-4 py-2 text-nowrap shadow-sm hover-shadow">
                {{ $categoria->nome }}
            </a>
        @endforeach
    </div>
</section>

<!-- Itens Recentes -->
<section class="mb-5">
    <h2 class="text-umbanda mb-4 section-title">Itens Recentes</h2>
    <div class="row g-4">
        @foreach($produtosRecentes as $produto)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{ route('produtos.show', $produto->id) }}" class="text-decoration-none text-dark">
                    <div class="card card-umbanda h-100 shadow-sm rounded-4 overflow-hidden hover-shadow">

                        {{-- Imagem do produto --}}
                        @if($produto->imagem)
                            <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nome }}" style="height:250px; object-fit:cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:250px;">
                                <span class="text-muted">Sem imagem</span>
                            </div>
                        @endif

                        {{-- Conteúdo do card --}}
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-umbanda fw-bold text-center">{{ $produto->nome }}</h5>
                            <p class="card-text small text-truncate">{{ Str::limit($produto->descricao, 100, '...') }}</p>
                            <div class="text-center mt-auto">
                                <span class="text-umbanda fw-bold">Leia mais...</span>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>

<!-- História dos Orixás -->
<section class="mb-5">
    <h2 class="text-umbanda mb-4 section-title">História dos Orixás</h2>
    <div class="row g-4">
        @foreach($categorias->where('linha','orixa') as $orixa)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="{{ route('categorias.show', $orixa->id) }}" class="text-decoration-none text-dark">
                    <div class="card card-umbanda h-100 shadow-sm rounded-4 overflow-hidden hover-shadow">

                        {{-- Imagem do orixá --}}
                        @if($orixa->imagem)
                            <img src="{{ $orixa->imagem }}" class="card-img-top" alt="{{ $orixa->nome }}" style="height:450px; object-fit:cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:300px;">
                                <span class="text-muted">Sem imagem</span>
                            </div>
                        @endif

                        {{-- Conteúdo do card --}}
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-umbanda fw-bold text-center">{{ $orixa->nome }}</h5>
                            <p class="card-text small text-truncate">{{ Str::limit($orixa->historia, 120, '...') }}</p>
                            <div class="text-center mt-auto">
                                <span class="text-umbanda fw-bold">Leia mais...</span>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>

<!-- História das Linhas -->
<section class="mb-5">
    <h2 class="text-umbanda mb-4 section-title">História das Linhas</h2>
    <div class="row g-4">
        @foreach($categorias->where('linha','linha') as $linha)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="{{ route('categorias.show', $linha->id) }}" class="text-decoration-none text-dark">
                    <div class="card card-umbanda h-100 shadow-sm rounded-4 overflow-hidden hover-shadow">

                        {{-- Imagem da linha --}}
                        @if($linha->imagem)
                            <img src="{{ $linha->imagem }}" class="card-img-top" alt="{{ $linha->nome }}" style="height:250px; object-fit:cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:250px;">
                                <span class="text-muted">Sem imagem</span>
                            </div>
                        @endif

                        {{-- Conteúdo do card --}}
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-umbanda fw-bold text-center">{{ $linha->nome }}</h5>
                            <p class="card-text small text-truncate">{{ Str::limit($linha->historia, 100, '...') }}</p>
                            <div class="text-center mt-auto">
                                <span class="text-umbanda fw-bold">Leia mais...</span>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>

@endsection
