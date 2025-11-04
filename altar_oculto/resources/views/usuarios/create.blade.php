@extends('layouts.app')
@section('title', 'Cadastrar Usuário')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">📝 Cadastrar Usuário</h1>

    <div class="card shadow border-0 rounded-4 col-md-6 mx-auto">
        <div class="card-body">
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" required value="{{ old('nome') }}">
                    @error('nome')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                    @error('senha')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-umbanda w-100">Cadastrar</button>
                </div>
            </form>

            <hr>
            <div class="text-center">
                <a href="{{ route('usuarios.fornecedorForm') }}" class="btn btn-outline-primary">
                    ⚡ É Fornecedor? Cadastre sua empresa
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
