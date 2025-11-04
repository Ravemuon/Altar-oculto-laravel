@extends('layouts.app')

@section('title', 'Finalizar Pedido')

@section('content')
<div class="container py-4">

    <h1 class="text-center fw-bold mb-4">🛒 Finalizar Pedido</h1>

    @php
        $carrinho = session('carrinho', []);
        $user = Auth::user();
    @endphp

    @if(count($carrinho) > 0)
        <form action="{{ route('encomendas.store') }}" method="POST">
            @csrf

            {{-- ITENS DO CARRINHO --}}
            <h2 class="fw-bold mb-3">Itens do Pedido</h2>
            <table class="table table-striped">
                <thead>
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

                            {{-- Campos ocultos para envio --}}
                            <input type="hidden" name="produtos[{{ $id }}][produto_id]" value="{{ $id }}">
                            <input type="hidden" name="produtos[{{ $id }}][quantidade]" value="{{ $item['quantidade'] }}">
                        </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total</td>
                        <td>R$ {{ number_format($total, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- DADOS DO USUÁRIO JÁ CADASTRADOS --}}
            <h2 class="fw-bold mb-3 mt-5">Seus Dados</h2>

            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="nome_cliente" class="form-control" value="{{ old('nome_cliente', $user->nome ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email_cliente" class="form-control" value="{{ old('email_cliente', $user->email ?? '') }}" required>
            </div>

            {{-- CAMPOS ADICIONAIS --}}
            <h2 class="fw-bold mb-3 mt-5">Informações de Entrega</h2>

            <div class="mb-3">
                <label>Telefone</label>
                <input type="text" name="telefone_cliente" class="form-control" value="{{ old('telefone_cliente', $user->telefone ?? '') }}">
            </div>

            <div class="mb-3">
                <label>Endereço</label>
                <input type="text" name="endereco" class="form-control" value="{{ old('endereco', $user->endereco ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label>Ponto de Referência</label>
                <input type="text" name="referencia" class="form-control" value="{{ old('referencia') }}">
            </div>

            <div class="mb-3">
                <label>Observações</label>
                <textarea name="observacoes" class="form-control">{{ old('observacoes') }}</textarea>
            </div>

            {{-- Total enviado oculto --}}
            <input type="hidden" name="total" value="{{ $total }}">

            <button type="submit" class="btn btn-success w-100 btn-lg mt-4">✅ Finalizar Pedido</button>
        </form>
    @else
        <p class="text-center fw-bold">⚠ Seu carrinho está vazio.</p>
        <a href="{{ route('produtos.index') }}" class="btn btn-primary w-100 btn-lg mt-3">Voltar às Compras</a>
    @endif

</div>
@endsection
