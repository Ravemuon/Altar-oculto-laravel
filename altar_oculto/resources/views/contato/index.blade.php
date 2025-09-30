@extends('layouts.app')

@section('title', 'Contato')

@section('content')
<div class="container mt-5">
    <!-- Título da página -->
    <h1 class="mb-4 text-umbanda text-center">Contato</h1>

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Card centralizado com formulário -->
    <div class="card card-umbanda p-4 shadow-lg mx-auto" style="max-width: 600px;">
        <form action="{{ route('contato.store') }}" method="POST">
            @csrf <!-- Proteção contra CSRF -->

            <!-- Campo Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label fw-bold">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite seu nome" value="{{ old('nome') }}" required>
            </div>

            <!-- Campo Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="exemplo@email.com" value="{{ old('email') }}" required>
            </div>

            <!-- Campo Mensagem -->
            <div class="mb-3">
                <label for="mensagem" class="form-label fw-bold">Mensagem</label>
                <textarea id="mensagem" name="mensagem" class="form-control" rows="6" placeholder="Escreva sua mensagem aqui..." required>{{ old('mensagem') }}</textarea>
            </div>

            <!-- Botão de envio -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-umbanda btn-lg">Enviar Mensagem</button>
            </div>
        </form>
    </div>
</div>
@endsection
