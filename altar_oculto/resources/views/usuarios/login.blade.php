@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-umbanda text-white text-center fw-bold">🔒 Login do Usuário</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger text-center">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('usuarios.login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-umbanda">Entrar</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('usuarios.create') }}" class="text-umbanda fw-bold">
                            Não tem conta? Cadastre-se
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
