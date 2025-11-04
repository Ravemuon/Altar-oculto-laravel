@extends('layouts.app')

@section('title', 'Adicionar Estoque - ' . $fornecedor->nome)

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Adicionar Estoque para {{ $fornecedor->nome }}</h2>

    <form action="{{ route('fornecedores.adicionar-estoque', $fornecedor->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select name="produto_id" id="produto_id" class="form-select">
                @foreach(\App\Models\Produto::all() as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }} ({{ $produto->quantidade }} em estoque)</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade a adicionar</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-umbanda">Adicionar Estoque</button>
    </form>
</div>
@endsection
