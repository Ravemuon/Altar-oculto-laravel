<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Categorias</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        h2 { text-align: center; margin-top: 0; }
        img { max-width: 100px; height: auto; }
    </style>
</head>
<body>
    <h2>📊 Relatório de Categorias</h2>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Imagem</th>
                <th>Linha</th>
                <th>Cores</th>
                <th>Dia da Semana</th>
                <th>História</th>
                <th>Total Produtos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nome }}</td>
                <td>{{ $categoria->descricao ?? '-' }}</td>
                <td>
                    @if($categoria->imagem)
                        <img src="{{ public_path('storage/' . $categoria->imagem) }}" alt="{{ $categoria->nome }}">
                    @else
                        -
                    @endif
                </td>
                <td>{{ $categoria->linha ?? '-' }}</td>
                <td>{{ $categoria->cores ?? '-' }}</td>
                <td>{{ $categoria->dia_semana ?? '-' }}</td>
                <td>{{ $categoria->historia ?? '-' }}</td>
                <td>{{ $categoria->produtos_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
