@extends('layouts.app')

@section('title', 'Produtos do Sistema')

@section('content')
<div class="container py-4">
    <h1>📦 Todos os Produtos do Sistema</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade no Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td>
                    {{ $estoque->has($produto->id) ? $estoque[$produto->id]->pivot->quantidade : 0 }}
                </td>
                <td>
                    @if(!$estoque->has($produto->id))
                    <form action="{{ route('fornecedores.salvar-estoque') }}" method="POST" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                        <input type="number" name="quantidade" value="1" min="1" class="form-control d-inline-block" style="width:80px;">
                        <button type="submit" class="btn btn-success btn-sm mt-1">➕ Adicionar</button>
                    </form>
                    @else
                        <span class="text-muted">Já no estoque</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('fornecedores.estoque') }}" class="btn btn-secondary mt-3">Voltar ao Estoque</a>
</div>
@endsection
