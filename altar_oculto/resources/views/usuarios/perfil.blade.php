@extends('layouts.app')

@section('title', 'Perfil do Usuário')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">👤 Perfil de {{ Auth::user()->nome }}</h1>

    <div class="card shadow border-0 rounded-4 p-4">
        <div class="text-center mb-4">
            {{-- Exibir imagem do usuário --}}
            @if(Auth::user()->imagem)
                <img src="{{ asset('storage/' . Auth::user()->imagem) }}"
                     alt="Foto de {{ Auth::user()->nome }}"
                     class="rounded-circle shadow mb-3"
                     style="width:150px; height:150px; object-fit:cover;">
            @else
                <img src="{{ asset('images/default-user.png') }}"
                     alt="Foto padrão"
                     class="rounded-circle shadow mb-3"
                     style="width:150px; height:150px; object-fit:cover;">
            @endif
        </div>

        {{-- Formulário para atualizar a imagem --}}
        <form action="{{ route('usuarios.upload_imagem') }}" method="POST" enctype="multipart/form-data" class="mb-4 text-center">
            @csrf
            <div class="mb-2">
                <input type="file" name="imagem" class="form-control" required>
                @error('imagem')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">📷 Atualizar Foto</button>
        </form>

        <p><strong>Nome:</strong> {{ Auth::user()->nome }}</p>
        <p><strong>E-mail:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Data de Cadastro:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
        <p>
            <strong>Tipo de Conta:</strong>
            @if(Auth::user()->fornecedor)
                Conta de Fornecedor
            @else
                Conta Padrão
            @endif
        </p>

        {{-- Dados do fornecedor --}}
        @if(Auth::user()->fornecedor)
            <hr>
            <h4 class="text-center">🏪 Dados do Fornecedor</h4>
            <p><strong>Nome Fantasia:</strong> {{ Auth::user()->fornecedor->nome ?? 'Não informado' }}</p>
            <p><strong>Telefone:</strong> {{ Auth::user()->fornecedor->telefone ?? 'Não informado' }}</p>
            <p><strong>Endereço:</strong> {{ Auth::user()->fornecedor->endereco ?? 'Não informado' }}</p>
        @endif

        <div class="mt-4 text-center d-flex flex-column gap-2">
            <a href="{{ route('usuarios.edit', Auth::user()->id) }}" class="btn btn-outline-umbanda">✏ Editar Perfil</a>

            {{-- Botão para fornecedor, só aparece se o usuário for fornecedor --}}
            @if(Auth::user()->fornecedor)
                <a href="{{ route('fornecedores.estoque') }}" class="btn btn-warning text-white">
                    📦 Meu Estoque
                </a>
            @endif

            <form action="{{ route('usuarios.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">🚪 Sair</button>
            </form>
        </div>
    </div>
</div>
@endsection
