@extends('layouts.app')

@section('title', 'Finalizar Pedido')

@section('content')
<div class="container">

    <!-- Título principal -->
    <h1 class="mb-4 text-center fw-bold" style="color: #000;">🛒 Finalizar Pedido</h1>

    @php
        // Recupera o carrinho da sessão, ou cria um array vazio se não existir
        $carrinho = session('carrinho', []);
    @endphp

    @if(count($carrinho) > 0)
        <!-- Tabela com os itens do carrinho -->
        <div class="table-responsive mb-4">
            <table class="table table-light table-hover align-middle shadow rounded-3 overflow-hidden">
                <thead class="bg-secondary text-light">
                    <tr>
                        <th>📦 Produto</th>
                        <th>💲 Preço Unitário</th>
                        <th>🔢 Quantidade</th>
                        <th>💰 Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($carrinho as $id => $item)
                        @php
                            // Calcula subtotal e acumula o total
                            $subtotal = $item['preco'] * $item['quantidade'];
                            $total += $subtotal;
                        @endphp
                        <tr style="color: #000;">
                            <td>{{ $item['nome'] }}</td>
                            <td>R$ {{ number_format($item['preco'], 2, ',', '.') }}</td>
                            <td>{{ $item['quantidade'] }}</td>
                            <td>R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr class="fw-bold bg-secondary text-light">
                        <td colspan="3" class="text-end">TOTAL</td>
                        <td>R$ {{ number_format($total, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Formulário de finalização do pedido -->
        <form action="{{ route('encomendas.store') }}" method="POST">
            @csrf
            <h2 class="fw-bold mb-3" style="color: #000;">Informações do Cliente</h2>

            <div class="mb-3">
                <label style="color: #000;">Nome do Cliente</label>
                <input type="text" name="nome_cliente" class="form-control" value="{{ old('nome_cliente') }}" required>
            </div>

            <div class="mb-3">
                <label style="color: #000;">Email do Cliente</label>
                <input type="email" name="email_cliente" class="form-control" value="{{ old('email_cliente') }}" required>
            </div>

            <div class="mb-3">
                <label style="color: #000;">Telefone</label>
                <input type="text" name="telefone_cliente" class="form-control" value="{{ old('telefone_cliente') }}">
            </div>

            <div class="mb-3">
                <label style="color: #000;">Endereço</label>
                <input type="text" name="endereco" class="form-control" value="{{ old('endereco') }}" required>
            </div>

            <div class="mb-3">
                <label style="color: #000;">Observações</label>
                <textarea name="observacoes" class="form-control">{{ old('observacoes') }}</textarea>
            </div>

            <!-- Total do pedido enviado como campo oculto -->
            <input type="hidden" name="total" value="{{ $total }}">

            <!-- Enviar os itens do carrinho para o backend -->
            @foreach($carrinho as $id => $item)
                <input type="hidden" name="produtos[{{ $id }}][produto_id]" value="{{ $id }}">
                <input type="hidden" name="produtos[{{ $id }}][quantidade]" value="{{ $item['quantidade'] }}">
            @endforeach

            <button type="submit" class="btn btn-success w-100 btn-lg">✅ Finalizar Pedido</button>
        </form>

        <!-- Sugestões de produtos -->
        @isset($produtos)
            <h2 class="mt-5 fw-bold" style="color: #000;">🌿 Sugestões para você</h2>
            <div class="row g-4">
                @foreach($produtos->take(4) as $produto)
                    <div class="col-md-3">
                        <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden">
                            @if($produto->imagem)
                                <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nome }}"
                                     style="height: 180px; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column" style="color: #000;">
                                <h5 class="card-title fw-bold">{{ $produto->nome }}</h5>
                                <p class="fw-bold mb-1">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                                <p class="small">Estoque: {{ $produto->estoque }}</p>
                                <div class="mt-auto">
                                    <form action="{{ route('carrinho.adicionar', $produto->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm w-100 rounded-pill"
                                                style="background-color: #FFD700; color: #000; font-weight:bold;">
                                            ➕ Adicionar ao Carrinho
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset

    @else
        <!-- Mensagem quando o carrinho está vazio -->
        <p class="text-center fw-bold" style="color: #000;">⚠ Seu carrinho está vazio.</p>
        <a href="{{ route('produtos.index') }}" class="btn btn-primary w-100 btn-lg mt-3">Voltar às Compras</a>
    @endif

</div>
@endsection
