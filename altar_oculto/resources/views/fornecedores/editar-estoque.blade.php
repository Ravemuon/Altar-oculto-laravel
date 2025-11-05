@extends('layouts.app')

@section('title', 'Editar Quantidade do Produto')

@section('content')
<div class="container my-5">
    <h1>✏ Editar Quantidade - {{ $produto->nome }}</h1>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Mensagens de erro de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fornecedores.atualizar-estoque', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">Quantidade</label>
            <input type="number" name="quantidade" class="form-control" value="{{ $produto->quantidade }}" min="0" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-warning">Atualizar</button>
            <a href="{{ route('fornecedores.estoque') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
