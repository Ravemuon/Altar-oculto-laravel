@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
<div class="container py-4">
    <h1 class="text-center text-umbanda mb-4">Editar Usuário</h1>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="shadow p-4 bg-white rounded-4">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-bold">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $usuario->nome }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ $usuario->telefone }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Endereço</label>
            <input type="text" name="endereco" class="form-control" value="{{ $usuario->endereco }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Senha (deixe em branco se não quiser alterar)</label>
            <input type="password" name="senha" class="form-control">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="ativo" class="form-check-input" id="ativo" {{ $usuario->ativo ? 'checked' : '' }}>
            <label for="ativo" class="form-check-label">Ativo</label>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-umbanda px-5 py-2">Atualizar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary px-4">Voltar</a>
        </div>
    </form>
</div>
@endsection
