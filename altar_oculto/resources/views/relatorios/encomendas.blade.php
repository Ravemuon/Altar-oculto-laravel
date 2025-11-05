<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Encomendas</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; vertical-align: top; }
        th { background-color: #f0f0f0; }
        h2 { text-align: center; margin-top: 0; }
    </style>
</head>
<body>
    <h2>📦 Relatório de Encomendas</h2>

    <table>
        <thead>
            <tr>
                <th>ID Encomenda</th>
                <th>Cliente</th>
                <th>Email</th>
                <th>Produto(s)</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Subtotal</th>
                <th>Status</th>
                <th>Data</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            @foreach($encomendas as $item)
            <tr>
                <td>{{ $item->encomenda->id }}</td>
                <td>{{ $item->encomenda->nome_cliente }}</td>
                <td>{{ $item->encomenda->email_cliente }}</td>
                <td>{{ $item->produto->nome }}</td>
                <td>{{ $item->quantidade }}</td>
                <td>R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($item->subtotal, 2, ',', '.') }}</td>
                <td>{{ $item->encomenda->status ?? '-' }}</td>
                <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $item->encomenda->endereco }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
