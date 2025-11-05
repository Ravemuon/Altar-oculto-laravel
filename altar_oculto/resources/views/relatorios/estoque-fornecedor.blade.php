<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Estoque do Fornecedor</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        h2 { text-align: center; margin-top: 0; }
    </style>
</head>
<body>
    <h2>📦 Estoque de {{ $fornecedor->nome }}</h2>

    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $item)
            <tr>
                <td>{{ $item->produto->nome }}</td>
                <td>{{ $item->produto->categoria->nome ?? '-' }}</td>
                <td>{{ $item->quantidade }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
