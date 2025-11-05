<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Livro de Pontos da Umbanda</title>
    <style>
        @page {
            margin: 60px 50px;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 11.5px;
            line-height: 1.5;
            color: #222;
            background-color: #fff;
        }

        header {
            text-align: center;
            border-bottom: 1px solid #000;
            padding-bottom: 8px;
            margin-bottom: 18px;
        }

        header h1 {
            font-size: 18px;
            margin: 0;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        header p {
            margin: 0;
            font-style: italic;
            font-size: 12px;
            color: #444;
        }

        .ponto {
            page-break-inside: avoid;
            margin-bottom: 35px;
            padding-bottom: 15px;
            border-bottom: 1px dotted #777;
        }

        .titulo {
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 6px;
            color: #111;
        }

        .subinfo {
            font-size: 10.5px;
            text-align: center;
            color: #555;
            margin-bottom: 12px;
        }

        .letra {
            white-space: pre-line;
            font-size: 7px;
            text-align: justify;
            margin: 0 25px;
            font-style: italic;
            color: #111;
        }

        .simbolo {
            text-align: center;
            font-size: 18px;
            margin-top: 8px;
        }

        .descricao {
            margin-top: 8px;
            text-align: justify;
            font-size: 10.5px;
            color: #333;
            margin: 0 35px;
        }

        footer {
            position: fixed;
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #777;
        }

        .pagina::after {
            content: counter(page);
        }
    </style>
</head>
<body>

<header>
    <h1>Livro de Pontos da Umbanda</h1>
    <p>Compilado automaticamente pelo sistema</p>
</header>

@foreach($pontos as $ponto)
<div class="ponto">
    <div class="titulo">{{ $ponto->nome }}</div>

    <div class="subinfo">
        <strong>Tipo:</strong> {{ ucfirst($ponto->tipo) ?? '—' }} |
        <strong>Entidade:</strong> {{ $ponto->entidade ?? '—' }} |
        <strong>Função:</strong> {{ $ponto->funcao ?? '—' }} |
        <strong>Categoria:</strong> {{ $ponto->categoria->nome ?? '—' }}
    </div>

    @if($ponto->letra)
    <div class="letra">
        {!! nl2br(e($ponto->letra)) !!}
    </div>
    @endif

    @if($ponto->simbolo)
    <div class="simbolo">{{ $ponto->simbolo }}</div>
    @endif

    @if($ponto->descricao)
    <p class="descricao">
        <strong>Descrição:</strong> {{ $ponto->descricao }}
    </p>
    @endif
</div>
@endforeach

<footer>
    Página <span class="pagina"></span>
</footer>

</body>
</html>
