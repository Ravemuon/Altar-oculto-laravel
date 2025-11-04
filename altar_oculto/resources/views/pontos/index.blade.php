@extends('layouts.app')

@section('title', 'Pontos da Umbanda')

@section('content')
<div class="container py-4">

    {{-- Título e botão de adicionar --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <h2 class="fw-bold text-umbanda mb-3 mb-md-0">
            Pontos de {{ $categoriaSelecionada ? $categoriaSelecionada->nome : 'Todos os Orixás' }}
        </h2>
        <a href="{{ route('pontos.create') }}" class="btn btn-umbanda shadow-sm">
            + Novo Ponto
        </a>
    </div>

    {{-- Filtro por categoria --}}
    <form action="{{ route('pontos.index') }}" method="GET" class="row g-3 align-items-end mb-4">
        <div class="col-md-6">
            <label for="categoria" class="form-label text-umbanda fw-semibold">Filtrar por Orixá/Linha</label>
            <select name="categoria" id="categoria" class="form-select">
                <option value="">-- Todas --</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ request('categoria') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-umbanda w-100">Filtrar</button>
        </div>
        <div class="col-md-3">
            <a href="{{ route('pontos.orixas') }}" class="btn btn-outline-secondary w-100">Voltar</a>
        </div>
    </form>

    {{-- Tabela de pontos --}}
    @if($pontos->isEmpty())
        <p class="text-center text-muted fst-italic">Nenhum ponto cadastrado ainda.</p>
    @else
        <div class="table-responsive shadow-sm rounded-4">
            <table class="table table-striped align-middle">
                <thead class="table-umbanda text-white">
                    <tr>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Autor</th>
                        <th>Letra</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pontos as $ponto)
                        <tr>
                            <td class="fw-semibold">{{ $ponto->titulo }}</td>
                            <td>{{ $ponto->categoria->nome ?? '—' }}</td>
                            <td>{{ $ponto->autor ?? 'Desconhecido' }}</td>
                            <td class="text-truncate" style="max-width: 250px;">{{ Str::limit($ponto->letra, 80) }}</td>
                            <td class="text-center">
                                <a href="{{ route('pontos.edit', $ponto->id) }}" class="btn btn-success btn-sm">Editar</a>
                                <form action="{{ route('pontos.destroy', $ponto->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Deseja realmente excluir este ponto?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
