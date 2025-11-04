@extends('layouts.app')
@section('title', 'Cadastrar Fornecedor')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">🏢 Cadastro de Fornecedor</h1>

    <div class="card shadow border-0 rounded-4 col-md-6 mx-auto">
        <div class="card-body">
            <form action="{{ route('usuarios.storeFornecedor') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="codigo" class="form-label">Código de autorização</label>
                    <input type="text" name="codigo" class="form-control" required>
                    @error('codigo')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="mb-3">
                    <label for="empresa" class="form-label">Nome da empresa</label>
                    <input type="text" name="empresa" class="form-control" required>
                    @error('empresa')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do usuário</label>
                    <input type="text" name="nome" class="form-control" required>
                    @error('nome')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                    @error('senha')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-umbanda w-100">Cadastrar Fornecedor</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
