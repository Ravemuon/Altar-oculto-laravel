@extends('layouts.app')

@section('title', 'Estoque do Fornecedor')

@section('content')
<div class="container py-4">
    <h2>📦 Estoque do Fornecedor</h2>

    {{-- Lista dos produtos adicionados pelo fornecedor --}}
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
                            <a href="{{ route('fornecedores.editar-estoque', $item->id) }}" class="btn btn-sm btn-warning">✏ Editar</a>
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
    @endif

    {{-- Lista de todos os produtos cadastrados no sistema --}}
    <h4 class="mt-5">📊 Relatório de Todos os Produtos</h4>
    @if($todosProdutos->isEmpty())
        <p>Nenhum produto cadastrado no sistema.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Disponível no Estoque?</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todosProdutos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->categoria->nome ?? '-' }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>
                            @if($produtos->contains(fn($p) => $p->produto_id == $produto->id))
                                ✅ Sim
                            @else
                                ❌ Não
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
