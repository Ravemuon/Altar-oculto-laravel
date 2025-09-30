@extends('layouts.app')

@section('title', isset($produto) ? 'Editar Produto' : 'Novo Produto')

@section('content')
<div class="container mt-5">

    <h1 class="mb-4 text-center fw-bold text-umbanda">
        {{ isset($produto) ? '✏ Editar Produto' : '📦 Novo Produto' }}
    </h1>

    <div class="text-center mb-4">
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary btn-sm">← Voltar aos Produtos</a>
    </div>

    {{-- Exibe erros de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Card do formulário --}}
    <div class="card card-umbanda p-4 shadow-lg mx-auto" style="max-width: 900px;">
        <form action="{{ isset($produto) ? route('produtos.update', $produto) : route('produtos.store') }}" method="POST">
            @csrf
            @if(isset($produto)) @method('PUT') @endif

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ old('nome', $produto->nome ?? '') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Preço</label>
                    <input type="number" step="0.01" name="preco" class="form-control" value="{{ old('preco', $produto->preco ?? '') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Categoria</label>
                    <select name="categoria_id" class="form-select" required>
                        <option value="">-- Selecione --</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ old('categoria_id', $produto->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Estoque</label>
                    <input type="number" name="estoque" class="form-control" value="{{ old('estoque', $produto->estoque ?? 0) }}" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-bold">Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3" required>{{ old('descricao', $produto->descricao ?? '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Imagem (URL)</label>
                    <input type="url" name="imagem" class="form-control" value="{{ old('imagem', $produto->imagem ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Código</label>
                    <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $produto->codigo ?? '') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bold">Peso (kg)</label>
                    <input type="number" step="0.01" name="peso" class="form-control" value="{{ old('peso', $produto->peso ?? '') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bold">Dimensões (L x A x P cm)</label>
                    <input type="text" name="dimensoes" class="form-control" value="{{ old('dimensoes', $produto->dimensoes ?? '') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bold">Tags (vírgula separada)</label>
                    <input type="text" name="tags" class="form-control" value="{{ old('tags', $produto->tags ?? '') }}">
                </div>

                <div class="col-md-6 form-check">
                    <input type="hidden" name="popular" value="0">
                    <input type="checkbox" class="form-check-input" name="popular" id="popular" value="1"
                        {{ old('popular', $produto->popular ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="popular">Produto Popular</label>
                </div>

                <div class="col-md-6 form-check">
                    <input type="hidden" name="ativo" value="0">
                    <input type="checkbox" class="form-check-input" name="ativo" id="ativo" value="1"
                        {{ old('ativo', $produto->ativo ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="ativo">Produto Ativo</label>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-bold">Observações</label>
                    <textarea name="observacoes" class="form-control" rows="2">{{ old('observacoes', $produto->observacoes ?? '') }}</textarea>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-umbanda btn-lg">
                    {{ isset($produto) ? '💾 Atualizar Produto' : '💾 Salvar Produto' }}
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
