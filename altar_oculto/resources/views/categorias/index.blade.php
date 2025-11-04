@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<div class="container py-4">
    <!-- Título -->
    <h1 class="mb-4 text-umbanda text-center display-6 fw-bold">Linhas e Divindades da Umbanda</h1>

    {{-- Botões: Adicionar e Pesquisar --}}
    <div class="d-flex justify-content-center mb-4 gap-3 flex-wrap">
        <a href="{{ route('categorias.create') }}" class="btn btn-umbanda btn-lg shadow-sm px-4 py-2">
            + Nova Categoria
        </a>

        <form action="{{ route('categorias.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar categoria..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-umbanda ms-2 px-3">Pesquisar</button>
        </form>
    </div>

    @php
        $orixas = $categorias->where('linha', 'orixa')->values();
        $linhas = $categorias->where('linha', 'linha')->values();
        $itens  = $categorias->whereNotIn('linha', ['orixa','linha'])->values();
    @endphp

    {{-- Abas --}}
    <ul class="nav nav-tabs justify-content-center mb-4" id="categoriasTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-semibold text-umbanda" id="orixas-tab" data-bs-toggle="tab" data-bs-target="#orixas" type="button" role="tab">Orixás</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold text-umbanda" id="linhas-tab" data-bs-toggle="tab" data-bs-target="#linhas" type="button" role="tab">Linhas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold text-umbanda" id="itens-tab" data-bs-toggle="tab" data-bs-target="#itens" type="button" role="tab">Itens</button>
        </li>
    </ul>

    <div class="tab-content" id="categoriasTabsContent">
        @foreach(['orixas' => $orixas, 'linhas' => $linhas, 'itens' => $itens] as $tipo => $colecao)
            <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $tipo }}" role="tabpanel">
                @if($colecao->isEmpty())
                    <p class="text-center text-umbanda fw-medium">Nenhum registro cadastrado.</p>
                @else
                    <div class="row g-4 justify-content-center">
                        @foreach($colecao as $categoria)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="card card-umbanda h-100 shadow-sm rounded-4 overflow-hidden hover-shadow">
                                    {{-- Card clicável --}}
                                    <a href="{{ route('categorias.show', $categoria->id) }}" class="text-decoration-none text-dark">
                                        @if($categoria->imagem)
                                            <img src="{{ $categoria->imagem }}" class="card-img-top" alt="{{ $categoria->nome }}" style="height:320px; object-fit:cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:320px;">
                                                <span class="text-muted">Sem imagem</span>
                                            </div>
                                        @endif
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-center fw-bold text-umbanda">{{ $categoria->nome }}</h5>
                                            <p class="card-text text-center text-muted small">{{ $categoria->descricao ?? 'Sem descrição' }}</p>
                                        </div>
                                    </a>

                                    {{-- Botão de Produtos --}}
                                    <div class="card-footer d-flex justify-content-center bg-white border-0 pb-2">
                                        <a href="{{ route('produtos.index') }}?categoria={{ $categoria->id }}"
                                           class="btn btn-info btn-sm px-4 py-1 shadow-sm text-white fw-semibold hover-shadow"
                                           style="transition: transform 0.2s;">
                                            Produtos
                                        </a>
                                    </div>
                                    {{-- Botão de Pontos --}}
                                    <div class="card-footer d-flex justify-content-center bg-white border-0 pb-2">
                                        <a href="{{ route('pontos.index') }}?categoria_id={{ $categoria->id }}"
                                        class="btn btn-umbanda btn-sm px-4 py-1 shadow-sm text-white fw-semibold hover-shadow"
                                        style="transition: transform 0.2s;">
                                            🎵 Pontos
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>

{{-- Custom hover effect para botões --}}
<style>
    .hover-shadow:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(107,63,160,0.2);
    }
</style>
@endsection
