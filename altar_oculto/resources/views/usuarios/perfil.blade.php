@extends('layouts.app')

@section('title', 'Perfil do Usuário')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">👤 Perfil de {{ Auth::user()->nome }}</h1>

    <div class="card shadow border-0 rounded-4">
        <div class="card-body">
            <p><strong>Nome:</strong> {{ Auth::user()->nome }}</p>
            <p><strong>E-mail:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Data de Cadastro:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>

            <div class="mt-4 text-center">
                <a href="{{ route('usuarios.edit', Auth::user()->id) }}" class="btn btn-outline-umbanda">✏ Editar Perfil</a>
                <form action="{{ route('usuarios.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">🚪 Sair</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
