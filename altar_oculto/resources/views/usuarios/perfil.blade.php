@extends('layouts.app')

@section('title', 'Perfil do Usuário')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">👤 Perfil de {{ Auth::user()->nome }}</h1>

    <div class="card shadow border-0 rounded-4 p-4">

        {{-- Mensagem de sucesso --}}
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="text-center mb-4">
            {{-- Definir imagem do usuário ou padrão --}}
            @php
                $user = Auth::user();
                $imagemPath = $user->imagem && file_exists(storage_path('app/public/' . $user->imagem))
                              ? asset('storage/' . $user->imagem)
                              : asset('images/default-user.png');
            @endphp

            <img src="{{ $imagemPath }}"
                alt="Foto de {{ $user->nome }}"
                class="rounded-circle shadow mb-3"
                style="width:150px; height:150px; object-fit:cover;">
        </div>

        {{-- Formulário de upload --}}
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

        <hr>

        <p><strong>Nome:</strong> {{ $user->nome }}</p>
        <p><strong>E-mail:</strong> {{ $user->email }}</p>
        <p><strong>Data de Cadastro:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
        <p>
            <strong>Tipo de Conta:</strong>
            @if($user->fornecedor)
                Conta de Fornecedor
            @else
                Conta Padrão
            @endif
        </p>

        @if($user->fornecedor)
            <hr>
            <h4 class="text-center">🏪 Dados do Fornecedor</h4>
            <p><strong>Nome Fantasia:</strong> {{ $user->fornecedor->nome ?? 'Não informado' }}</p>
            <p><strong>Telefone:</strong> {{ $user->fornecedor->telefone ?? 'Não informado' }}</p>
            <p><strong>Endereço:</strong> {{ $user->fornecedor->endereco ?? 'Não informado' }}</p>
        @endif

        <div class="mt-4 text-center d-flex flex-column gap-2">
            <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-outline-umbanda">✏ Editar Perfil</a>

            @if($user->fornecedor)
                <a href="{{ route('fornecedores.estoque') }}" class="btn btn-warning text-white">
                    📦 Meu Estoque
                </a>
            @endif

           <a href="{{ route('relatorios.index') }}" class="btn btn-info text-white">📄 Relatórios</a>


            <a href="{{ route('dashboard.index') }}" class="btn btn-success text-white ms-2">
                📊 Dashboard
            </a>

            <form action="{{ route('usuarios.logout') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-danger">🚪 Sair</button>
            </form>
        </div>
    </div>
</div>
@endsection
