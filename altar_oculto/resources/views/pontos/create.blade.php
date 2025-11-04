@extends('layouts.app')

@section('title', 'Cadastrar Ponto')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-umbanda mb-4 text-center">Cadastrar Novo Ponto</h2>

    <form action="{{ route('pontos.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow rounded-4 mx-auto" style="max-width:700px;">
        @csrf

        {{-- Categoria --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Orixá / Linha</label>
            <select name="categoria_id" class="form-select" required>
                <option value="">Selecione...</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        {{-- Título --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Título do ponto</label>
            <input type="text" name="titulo" class="form-control" placeholder="Ex: Ponto de Ogum" required>
        </div>

        {{-- Autor --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Autor / Origem</label>
            <input type="text" name="autor" class="form-control" placeholder="Ex: Tradição popular" />
        </div>

        {{-- Letra --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Letra do ponto</label>
            <textarea name="letra" rows="6" class="form-control" placeholder="Digite a letra completa do ponto..." required></textarea>
        </div>

        {{-- Arquivo de áudio (opcional) --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Arquivo de Áudio (opcional)</label>
            <input type="file" name="audio" class="form-control" accept="audio/*">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-umbanda btn-lg px-5">Salvar</button>
            <a href="{{ route('pontos.index') }}" class="btn btn-outline-secondary ms-2">Cancelar</a>
        </div>
    </form>
</div>
@endsection
