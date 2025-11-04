@extends('layouts.app')
@section('title', 'Pontos de ' . $categoria->nome)

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-umbanda mb-4 text-center">Pontos de {{ $categoria->nome }}</h2>

    <div class="mb-4 text-center">
        <a href="{{ route('pontos.index') }}" class="btn btn-secondary">← Voltar</a>
    </div>

    @if($pontos->isEmpty())
        <p class="text-center text-muted">Nenhum ponto cadastrado nesta categoria.</p>
    @else
        <div class="row g-4 justify-content-center">
            @foreach($pontos as $ponto)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm rounded-4 h-100 text-center p-3">
                        <h5 class="fw-bold text-umbanda">{{ $ponto->nome }}</h5>
                        <p class="small text-muted">{{ ucfirst($ponto->tipo) }} - {{ $ponto->funcao ?? 'Sem função' }}</p>
                        <a href="{{ route('pontos.show', $ponto->id) }}" class="btn btn-sm btn-umbanda">Ver Detalhes</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
