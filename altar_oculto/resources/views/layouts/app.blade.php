<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Altar Oculto')</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">

<!-- Custom Styles -->
<style>
    /* Corpo e fonte */
    body {
        background: linear-gradient(180deg, #f2f0f5, #e6e1eb);
        color: #3d2b5f;
        font-family: 'Montserrat', sans-serif;
        scroll-behavior: smooth;
    }

    /* Navbar */
    .navbar {
        background: #f7f5fb;
        padding: 1rem 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .navbar-brand {
        color: #6b3fa0 !important;
        font-weight: 900;
        font-size: 1.8rem;
        letter-spacing: 1px;
    }

    .nav-link {
        color: #4b2c91 !important;
        font-weight: 600;
        transition: color 0.3s, transform 0.2s;
    }

    .nav-link:hover {
        color: #9c6cff !important;
        transform: scale(1.05);
    }

    /* Hero / Banner */
    .hero {
        background: url('https://i.pinimg.com/736x/6b/f4/9a/6bf49a0c607fe27907e95abc4e100ff1.jpg') center/cover no-repeat;
        padding: 140px 20px;
        border-radius: 15px;
        text-align: center;
        margin-bottom: 60px;
        position: relative;
        box-shadow: 0 0 30px rgba(107,63,160,0.25);
        overflow: hidden;
    }

    .hero::after {
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(255,255,255,0.6);
        border-radius: 15px;
    }

    .hero h1, .hero p {
        position: relative;
        z-index: 1;
        text-shadow: 1px 1px 6px rgba(255,255,255,0.7);
    }

    .hero h1 {
        font-size: 3.2rem;
        font-weight: 900;
        margin-bottom: 1rem;
    }

    .hero p {
        font-size: 1.4rem;
        color: #3d2b5f;
    }

    /* Cards */
    .card-umbanda {
        background: #fdfafc;
        color: #3d2b5f;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(107,63,160,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card-umbanda:hover {
        transform: translateY(-8px);
        box-shadow: 0 14px 28px rgba(107,63,160,0.25);
    }

    .card-umbanda img {
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    /* Botões */
    .btn-umbanda {
        background: linear-gradient(90deg, #6b3fa0, #9c6cff);
        color: #fff;
        font-weight: 700;
        border-radius: 8px;
        transition: background 0.3s, transform 0.2s;
    }

    .btn-umbanda:hover {
        background: linear-gradient(90deg, #fff, #6b3fa0);
        color: #3d2b5f;
        transform: scale(1.05);
    }

    /* Footer */
    footer {
        background: #f7f5fb;
        color: #6b3fa0;
        box-shadow: 0 -2px 15px rgba(0,0,0,0.05);
        padding: 1.5rem 0;
    }

    footer p {
        margin: 0;
        font-weight: 500;
    }

    /* Títulos */
    h1, h2, h3, h4, h5 {
        color: #6b3fa0;
        font-weight: 700;
    }

    p, li, span {
        color: #3d2b5f;
        line-height: 1.6;
    }

    /* Seções */
    .section-title {
        margin-bottom: 40px;
        text-align: center;
    }

    .section-title h2 {
        font-weight: 800;
        font-size: 2.2rem;
        color: #6b3fa0;
        position: relative;
        display: inline-block;
    }

    .section-title h2::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: #9c6cff;
        margin: 8px auto 0;
        border-radius: 2px;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.2rem;
        }

        .hero p {
            font-size: 1.1rem;
        }

        .navbar-brand {
            font-size: 1.5rem;
        }
    }
</style>

@stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Altar Oculto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/categorias') }}">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/produtos') }}">Produtos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/encomendas') }}">Encomendas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contato') }}">Contato</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<div class="hero mb-5">
    <h1>Bem-vindo ao Altar Oculto</h1>
    <p>Explore divindades, produtos e a magia da Umbanda</p>
</div>

<!-- Conteúdo principal -->
<div class="container my-5">
    @yield('content')
</div>

<!-- Footer -->
<footer class="text-center">
    <p>&copy; {{ date('Y') }} Altar Oculto. Todos os direitos reservados.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
