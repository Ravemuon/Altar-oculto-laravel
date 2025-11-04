@extends('layouts.app')

@section('title', 'Estoque do Fornecedor - ' . $fornecedor->nome)

@section('content')
<div class="container py-4">

    <h2 class="mb-4 text-umbanda">Estoque do Fornecedor: {{ $fornecedor->nome }}</h2>

    {{-- Formulário para adicionar produtos --}}
    <div class="card mb-4 shadow-sm rounded-4 p-4">
        <h5 class="mb-3">Adicionar Produtos ao Estoque</h5>
        <form action="{{ route('fornecedores.adicionar-estoque', $fornecedor->id) }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="produto_id" class="form-label">Produto</label>
                    <select name="produto_id" id="produto_id" class="form-select" required>
                        <option value="">Selecione o produto</option>
                        @foreach($produtos as $produto)
                            <option value="{{ $produto->id }}">{{ $produto->nome }} ({{ $produto->quantidade }} em estoque)</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="quantidade" class="form-label">Quantidade a adicionar</label>
                    <input type="number" name="quantidade" id="quantidade" class="form-control" min="1" required>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-umbanda px-4 py-2 mt-2">Adicionar Estoque</button>
                </div>
            </div>
        </form>
    </div>

    {{-- Tabela de produtos fornecidos --}}
    <div class="card shadow-sm rounded-4 p-4">
        <h5 class="mb-3">Produtos já fornecidos</h5>
        @if($estoque->isEmpty())
            <p class="text-muted">Nenhum produto adicionado ainda.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light text-umbanda">
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade fornecida</th>
                            <th>Estoque atual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estoque as $item)
                            <tr>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->pivot->quantidade }}</td>
                                <td>{{ $item->quantidade }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>
@endsection
