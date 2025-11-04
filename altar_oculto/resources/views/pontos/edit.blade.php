@extends('layouts.app')
@section('title', 'Editar Ponto')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-umbanda mb-4">Editar Ponto: {{ $ponto->nome }}</h2>

    <form action="{{ route('pontos.update', $ponto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $ponto->nome }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select name="tipo" class="form-select" required>
                <option value="cantado" {{ $ponto->tipo == 'cantado' ? 'selected' : '' }}>Cantado</option>
                <option value="riscado" {{ $ponto->tipo == 'riscado' ? 'selected' : '' }}>Riscado</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Entidade</label>
            <input type="text" name="entidade" class="form-control" value="{{ $ponto->entidade }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Função</label>
            <input type="text" name="funcao" class="form-control" value="{{ $ponto->funcao }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Letra</label>
            <textarea name="letra" class="form-control" rows="4">{{ $ponto->letra }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Símbolo</label>
            <textarea name="simbolo" class="form-control" rows="2">{{ $ponto->simbolo }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="categoria_id" class="form-select" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $ponto->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3">{{ $ponto->descricao }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Áudio</label>
            <input type="file" name="audio" class="form-control" accept=".mp3,.wav">
            @if($ponto->audio)
                <small>Arquivo atual: {{ $ponto->audio }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-umbanda">Atualizar Ponto</button>
        <a href="{{ route('pontos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
