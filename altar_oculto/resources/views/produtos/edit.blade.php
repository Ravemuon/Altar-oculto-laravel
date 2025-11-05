@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center fw-bold text-umbanda">✏ Editar Produto</h1>

    {{-- Botão voltar --}}
    <div class="text-center mb-4">
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary btn-sm">← Voltar</a>
    </div>

    {{-- Erros de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card card-umbanda p-4 shadow-lg mx-auto" style="max-width: 600px;">
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $produto->nome) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3" required>{{ old('descricao', $produto->descricao) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control" value="{{ old('preco', $produto->preco) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Categoria</label>
                <select name="categoria_id" class="form-control" required>
                    <option value="">-- Selecione --</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id', $produto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Preview da imagem atual --}}
            <div class="mb-3 text-center">
                <label class="form-label fw-bold">Imagem Atual</label>
                <br>
                @php
                    $img = $produto->imagem;
                    if ($img && file_exists(public_path('storage/' . $img))) {
                        $src = asset('storage/' . $img);
                    } elseif ($img) {
                        $src = $img;
                    } else {
                        $src = 'https://via.placeholder.com/400x300.png?text=' . urlencode($produto->nome);
                    }
                @endphp
                <img src="{{ $src }}" class="img-fluid rounded shadow" style="max-height: 300px;" alt="{{ $produto->nome }}">
            </div>

            {{-- Upload de nova imagem --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Trocar Imagem (Upload)</label>
                <input type="file" name="imagem_upload" class="form-control">
            </div>

            {{-- URL da imagem --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Imagem (URL)</label>
                <input type="url" name="imagem" class="form-control" value="{{ old('imagem', $produto->imagem) }}">
            </div>

            {{-- Estoque, código, peso, dimensões, tags --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Estoque</label>
                <input type="number" name="estoque" class="form-control" value="{{ old('estoque', $produto->estoque) }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Código</label>
                <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $produto->codigo) }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Peso (kg)</label>
                <input type="number" step="0.01" name="peso" class="form-control" value="{{ old('peso', $produto->peso) }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Dimensões</label>
                <input type="text" name="dimensoes" class="form-control" value="{{ old('dimensoes', $produto->dimensoes) }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tags</label>
                <input type="text" name="tags" class="form-control" value="{{ old('tags', $produto->tags) }}">
            </div>

            {{-- Popular e Ativo --}}
            <div class="form-check form-switch mb-3">
                <input type="checkbox" name="popular" class="form-check-input" id="popular" {{ old('popular', $produto->popular) ? 'checked' : '' }}>
                <label class="form-check-label" for="popular">Popular</label>
            </div>

            <div class="form-check form-switch mb-3">
                <input type="checkbox" name="ativo" class="form-check-input" id="ativo" {{ old('ativo', $produto->ativo) ? 'checked' : '' }}>
                <label class="form-check-label" for="ativo">Ativo</label>
            </div>

            {{-- Observações --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Observações</label>
                <textarea name="observacoes" class="form-control" rows="2">{{ old('observacoes', $produto->observacoes) }}</textarea>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-umbanda btn-lg">💾 Atualizar Produto</button>
            </div>
        </form>
    </div>
</div>
@endsection
