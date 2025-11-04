@extends('layouts.app')
@section('title', 'Criar Ponto')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-umbanda mb-4">Criar Novo Ponto</h2>

    <form action="{{ route('pontos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select name="tipo" class="form-select" required>
                <option value="cantado">Cantado</option>
                <option value="riscado">Riscado</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Entidade</label>
            <input type="text" name="entidade" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Função</label>
            <input type="text" name="funcao" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Letra</label>
            <textarea name="letra" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Símbolo</label>
            <textarea name="simbolo" class="form-control" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="categoria_id" class="form-select" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Áudio</label>
            <input type="file" name="audio" class="form-control" accept=".mp3,.wav">
        </div>

        <button type="submit" class="btn btn-umbanda">Salvar Ponto</button>
        <a href="{{ route('pontos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
