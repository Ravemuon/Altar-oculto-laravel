@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')
<div class="container">

    <!-- Título principal -->
    <h1 class="mb-4 text-center fw-bold" style="color: #000;">🛒 Editar Pedido</h1>

    <!-- Itens do pedido -->
    @if($encomenda->itens->count() > 0)
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
                    @foreach($encomenda->itens as $item)
                        @php
                            // Calcula o subtotal de cada item e acumula o total
                            $subtotal = $item->preco_unitario * $item->quantidade;
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $item->produto->nome }}</td>
                            <td>R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                            <td>{{ $item->quantidade }}</td>
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
    @endif

    <!-- Formulário para editar informações do cliente -->
    <form action="{{ route('encomendas.update', $encomenda) }}" method="POST">
        @csrf
        @method('PUT')

        <h2 class="fw-bold mb-3" style="color: #000;">Informações do Cliente</h2>

        <div class="mb-3">
            <label style="color: #000;">Nome</label>
            <input type="text" name="nome_cliente" class="form-control" value="{{ old('nome_cliente', $encomenda->nome_cliente) }}" required>
        </div>

        <div class="mb-3">
            <label style="color: #000;">Email</label>
            <input type="email" name="email_cliente" class="form-control" value="{{ old('email_cliente', $encomenda->email_cliente) }}" required>
        </div>

        <div class="mb-3">
            <label style="color: #000;">Telefone</label>
            <input type="text" name="telefone_cliente" class="form-control" value="{{ old('telefone_cliente', $encomenda->telefone_cliente) }}">
        </div>

        <div class="mb-3">
            <label style="color: #000;">Endereço</label>
            <input type="text" name="endereco" class="form-control" value="{{ old('endereco', $encomenda->endereco) }}" required>
        </div>

        <div class="mb-3">
            <label style="color: #000;">Observações</label>
            <textarea name="observacoes" class="form-control">{{ old('observacoes', $encomenda->observacoes) }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning w-100 btn-lg">✏️ Atualizar Pedido</button>
        <a href="{{ route('encomendas.index') }}" class="btn btn-secondary w-100 btn-lg mt-2">⬅ Voltar</a>
    </form>

</div>
@endsection
