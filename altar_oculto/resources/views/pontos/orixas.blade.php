     @extends('layouts.app')

@section('title', 'Pontos de Umbanda')

@section('content')
<div class="container py-4">
    <!-- Título -->
    <h1 class="mb-4 text-umbanda text-center display-6 fw-bold">
        Escolha o Orixá ou Linha para ver os Pontos
    </h1>

    {{-- Pesquisa e botão de novo ponto --}}
    <div class="d-flex justify-content-center mb-4 gap-3 flex-wrap">
        <a href="{{ route('pontos.create') }}" class="btn btn-umbanda btn-lg shadow-sm px-4 py-2">
            + Novo Ponto
        </a>

        <form action="{{ route('pontos.orixas') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar Orixá ou Linha..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-umbanda ms-2 px-3">Pesquisar</button>
        </form>
    </div>

    @php
        $orixas = $categorias->where('linha', 'orixa')->values();
        $linhas = $categorias->where('linha', 'linha')->values();
    @endphp

    {{-- Abas --}}
    <ul class="nav nav-tabs justify-content-center mb-4" id="pontosTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-semibold text-umbanda" id="orixas-tab" data-bs-toggle="tab" data-bs-target="#orixas" type="button" role="tab">Orixás</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold text-umbanda" id="linhas-tab" data-bs-toggle="tab" data-bs-target="#linhas" type="button" role="tab">Linhas</button>
        </li>
    </ul>

    {{-- Conteúdo das abas --}}
    <div class="tab-content" id="pontosTabsContent">
        @foreach(['orixas' => $orixas, 'linhas' => $linhas] as $tipo => $colecao)
            <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $tipo }}" role="tabpanel">
                @if($colecao->isEmpty())
                    <p class="text-center text-umbanda fw-medium">Nenhum registro encontrado.</p>
                @else
                    <div class="row g-4 justify-content-center">
                        @foreach($colecao as $categoria)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="card card-umbanda h-100 shadow-sm rounded-4 overflow-hidden hover-shadow">
                                    {{-- Card clicável --}}
                                    <a href="{{ route('pontos.index', ['categoria' => $categoria->id]) }}" class="text-decoration-none text-dark">
                                        @if($categoria->imagem)
                                            <img src="{{ $categoria->imagem }}" class="card-img-top" alt="{{ $categoria->nome }}" style="height:320px; object-fit:cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:320px;">
                                                <span class="text-muted">Sem imagem</span>
                                            </div>
                                        @endif
                                        <div class="card-body d-flex flex-column text-center">
                                            <h5 class="card-title fw-bold text-umbanda">{{ $categoria->nome }}</h5>
                                            <p class="card-text text-muted small">{{ $categoria->descricao ?? 'Sem descrição' }}</p>
                                        </div>
                                    </a>

                                    {{-- Botão de ver pontos --}}
                                    <div class="card-footer d-flex justify-content-center bg-white border-0 pb-3">
                                        <a href="{{ route('pontos.index', ['categoria' => $categoria->id]) }}"
                                           class="btn btn-info btn-sm px-4 py-1 shadow-sm text-white fw-semibold hover-shadow"
                                           style="transition: transform 0.2s;">
                                            Ver Pontos
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

{{-- Efeito de hover nos cards --}}
<style>
    .hover-shadow:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(107,63,160,0.25);
    }
</style>
@endsection
