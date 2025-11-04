@extends('layouts.app')

@section('title', 'Editar Quantidade do Produto')

@section('content')
<div class="container my-5">
    <h1>✏ Editar Quantidade - {{ $produto->nome }}</h1>

    <form action="{{ route('fornecedores.atualizar-estoque', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Quantidade</label>
            <input type="number" name="quantidade" class="form-control" value="{{ $quantidade }}" min="0" required>
        </div>

        <button type="submit" class="btn btn-warning">Atualizar</button>
    </form>
</div>
@endsection
