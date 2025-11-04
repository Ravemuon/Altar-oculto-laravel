@extends('layouts.app')

@section('title', 'Fornecedores')

@section('content')
<div class="container my-5">
    <h1>🏪 Fornecedores</h1>

    <a href="{{ route('fornecedores.create') }}" class="btn btn-success mb-3">➕ Adicionar Fornecedor</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fornecedores as $fornecedor)
            <tr>
                <td>{{ $fornecedor->nome }}</td>
                <td>{{ $fornecedor->email }}</td>
                <td>{{ $fornecedor->telefone ?? '-' }}</td>
                <td>
                    <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn-warning btn-sm">✏ Editar</a>
                    <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑 Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
    