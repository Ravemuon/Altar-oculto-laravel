@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<div class="container mt-5">

    <h1 class="mb-4 text-center fw-bold text-umbanda">📦 Novo Produto</h1>

    {{-- Botão de voltar --}}
    <div class="text-center mb-4">
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary btn-sm">← Voltar</a>
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
    <div class="card card-umbanda p-4 shadow-lg mx-auto" style="max-width: 600px;">
        <form action="{{ route('produtos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label fw-bold">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label fw-bold">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3" required>{{ old('descricao') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label fw-bold">Preço</label>
                <input type="number" step="0.01" name="preco" id="preco" class="form-control" value="{{ old('preco') }}" required>
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label fw-bold">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="form-control" required>
                    <option value="">-- Selecione --</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label fw-bold">Imagem (URL)</label>
                <input type="url" name="imagem" id="imagem" class="form-control" value="{{ old('imagem') }}">
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-umbanda btn-lg">💾 Salvar Produto</button>
            </div>
        </form>
    </div>

</div>
@endsection
