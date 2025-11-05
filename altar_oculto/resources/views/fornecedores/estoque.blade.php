@extends('layouts.app')

@section('title', 'Estoque do Fornecedor')

@section('content')
<div class="container py-4">
    <h2>📦 Estoque do Fornecedor</h2>

    {{-- Busca --}}
    <form method="GET" action="{{ route('fornecedores.estoque') }}" class="mb-3 d-flex gap-2">
        <input type="text" name="search" class="form-control" placeholder="Buscar produto..." value="{{ $search ?? '' }}">
        <button class="btn btn-primary" type="submit">🔍 Buscar</button>
    </form>

    {{-- Adicionar produto individualmente --}}
    <div class="card shadow p-4 mb-4">
        <h4>➕ Adicionar Produto ao Estoque</h4>
        <form action="{{ route('fornecedores.salvar-estoque') }}" method="POST" class="row g-3 align-items-end">
            @csrf
            <div class="col-md-6">
                <label class="form-label fw-bold">Produto</label>
                <select name="produto_id" class="form-select" required>
                    <option value="">Selecione um produto</option>
                    @foreach($todosProdutos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Quantidade</label>
                <input type="number" name="quantidade" class="form-control" min="1" value="1" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success w-100">Adicionar</button>
            </div>
        </form>
    </div>

    {{-- Estoque do fornecedor --}}
    <h4 class="mt-4">Produtos no Meu Estoque</h4>
    @if($produtos->isEmpty())
        <p>Você ainda não adicionou produtos ao estoque.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $item)
                    <tr>
                        <td>{{ $item->produto->nome }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>
                            {{-- Editar estoque --}}
                            <a href="{{ route('fornecedores.editar-estoque', $item->produto->id) }}" class="btn btn-sm btn-warning">✏ Editar</a>

                            {{-- Remover estoque --}}
                            <form action="{{ route('fornecedores.remover-estoque', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Remover produto do estoque?')">🗑 Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Adicionar todos ao estoque da loja --}}
        <form action="{{ route('fornecedores.adicionar-estoque-loja') }}" method="POST" class="mb-4">
            @csrf
            <button type="submit" class="btn btn-primary w-100">
                📦 Adicionar Todos os Produtos do Meu Estoque ao Estoque da Loja
            </button>
        </form>
    @endif

    {{-- Relatório de todos os produtos --}}
    <h4 class="mt-5">📊 Relatório de Estoque Geral</h4>
    @if($todosProdutos->isEmpty())
        <p>Nenhum produto cadastrado no sistema.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Disponível no Estoque do Fornecedor?</th>
                    <th>Quantidade do Fornecedor</th>
                    <th>Estoque da Loja</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todosProdutos as $produto)
                    @php
                        $estoqueDoFornecedor = $produtos->firstWhere('produto_id', $produto->id);
                        $quantidadeFornecedor = $estoqueDoFornecedor->quantidade ?? 0;
                        $estoqueLoja = $produto->estoque ?? 0; // Certifique-se que a coluna 'estoque' existe na tabela produtos
                        $total = $quantidadeFornecedor + $estoqueLoja;
                    @endphp
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->categoria->nome ?? '-' }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ $quantidadeFornecedor > 0 ? '✅ Sim' : '❌ Não' }}</td>
                        <td>{{ $quantidadeFornecedor }}</td>
                        <td>{{ $estoqueLoja }}</td>
                        <td>{{ $total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- Botão para cadastrar produto na loja --}}
    <div class="mb-3 text-end mt-4">
        <a href="{{ route('produtos.create') }}" class="btn btn-secondary">
            ➕ Cadastrar Novo Produto na Loja
        </a>
    </div>
</div>
@endsection
