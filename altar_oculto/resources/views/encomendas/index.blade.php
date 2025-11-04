@extends('layouts.app')

@section('title', 'Carrinho & Encomendas')

@php
    $carrinho = session('carrinho', []);
@endphp

@section('content')
<div class="container py-4">

    {{-- 🛒 CARRINHO RESUMIDO --}}
    <div class="card shadow-lg border-0 rounded-4 mb-5">
        <div class="card-header text-center fw-bold" style="background-color: #FFD700; color: #000; font-size:1.25rem;">
            🛒 Seu Carrinho
        </div>
        <div class="card-body bg-light text-black">
            @if(count($carrinho) > 0)
                <div class="table-responsive mb-3">
                    <table class="table table-striped align-middle">
                        <thead style="background-color: #FFD700; color: #000;">
                            <tr>
                                <th>Produto</th>
                                <th>Qtd</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach($carrinho as $id => $item)
                                @php $subtotal = $item['preco'] * $item['quantidade']; $total += $subtotal; @endphp
                                <tr>
                                    <td>{{ $item['nome'] }}</td>
                                    <td>{{ $item['quantidade'] }}</td>
                                    <td>R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr class="fw-bold" style="background-color: #FFD700; color:#000;">
                                <td colspan="2" class="text-end">Total</td>
                                <td>R$ {{ number_format($total, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-end">
                    <a href="{{ route('encomendas.create') }}" class="btn btn-success btn-lg rounded-pill shadow">
                        🛠 Ver/Finalizar Carrinho
                    </a>
                </div>
            @else
                <p class="text-center fw-bold">⚠ Seu carrinho está vazio.</p>
            @endif
        </div>
    </div>

    {{-- 🌿 SUGESTÕES DE PRODUTOS --}}
    <div class="mb-5">
        <h2 class="mb-4 text-center fw-bold border-bottom pb-2" style="color: #000;">🌿 Sugestões para você</h2>
        <div class="row g-4">
            @foreach($produtos->take(4) as $produto)
                <div class="col-md-3">
                    <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden hover-shadow">
                        @if($produto->imagem)
                            <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nome }}" style="height:180px; object-fit:cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $produto->nome }}</h5>
                            <p class="fw-bold mb-1">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                            <p class="small">Estoque: {{ $produto->estoque }}</p>
                            <div class="mt-auto">
                                <form action="{{ route('carrinho.adicionar', $produto->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm w-100 rounded-pill" style="background-color:#FFD700; color:#000; font-weight:bold;">
                                        ➕ Adicionar ao Carrinho
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- 📜 HISTÓRICO DE ENCOMENDAS --}}
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header text-center fw-bold" style="background-color: #FFD700; color: #000; font-size:1.25rem;">
            📜 Suas Encomendas
        </div>
        <div class="card-body bg-light text-black">

            {{-- Formulário de pesquisa --}}
            <form action="{{ route('encomendas.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar por nome ou email" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">🔍 Pesquisar</button>
                </div>
            </form>

            <!-- Tabela de encomendas -->
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle rounded-3 overflow-hidden shadow">
                    <thead style="background-color: #FFD700; color: #000;">
                        <tr>
                            <th>🙍 Cliente</th>
                            <th>📧 Email</th>
                            <th>🏠 Endereço</th>
                            <th>🛒 Itens</th>
                            <th>💰 Total</th>
                            <th class="text-center">⚙ Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($encomendas as $encomenda)
                            <tr>
                                <td>{{ $encomenda->nome_cliente }}</td>
                                <td>{{ $encomenda->email_cliente }}</td>
                                <td>{{ $encomenda->endereco }}</td>
                                <td>
                                    <ul class="list-unstyled mb-0 small">
                                        @foreach($encomenda->itens as $item)
                                            <li>{{ $item->produto->nome }} (x{{ $item->quantidade }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>R$ {{ number_format($encomenda->total, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('encomendas.edit', $encomenda) }}" class="btn btn-warning btn-sm rounded-pill">✏ Editar</a>
                                    <form action="{{ route('encomendas.destroy', $encomenda) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Tem certeza que deseja excluir este pedido?')">🗑 Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">⚠ Nenhuma encomenda realizada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Paginação --}}
                @if(method_exists($encomendas, 'links'))
                    <div class="mt-3">
                        {{ $encomendas->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
