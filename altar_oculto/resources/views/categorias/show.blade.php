@extends('layouts.app')

@section('title', $categoria->nome)

@section('content')
<div class="container my-5">

    {{-- Cabeçalho --}}
    <div class="text-center mb-5">
        <h2 class="text-umbanda fw-bold display-5">{{ $categoria->nome }}</h2>
        <p class="text-muted fst-italic lead">Conheça mais sobre este Orixá</p>
    </div>

    {{-- Imagem destacada --}}
    @if($categoria->imagem)
        <div class="text-center mb-5">
            <img src="{{ $categoria->imagem }}"
                 alt="{{ $categoria->nome }}"
                 class="img-fluid shadow-lg rounded-4"
                 style="max-width: 400px; border: 4px solid #6b3fa0;">
        </div>
    @endif

    {{-- Informações principais --}}
    <div class="row mb-5 g-3 text-center">
        @php
            $info = [
                'Linha' => ucfirst($categoria->linha),
                'Cores' => $categoria->cores,
                'Dia da Semana' => $categoria->dia_semana
            ];
        @endphp

        @foreach($info as $titulo => $valor)
            <div class="col-md-4">
                <div class="p-4 bg-light text-dark rounded-4 shadow-sm h-100">
                    <h6 class="fw-bold text-umbanda">{{ $titulo }}</h6>
                    <p class="mb-0 small">{{ $valor }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Conteúdo detalhado --}}
    <div class="row g-4">
        @foreach(['descricao','historia','simbolos','saudacoes','personalidade','animais','elementos','datas_rituais','notas'] as $campo)
            @if($categoria->$campo)
                <div class="col-lg-6 col-md-12">
                    <div class="card shadow rounded-4 p-4 h-100 border-0">
                        <h5 class="text-umbanda fw-bold mb-3">{{ ucfirst(str_replace('_',' ',$campo)) }}</h5>
                        <p class="small text-dark">{{ $categoria->$campo }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    {{-- Botão voltar --}}
    <div class="text-center mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-umbanda btn-lg">
            ← Voltar
        </a>
    </div>

</div>
@endsection
