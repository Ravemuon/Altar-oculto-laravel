@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
<div class="container py-4">
    <h1 class="text-center text-umbanda mb-4">Editar Usuário</h1>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="shadow p-4 bg-white rounded-4">
        @csrf
        @method('PUT')

        {{-- Nome --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $usuario->nome) }}" required>
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
        </div>

        {{-- Telefone --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $usuario->telefone) }}">
        </div>

        {{-- Endereço --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Endereço</label>
            <input type="text" name="endereco" class="form-control" value="{{ old('endereco', $usuario->endereco) }}">
        </div>

        {{-- Senha --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Senha (deixe em branco se não quiser alterar)</label>
            <input type="password" name="senha" class="form-control">
        </div>

        {{-- Ativo --}}
        <div class="form-check mb-3">
            <input type="checkbox" name="ativo" class="form-check-input" id="ativo" {{ $usuario->ativo ? 'checked' : '' }}>
            <label for="ativo" class="form-check-label">Ativo</label>
        </div>

        {{-- Campos extras se for fornecedor --}}
        @if($usuario->fornecedor)
            <hr>
            <h5 class="mb-3">Informações de Fornecedor</h5>

            <div class="mb-3">
                <label class="form-label fw-bold">Nome da Loja</label>
                <input type="text" name="nome_loja" class="form-control" value="{{ old('nome_loja', $usuario->fornecedor->nome_loja) }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Descrição da Loja</label>
                <textarea name="descricao_loja" class="form-control">{{ old('descricao_loja', $usuario->fornecedor->descricao) }}</textarea>
            </div>
        @endif

        {{-- Botões --}}
        <div class="text-center">
            <button type="submit" class="btn btn-umbanda px-5 py-2">Atualizar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary px-4">Voltar</a>
        </div>
    </form>
</div>
@endsection
