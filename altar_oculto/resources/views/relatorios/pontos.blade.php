<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Pontos</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; vertical-align: top; }
        th { background-color: #f0f0f0; }
        h2 { text-align: center; margin-top: 0; }
    </style>
</head>
<body>
    <h2>🎵 Relatório de Pontos</h2>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Entidade</th>
                <th>Função</th>
                <th>Letra</th>
                <th>Símbolo</th>
                <th>Categoria</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pontos as $ponto)
            <tr>
                <td>{{ $ponto->nome }}</td>
                <td>{{ ucfirst($ponto->tipo) }}</td>
                <td>{{ $ponto->entidade ?? '-' }}</td>
                <td>{{ $ponto->funcao ?? '-' }}</td>
                <td>{{ $ponto->letra ?? '-' }}</td>
                <td>{{ $ponto->simbolo ?? '-' }}</td>
                <td>{{ $ponto->categoria->nome ?? '-' }}</td>
                <td>{{ $ponto->descricao ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
