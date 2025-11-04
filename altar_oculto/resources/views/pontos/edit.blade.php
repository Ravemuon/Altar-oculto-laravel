@extends('layouts.app')

@section('title', 'Editar Ponto')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-umbanda mb-4 text-center">Editar Ponto</h2>

    <form action="{{ route('pontos.update', $ponto->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow rounded-4 mx-auto" style="max-width:700px;">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Orixá / Linha</label>
            <select name="categoria_id" class="form-select" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $ponto->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Título do ponto</label>
            <input type="text" name="titulo" value="{{ $ponto->titulo }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Autor / Origem</label>
            <input type="text" name="autor" value="{{ $ponto->autor }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Letra do ponto</label>
            <textarea name="letra" rows="6" class="form-control" required>{{ $ponto->letra }}</textarea>
        </div>

        @if($ponto->audio)
            <p class="text-center small">Áudio atual: <a href="{{ asset('storage/'.$ponto->audio) }}" target="_blank">Ouvir</a></p>
        @endif

        <div class="mb-3">
            <label class="form-label fw-semibold">Novo Áudio (opcional)</label>
            <input type="file" name="audio" class="form-control" accept="audio/*">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-umbanda btn-lg px-5">Salvar Alterações</button>
            <a href="{{ route('pontos.index') }}" class="btn btn-outline-secondary ms-2">Cancelar</a>
        </div>
    </form>
</div>
@endsection
