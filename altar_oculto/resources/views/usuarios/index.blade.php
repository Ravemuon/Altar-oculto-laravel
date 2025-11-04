@extends('layouts.app')
@section('title', 'Usuários Cadastrados')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4 text-umbanda">👥 Lista de Usuários</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- Botão de adicionar usuário --}}
    <div class="text-center mb-4">
        <a href="{{ route('usuarios.create') }}" class="btn btn-umbanda shadow">
            ➕ Novo Usuário
        </a>
    </div>

    {{-- Campo de pesquisa --}}
    <form action="{{ route('usuarios.index') }}" method="GET" class="mb-4 col-md-6 mx-auto">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Pesquisar por nome ou e-mail...">
            <button class="btn btn-outline-dark" type="submit">🔍 Buscar</button>
        </div>
    </form>

    {{-- Tabela de usuários --}}
    <div class="table-responsive shadow rounded-3 overflow-hidden">
        <table class="table table-striped table-hover align-middle">
            <thead class="bg-umbanda text-white text-center">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Criado em</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuarios as $usuario)
                    <tr>
                        <td class="text-center">{{ $usuario->id }}</td>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td class="text-center">{{ $usuario->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-success text-white shadow-sm">
                                ✏ Editar
                            </a>

                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir {{ $usuario->nome }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger shadow-sm">🗑 Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Nenhum usuário cadastrado ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
