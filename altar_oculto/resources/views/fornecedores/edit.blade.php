@extends('layouts.app')

@section('title', 'Editar Fornecedor')

@section('content')
<div class="container my-5">
    <h1>✏ Editar Fornecedor</h1>

    <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $fornecedor->nome }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $fornecedor->email }}" required>
        </div>

        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ $fornecedor->telefone }}">
        </div>

        <div class="mb-3">
            <label>Endereço</label>
            <input type="text" name="endereco" class="form-control" value="{{ $fornecedor->endereco }}">
        </div>

        <button type="submit" class="btn btn-warning">Atualizar</button>
    </form>
</div>
@endsection
