@extends('layouts.app')

@section('title', 'Pontos')

@section('content')
<div class="container py-4">

    {{-- Título --}}
    <h1 class="mb-4 text-umbanda text-center display-6 fw-bold">Lista de Pontos</h1>

    {{-- Filtros: Categoria + Busca --}}
    <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
        {{-- Filtro por categoria --}}
        <form action="{{ route('pontos.index') }}" method="GET" class="d-flex align-items-center gap-2">
            <select name="categoria_id" class="form-select">
                <option value="">Todas as Categorias</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        @if(request('categoria_id') == $categoria->id) selected @endif>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-umbanda px-3">Filtrar</button>
        </form>

        {{-- Pesquisa por nome --}}
        <form action="{{ route('pontos.index') }}" method="GET" class="d-flex">
            {{-- Mantém filtro de categoria na pesquisa --}}
            <input type="hidden" name="categoria_id" value="{{ request('categoria_id') }}">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar ponto..."
                   value="{{ request('search') }}">
            <button type="submit" class="btn btn-umbanda ms-2 px-3">Pesquisar</button>
        </form>

        {{-- Botão para criar novo ponto --}}
        <a href="{{ route('pontos.create') }}" class="btn btn-success btn-lg shadow-sm px-4 py-2">
            + Novo Ponto
        </a>
    </div>

    @if($pontos->isEmpty())
        <p class="text-center text-umbanda fw-medium mt-5">Nenhum ponto encontrado.</p>
    @else
        <div class="row g-4 justify-content-center">
            @foreach($pontos as $ponto)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card card-umbanda h-100 shadow-sm rounded-4 overflow-hidden hover-shadow">
                        <a href="{{ route('pontos.show', $ponto->id) }}" class="text-decoration-none text-dark">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold text-umbanda">{{ $ponto->nome }}</h5>
                                <p class="card-text text-muted small">
                                    {{ ucfirst($ponto->tipo) }} - {{ $ponto->funcao ?? 'Sem função' }}
                                </p>
                                <p class="text-muted small">
                                    Categoria: {{ $ponto->categoria->nome ?? 'N/A' }}
                                </p>
                            </div>
                        </a>

                        {{-- Botões Editar e Excluir --}}
                        <div class="card-footer d-flex justify-content-center gap-2 flex-wrap bg-white border-0 pt-2 pb-3">
                            <a href="{{ route('pontos.edit', $ponto->id) }}"
                               class="btn btn-primary btn-sm px-3 py-1 fw-semibold hover-shadow">
                                Editar
                            </a>
                            <form action="{{ route('pontos.destroy', $ponto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir {{ $ponto->nome }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm px-3 py-1 fw-semibold hover-shadow">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

{{-- Efeito hover para botões --}}
<style>
.hover-shadow:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(107,63,160,0.2);
    transition: all 0.2s;
}
</style>
@endsection
