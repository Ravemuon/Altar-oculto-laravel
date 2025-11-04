@extends('layouts.app')

@section('title', 'Adicionar Produto ao Estoque')

@section('content')
<div class="container my-5">
    <h1>➕ Adicionar Produto ao Estoque</h1>

    <form action="{{ route('fornecedores.salvar-estoque') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Produto</label>
            <select name="produto_id" class="form-control" required>
                @foreach($produtos as $produto)
                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Quantidade</label>
            <input type="number" name="quantidade" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Adicionar</button>
    </form>
</div>
@endsection
